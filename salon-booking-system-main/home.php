<?php
include 'connection.php';
$cat_data = "select * from service_cat";
$run_query = mysqli_query($conn, $cat_data);
 
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Luxury Hair Salon - Book Your Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://www.paypal.com/sdk/js?client-id=<?= $paypal_client_id ?>&currency=USD"></script>
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

        <h1 class="text-center mb-5 text-purple fw-bold display-4">Welcome to Our Luxury Hair Salon</h1>
        <p class="text-center lead mb-5">Choose a service to begin your booking</p>
        <div class="row g-5">
            <?php if ($run_query && mysqli_num_rows($run_query) > 0) { ?>

                <?php while ($row = mysqli_fetch_assoc($run_query)) { ?>
                    <div class="col-md-4">
                        <div class="service-card">
                            <img
                                src="<?php echo htmlspecialchars($row['s_image']); ?>"
                                alt="<?php echo htmlspecialchars($row['s_name']); ?>">
                            <div class="p-5 text-center">
                                <h3 class="text-purple mb-4">
                                    <?php echo htmlspecialchars($row['s_name']) ?? ""; ?>
                                </h3>
                                <a
                                    href="service?slug=<?= $row["s_slug"] ?> "
                                    class="btn btn-purple btn-lg w-100">
                                    MORE INFO
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            <?php } else { ?>
                <div class="col-12 text-center">
                    <p>No services found.</p>
                </div>
            <?php } ?>
        </div>



    </div>
</body>

</html>