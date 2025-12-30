<?php
include 'connection.php';

$service_id = intval($_GET['service_id']);
$date = $_GET['date'];

/* Fetch ALL slots (default slots from DB) */
$slotResult = mysqli_query(
    $conn,
    "SELECT slot_time FROM time_slots ORDER BY slot_time ASC"
);

/* Fetch booked slots for this service + date */
$stmt = mysqli_prepare(
    $conn,
    "SELECT slot_time FROM appointments WHERE service_id = ? AND booking_date = ?"
);
mysqli_stmt_bind_param($stmt, "is", $service_id, $date);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$bookedSlots = [];
while ($row = mysqli_fetch_assoc($result)) {
    $bookedSlots[] = $row['slot_time'];
}

/* Render slots */
while ($slot = mysqli_fetch_assoc($slotResult)) {

    $time = $slot['slot_time'];

    if (in_array($time, $bookedSlots)) {
        echo '
        <div class="col-md-3 mb-3">
            <div class="slot-booked text-center p-3">
                '.$time.'<br><small>Booked</small>
            </div>
        </div>';
    } else {
        echo '
        <div class="col-md-3 mb-3">
            <div class="slot-available bg-success text-white text-center p-3"
                 onclick="selectSlot(\''.$time.'\')">
                '.$time.'
            </div>
        </div>';
    }
}
