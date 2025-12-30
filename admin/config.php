<?php
session_start(); // Needed for PayPal flow

$mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
if ($mysqli->connect_error) die('Connect Error: ' . $mysqli->connect_error);

$admin_email = 'your.admin@email.com'; // Your salon email
$paypal_client_id = 'YOUR_SANDBOX_CLIENT_ID'; // From PayPal developer

$services = [
    'hair-cuts-colour' => [
        'name' => 'Hair Cuts & Colour',
        'image' => 'https://bradleydouglassalonspa.com/wp-content/uploads/2020/01/Womens-Spa-Salon-Minneapolis-Hair-Salon-Highlights.jpg',
        'subs' => [
            'basic-cut' => ['name' => 'Basic Cut', 'duration' => 30, 'price' => 20.00],
            'full-colour' => ['name' => 'Full Colour', 'duration' => 60, 'price' => 50.00],
            'highlights' => ['name' => 'Highlights', 'duration' => 90, 'price' => 80.00],
        ]
    ],
    'hair-scalp-treatments' => [
        'name' => 'Hair & Scalp Treatments',
        'image' => 'https://qimassageandnaturalhealingspa.com/wp-content/uploads/2024/09/head-spa-treatment.jpg',
        'subs' => [
            'deep-conditioning' => ['name' => 'Deep Conditioning', 'duration' => 45, 'price' => 30.00],
            'scalp-massage' => ['name' => 'Scalp Massage', 'duration' => 30, 'price' => 25.00],
        ]
    ],
    'hair-styling-sets' => [
        'name' => 'Hair Styling & Sets',
        'image' => 'https://www.cloudninehair.com/cdn/shop/articles/35_Quick_and_easy_updos_Feature_Image_1024x.png?v=1760515844',
        'subs' => [
            'updo' => ['name' => 'Updo', 'duration' => 60, 'price' => 40.00],
            'blowdry' => ['name' => 'Blowdry', 'duration' => 30, 'price' => 25.00],
        ]
    ],
];

function timeslots($duration, $start = "09:00", $end = "17:00", $cleanup = 0) {
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = [];
    for ($time = $start; $time < $end; $time = $time->add($interval)->add($cleanupInterval)) {
        $slots[] = $time->format("H:i");
    }
    return $slots;
}
?>