<?php require 'config.php';

$service = $_GET['service'] ?? null;
$sub_service = $_GET['sub'] ?? null;
$date = $_GET['date'] ?? null;
if (!$date && $sub_service) $date = date('Y-m-d');

$prev = $date ? date('Y-m', strtotime($date . ' -1 month')) : null;
$next = $date ? date('Y-m', strtotime($date . ' +1 month')) : null;
$currentMonth = $date ? date('F Y', strtotime($date)) : '';

$bookings = [];
$duration = 30;
$price = 0.00;
$sub_name = '';
$service_name = '';

if ($service && isset($services[$service])) {
    $service_name = $services[$service]['name'];
    if ($sub_service && isset($services[$service]['subs'][$sub_service])) {
        $duration = $services[$service]['subs'][$sub_service]['duration'];
        $price = $services[$service]['subs'][$sub_service]['price'];
        $sub_name = $services[$service]['subs'][$sub_service]['name'];
    }
}

if ($date && $sub_service) {
    $stmt = $mysqli->prepare("SELECT timeslot FROM bookings WHERE date = ? AND sub_service = ?");
    $stmt->bind_param('ss', $date, $sub_service);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row['timeslot'];
    }
    $stmt->close();
}

$msg = '';
if (isset($_POST['submit_form'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $timeslot = $_POST['timeslot'] ?? '';
    $date_post = $_POST['date'] ?? '';

    if (!preg_match("/^[a-zA-Z\s]{1,50}$/", $name)) {
        $msg = '<div class="alert alert-danger">Name: Only letters and spaces (max 50 chars).</div>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = '<div class="alert alert-danger">Invalid email address.</div>';
    } elseif (!preg_match("/^\d{10,14}$/", $phone)) {
        $msg = '<div class="alert alert-danger">Phone: 10-14 digits only.</div>';
    } elseif (empty($timeslot)) {
        $msg = '<div class="alert alert-danger">Please select a time slot.</div>';
    } else {
        $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE date = ? AND timeslot = ? AND sub_service = ?");
        $stmt->bind_param('sss', $date_post, $timeslot, $sub_service);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $msg = '<div class="alert alert-danger">Sorry, this slot is no longer available – it was just booked!</div>';
        } else {
            $_SESSION['pending_booking'] = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
                'date' => $date_post,
                'timeslot' => $timeslot,
                'service' => $service,
                'sub_service' => $sub_service,
                'price' => $price
            ];
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Luxury Hair Salon - Book Your Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://www.paypal.com/sdk/js?client-id=<?= $paypal_client_id ?>&currency=USD"></script>
    <style>
        body { background: linear-gradient(to bottom, #f8f9fa, #e6e6ff); font-family: 'Segoe UI', sans-serif; min-height: 100vh; }
        .text-purple { color: #9370db; }
        .btn-purple { background: linear-gradient(135deg, #d8bfd8, #9370db); border: none; color: white; font-weight: bold; }
        .btn-purple:hover { background: linear-gradient(135deg, #ba55d3, #800080); }
        .service-card { transition: all 0.4s; box-shadow: 0 10px 30px rgba(147,112,219,0.2); border-radius: 20px; overflow: hidden; background: white; }
        .service-card:hover { transform: translateY(-15px); box-shadow: 0 20px 40px rgba(147,112,219,0.4); }
        .service-card img { height: 320px; object-fit: cover; width: 100%; }
        .calendar-day { height: 90px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; font-weight: bold; border-radius: 15px; background: white; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: all 0.3s; }
        .calendar-day a { color: #333; text-decoration: none; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; border-radius: 15px; }
        .calendar-day:hover { background: #d8bfd8; transform: scale(1.08); }
        .bg-today { background: #ba55d3 !important; color: white !important; }
        .slot-available { height: 80px; font-size: 1.3rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,128,0,0.2); }
        .slot-booked { height: 80px; border: 3px dashed #dc3545; background: #fff5f5; border-radius: 15px; box-shadow: 0 5px 15px rgba(220,53,69,0.15); }
    </style>
</head>
<body>
<div class="container py-5">

    <?php if (!$service): ?>
        <h1 class="text-center mb-5 text-purple fw-bold display-4">Welcome to Our Luxury Hair Salon</h1>
        <p class="text-center lead mb-5">Choose a service to begin your booking</p>
        <div class="row g-5">
            <?php foreach ($services as $slug => $serv): ?>
                <div class="col-md-4">
                    <div class="service-card">
                        <img src="
                        <?php 
                        if ($slug === 'hair-cuts-colour') echo 'https://atoley.com/cdn/shop/files/Atoley_march24-1-4.jpg?v=1754440135&width=3200';
                        elseif ($slug === 'hair-scalp-treatments') echo 'https://qimassageandnaturalhealingspa.com/wp-content/uploads/2025/01/Website.jpg';
                        elseif ($slug === 'hair-styling-sets') echo 'https://www.cloudninehair.com/cdn/shop/articles/35_Quick_and_easy_updos_Feature_Image_1024x.png?v=1760515844';
                        ?>" alt="<?= $serv['name'] ?>">
                        <div class="p-5 text-center">
                            <h3 class="text-purple mb-4"><?= $serv['name'] ?></h3>
                            <a href="?service=<?= $slug ?>" class="btn btn-purple btn-lg w-100">MORE INFO</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php elseif (!$sub_service): ?>
        <h1 class="text-center mb-5 text-purple fw-bold display-5"><?= $service_name ?></h1>
        <div class="row g-4">
            <?php foreach ($services[$service]['subs'] as $sub_slug => $sub): ?>
                <div class="col-md-4">
                    <div class="card shadow-lg h-100 text-center p-4 border-0">
                        <div class="card-body d-flex flex-column">
                            <h4 class="text-purple"><?= $sub['name'] ?></h4>
                            <p class="mt-3 flex-grow-1"><strong>Duration:</strong> <?= $sub['duration'] ?> minutes<br>
                               <strong>Price:</strong> $<?= number_format($sub['price'], 2) ?></p>
                            <a href="?service=<?= $service ?>&sub=<?= $sub_slug ?>" class="btn btn-purple mt-auto">BOOK NOW</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a href="index.php" class="btn btn-outline-secondary btn-lg">← Back to Services</a>
        </div>

    <?php else: ?>
        <h1 class="text-center mb-4 text-purple fw-bold display-5">Book: <?= $sub_name ?></h1>
        <h5 class="text-center mb-5 text-muted">Price: $<?= number_format($price, 2) ?> • Duration: <?= $duration ?> minutes</h5>

        <div class="text-center mb-5">
            <a href="?service=<?= $service ?>&sub=<?= $sub_service ?>&date=<?= $prev ?>-01" class="btn btn-outline-purple btn-lg">&laquo; Previous Month</a>
            <span class="mx-5 fw-bold fs-3 text-purple"><?= $currentMonth ?></span>
            <a href="?service=<?= $service ?>&sub=<?= $sub_service ?>&date=<?= $next ?>-01" class="btn btn-outline-purple btn-lg">Next Month &raquo;</a>
        </div>

        <table class="table table-borderless">
            <thead class="text-purple fw-bold"><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead>
            <tbody>
            <?php
            $firstDay = date('Y-m-01', strtotime($date));
            $daysInMonth = date('t', strtotime($firstDay));
            $startDay = date('w', strtotime($firstDay));

            echo '<tr>';
            for ($i = 0; $i < $startDay; $i++) echo '<td></td>';

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $currentDate = date('Y-m-d', strtotime("$firstDay + " . ($day - 1) . " days"));
                $isToday = ($currentDate == date('Y-m-d')) ? 'bg-today' : '';
                echo '<td class="p-2"><div class="calendar-day ' . $isToday . '">';
                echo '<a href="?service=' . $service . '&sub=' . $sub_service . '&date=' . $currentDate . '">' . $day . '</a>';
                echo '</div></td>';

                if (($day + $startDay) % 7 == 0) echo '</tr><tr>';
            }
            echo '</tr>';
            ?>
            </tbody>
        </table>

        <?php if ($date): ?>
            <h4 class="text-center mt-5 mb-4 text-purple fw-bold">Time Slots for <?= date('l, F j, Y', strtotime($date)) ?></h4>
            <?= $msg ?>
            <div class="row g-4 justify-content-center">
    <?php
    $timeslots = timeslots($duration);
    $now = new DateTime(); // Current date and time
    $selectedDate = new DateTime($date);
    $isToday = ($selectedDate->format('Y-m-d') === $now->format('Y-m-d'));
    $currentTime = $now->format('H:i');

    foreach ($timeslots as $slot):
        $booked = in_array($slot, $bookings);
        $isPast = false;

        if ($isToday) {
            // Compare slot time with current time
            if ($slot < $currentTime) {
                $isPast = true;
            }
        }
    ?>
        <div class="col-md-3 col-6">
            <?php if ($booked): ?>
                <!-- Booked Slot -->
                <div class="slot-booked d-flex flex-column justify-content-center text-center">
                    <div class="text-danger fw-bold fs-4"><?= $slot ?></div>
                    <div class="text-danger small mt-2">Not Available</div>
                    <div class="text-muted small">Already Booked</div>
                </div>

            <?php elseif ($isPast): ?>
                <!-- Past Time Slot (Today only) -->
                <div class="d-flex flex-column justify-content-center text-center position-relative" style="height: 80px; border-radius: 15px; background: #f0f0f0; opacity: 0.6; filter: blur(1px); box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="fw-bold text-muted fs-4"><?= $slot ?></div>
                    <div class="text-muted small mt-2">Closed</div>
                    <div class="text-muted small">Time Passed</div>
                    <!-- Overlay to prevent interaction -->
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="border-radius: 15px;"></div>
                </div>

            <?php else: ?>
                <!-- Available Slot -->
                <button type="button" onclick="selectSlot('<?= $slot ?>')" class="btn btn-success slot-available w-100">
                    <?= $slot ?><br><small class="fw-bold">Available</small>
                </button>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

            <div id="detailsForm" class="mt-5 card shadow-lg p-5" style="display: none; max-width: 700px; margin: auto; border-radius: 20px;">
                <h4 class="text-purple text-center mb-4 fw-bold">Enter Your Details</h4>
                <form method="post">
                    <input type="hidden" id="selectedSlot" name="timeslot">
                    <input type="hidden" name="date" value="<?= $date ?>">
                    <input type="hidden" name="submit_form" value="1">
                    <div class="mb-3"><input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name" required></div>
                    <div class="mb-3"><input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address" required></div>
                    <div class="mb-3"><input type="text" name="phone" class="form-control form-control-lg" placeholder="Phone Number" required></div>
                    <div class="mb-3"><textarea name="message" class="form-control" rows="4" placeholder="Any enquiry or special requests (optional)"></textarea></div>
                    <button type="submit" class="btn btn-purple btn-lg w-100">Proceed to Secure Payment</button>
                </form>
            </div>

            <?php if (isset($_SESSION['pending_booking']) && empty($msg)): ?>
                <div class="mt-5 card shadow-lg p-5 text-center" style="max-width: 600px; margin: auto; border-radius: 20px;">
                    <h3 class="text-purple mb-4">Complete Your Payment</h3>
                    <h4>Total: $<?= number_format($price, 2) ?></h4>
                    <div id="paypal-button-container" class="mt-4"></div>
                </div>

                <script>
                    paypal.Buttons({
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{ amount: { value: '<?= $price ?>' } }]
                            });
                        },
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                                window.location.href = 'success.php?orderID=' + data.orderID;
                            });
                        },
                        onError: function(err) {
                            alert('Payment failed. Please try again or contact us.');
                        }
                    }).render('#paypal-button-container');
                </script>
            <?php endif; ?>

            <div class="text-center mt-5">
                <a href="?service=<?= $service ?>" class="btn btn-outline-secondary btn-lg">← Back to <?= $service_name ?></a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<div class="text-center mt-5">
    <small><a href="http://localhost/phpmyadmin" target="_blank" class="text-muted">Open Database (phpMyAdmin)</a></small>
</div>

<script>
function selectSlot(slot) {
    document.getElementById('selectedSlot').value = slot;
    document.getElementById('detailsForm').style.display = 'block';
    document.getElementById('detailsForm').scrollIntoView({ behavior: 'smooth' });
}
</script>
</body>
</html>