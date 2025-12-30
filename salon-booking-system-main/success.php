<?php
require 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

if (!isset($_SESSION['pending_booking']) || !isset($_GET['orderID'])) {
    header('Location: index.php');
    exit;
}

$booking = $_SESSION['pending_booking'];

// Final check if slot is still available
$stmt = $mysqli->prepare("SELECT * FROM bookings WHERE date = ? AND timeslot = ? AND sub_service = ?");
$stmt->bind_param('sss', $booking['date'], $booking['timeslot'], $booking['sub_service']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $error = "Sorry, this time slot was just booked by someone else.";
} else {
    // Save booking
    $stmt = $mysqli->prepare("INSERT INTO bookings (name, email, phone, message, date, timeslot, service, sub_service, price, payment_status) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'paid')");
    $stmt->bind_param('ssssssssd', 
        $booking['name'], 
        $booking['email'], 
        $booking['phone'], 
        $booking['message'], 
        $booking['date'], 
        $booking['timeslot'], 
        $booking['service'], 
        $booking['sub_service'], 
        $booking['price']
    );
    $stmt->execute();
    $booking_id = $stmt->insert_id;
    $stmt->close();

    // Load PHPMailer
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        // SMTP Settings (use your own – Gmail example)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'yourgmail@gmail.com';         // YOUR Gmail
        $mail->Password   = 'your-app-password';           // Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Common details
        $customer_name = $booking['name'];
        $service_full = $services[$booking['service']]['name'];
        $sub_service_full = $services[$booking['service']]['subs'][$booking['sub_service']]['name'];
        $booking_date = date('l, F j, Y', strtotime($booking['date']));
        $booking_time = $booking['timeslot'];
        $price_formatted = number_format($booking['price'], 2);

        // === Email to Customer ===
        $mail->ClearAllRecipients();
        $mail->setFrom('no-reply@yoursalon.com', 'Luxury Hair Salon');
        $mail->addAddress($booking['email'], $customer_name);
        $mail->addReplyTo('info@yoursalon.com', 'Salon Team');

        $mail->isHTML(true);
        $mail->Subject = "Booking Confirmed! 🎉 Your Appointment on $booking_date at $booking_time";

        $mail->Body = "
        <html>
        <body style='font-family: Arial, sans-serif; background:#f8f9fa; padding:20px;'>
            <div style='max-width:600px; margin:auto; background:white; border-radius:15px; overflow:hidden; box-shadow:0 10px 30px rgba(147,112,219,0.2);'>
                <div style='background:linear-gradient(135deg, #d8bfd8, #9370db); color:white; padding:30px; text-align:center;'>
                    <h1>Booking Confirmed!</h1>
                    <p>We're excited to see you soon, $customer_name!</p>
                </div>
                <div style='padding:30px; line-height:1.6;'>
                    <h2 style='color:#9370db;'>Your Appointment Details</h2>
                    <ul>
                        <li><strong>Service:</strong> $sub_service_full</li>
                        <li><strong>Category:</strong> $service_full</li>
                        <li><strong>Date:</strong> $booking_date</li>
                        <li><strong>Time:</strong> $booking_time</li>
                        <li><strong>Price Paid:</strong> $$price_formatted</li>
                    </ul>
                    " . ($booking['message'] ? "<p><strong>Your Message:</strong><br>" . nl2br(htmlspecialchars($booking['message'])) . "</p>" : "") . "
                    <hr>
                    <p>We look forward to giving you an amazing experience!</p>
                    <p style='color:#9370db; font-weight:bold;'>Luxury Hair Salon Team</p>
                </div>
                <div style='background:#f0e6ff; padding:20px; text-align:center; font-size:0.9em; color:#666;'>
                    Need to reschedule? Contact us at info@yoursalon.com
                </div>
            </div>
        </body>
        </html>
        ";

        $mail->AltBody = "Booking Confirmed!\n\nService: $sub_service_full\nDate: $booking_date\nTime: $booking_time\nPrice: $$price_formatted\n\nThank you!";

        $mail->send();

        // === Email to Admin (Notification) ===
        $mail->ClearAllRecipients();
        $mail->addAddress($admin_email); // Your admin email from config.php

        $mail->Subject = "New Paid Booking - #$booking_id";

        $mail->Body = "
        <html>
        <body style='font-family: Arial, sans-serif;'>
            <h2 style='color:#9370db;'>New Booking Received</h2>
            <p><strong>Customer:</strong> $customer_name<br>
               <strong>Email:</strong> {$booking['email']}<br>
               <strong>Phone:</strong> {$booking['phone']}</p>
            <p><strong>Service:</strong> $sub_service_full ($service_full)<br>
               <strong>Date & Time:</strong> $booking_date at $booking_time<br>
               <strong>Price:</strong> $$price_formatted</p>
            " . ($booking['message'] ? "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($booking['message'])) . "</p>" : "<p><em>No message</em></p>") . "
            <hr>
            <p>Payment Status: <span style='color:green; font-weight:bold;'>PAID via PayPal</span></p>
        </body>
        </html>
        ";

        $mail->send();

        $success = true;

    } catch (Exception $e) {
        $error = "Booking saved but email failed. Error: " . $mail->ErrorInfo;
    }
}

unset($_SESSION['pending_booking']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-purple { color: #9370db; }
        .bg-gradient { background: linear-gradient(to bottom, #f8f9fa, #e6e6ff); }
    </style>
</head>
<body class="bg-gradient min-vh-100 d-flex align-items-center">
<div class="container text-center py-5">
    <div class="card shadow-lg mx-auto" style="max-width: 600px; border-radius: 20px;">
        <div class="card-body p-5">
            <?php if (isset($success)): ?>
                <h1 class="display-4 text-purple mb-4">🎉 Booking Confirmed!</h1>
                <p class="lead">Thank you, <strong><?= htmlspecialchars($customer_name) ?></strong>!</p>
                <p>A confirmation email has been sent to <strong><?= htmlspecialchars($booking['email']) ?></strong> with all your appointment details.</p>
                <hr>
                <h5>Your Appointment</h5>
                <p><strong><?= $sub_service_full ?></strong><br>
                   <?= $booking_date ?> at <?= $booking_time ?></p>
                <a href="index.php" class="btn btn-purple btn-lg mt-4">Back to Home</a>
            <?php else: ?>
                <h1 class="text-danger">Booking Issue</h1>
                <p><?= $error ?? 'Something went wrong.' ?></p>
                <a href="index.php" class="btn btn-outline-secondary btn-lg">Go Back</a>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>