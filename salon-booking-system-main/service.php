<?php
include 'connection.php';

if (!isset($_GET['slug'])) {
    die("Invalid Service");
}

$slug = $_GET['slug'];

// Secure prepared statement
$stmt = mysqli_prepare($conn, "SELECT * FROM services WHERE slug = ? AND status = 1");
mysqli_stmt_bind_param($stmt, "s", $slug);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Luxury Hair Salon - Book Your Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_SANDBOX_CLIENT_ID&currency=USD"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #f8f9fa, #e6e6ff);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .text-purple {
            color: #9370db;
        }

        .btn-purple {
            background: linear-gradient(135deg, #d8bfd8, #9370db);
            border: none;
            color: white;
            font-weight: bold;
        }

        .btn-purple:hover {
            background: linear-gradient(135deg, #ba55d3, #800080);
        }

        .service-card {
            transition: all 0.4s;
            box-shadow: 0 10px 30px rgba(147, 112, 219, 0.2);
            border-radius: 20px;
            overflow: hidden;
            background: white;
        }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(147, 112, 219, 0.4);
        }

        .service-card img {
            height: 320px;
            object-fit: cover;
            width: 100%;
        }

        .calendar-day {
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            font-weight: bold;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
        }

        .calendar-day a {
            color: #333;
            text-decoration: none;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .calendar-day:hover {
            background: #d8bfd8;
            transform: scale(1.08);
        }

        .bg-today {
            background: #ba55d3 !important;
            color: white !important;
        }

        .slot-available {
            height: 80px;
            font-size: 1.3rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 128, 0, 0.2);
        }

        .slot-booked {
            height: 80px;
            border: 3px dashed #dc3545;
            background: #fff5f5;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.15);
        }
    </style>
</head>

<body>
    <div class="container py-5">

        <h1 class="text-center mb-5 text-purple fw-bold display-5">Hair Cuts & Colour</h1>
        <div class="row g-4">
             <?php if (mysqli_num_rows($result) > 0) { ?>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4">
                    <div class="card shadow-lg h-100 text-center p-4 border-0">
                        <div class="card-body d-flex flex-column">
                            <h4 class="text-purple">
                                <?php echo htmlspecialchars($row['name']); ?>
                            </h4>

                            <p class="mt-3 flex-grow-1">
                                <strong>Duration:</strong> <?php echo $row['duration']; ?> minutes<br>
                                <strong>Price:</strong> <?php echo $row['price']; ?>
                            </p>

                            <a href="booking?service_id=<?php echo $row['id']; ?>"
                               class="btn btn-purple mt-auto">
                               BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        <?php } else { ?>
            <div class="col-12 text-center">
                <p>No services available.</p>
            </div>
        <?php } ?>


        </div>
        <div class="text-center mt-5">
            <a href="index.php" class="btn btn-outline-secondary btn-lg">← Back to Services</a>
        </div>

    </div>

    <div class="text-center mt-5">
        <small><a href="http://localhost/phpmyadmin" target="_blank" class="text-muted">Open Database (phpMyAdmin)</a></small>
    </div>

    <script>
        function selectSlot(slot) {
            document.getElementById('selectedSlot').value = slot;
            document.getElementById('detailsForm').style.display = 'block';
            document.getElementById('detailsForm').scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>