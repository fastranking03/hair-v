<?php
include 'connection.php';

if (!isset($_GET['service_id'])) {
    die("Invalid Service");
}

$service_id = intval($_GET['service_id']);

$stmt = mysqli_prepare($conn, "SELECT * FROM services WHERE id = ? AND status = 1");
mysqli_stmt_bind_param($stmt, "i", $service_id);
mysqli_stmt_execute($stmt);
$service = mysqli_stmt_get_result($stmt)->fetch_assoc();

if (!$service) {
    die("Service not found");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Book Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 6px;
    }

    .calendar-day {
        padding: 10px;
        border-radius: 8px;
        cursor: pointer;
    }

    .calendar-day:hover {
        background: #e9ecef;
    }

    .calendar-day.disabled {
        color: #ccc;
        cursor: not-allowed;
    }

    .calendar-day.active {
        background: #0d6efd;
        color: #fff;
        font-weight: bold;
    }
</style>

<body class="bg-light">

    <div class="container py-5">

        <h2 class="text-center fw-bold">
            Book: <?php echo htmlspecialchars($service['name']); ?>
        </h2>

        <p class="text-center">
            Duration: <?php echo $service['duration']; ?> mins |
            Price: ₹<?php echo $service['price']; ?>
        </p>

        <!-- CUSTOM CALENDAR -->
        <div class="card p-3 mt-4 mx-auto" style="max-width: 360px;">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <button class="btn btn-sm btn-outline-secondary" id="prevMonth">&lt;</button>
                <h5 id="monthYear" class="mb-0 fw-bold"></h5>
                <button class="btn btn-sm btn-outline-secondary" id="nextMonth">&gt;</button>
            </div>

            <div class="calendar-grid text-center fw-semibold">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>

            <div id="calendarDays" class="calendar-grid text-center mt-2"></div>
        </div>

        <!-- TIME SLOTS (EMPTY INITIALLY) -->
        <div id="slotsContainer" class="row mt-4"></div>



    </div>

    <script>
        const monthYearEl = document.getElementById("monthYear");
        const calendarDaysEl = document.getElementById("calendarDays");
        const bookingForm = document.getElementById("bookingForm");

        let currentDate = new Date();
        let selectedDate = null;

        function renderCalendar() {
            calendarDaysEl.innerHTML = "";

            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();

            monthYearEl.innerText = currentDate.toLocaleString('default', {
                month: 'long',
                year: 'numeric'
            });

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const today = new Date().setHours(0, 0, 0, 0);

            for (let i = 0; i < firstDay; i++) {
                calendarDaysEl.innerHTML += `<div></div>`;
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const fullDate = new Date(year, month, day);
                const dateStr = fullDate.toISOString().split('T')[0];

                let classes = "calendar-day";
                if (fullDate < today) classes += " disabled";
                if (selectedDate === dateStr) classes += " active";

                calendarDaysEl.innerHTML += `
            <div class="${classes}" data-date="${dateStr}">
                ${day}
            </div>
        `;
            }
        }

        calendarDaysEl.addEventListener("click", function(e) {
            if (!e.target.classList.contains("calendar-day") ||
                e.target.classList.contains("disabled")) return;

            document.querySelectorAll(".calendar-day").forEach(d => d.classList.remove("active"));
            e.target.classList.add("active");

            selectedDate = e.target.dataset.date;
            document.getElementById("selectedDate").value = selectedDate;
            bookingForm.classList.add("d-none");

            fetch(`fetch-slots.php?service_id=<?php echo $service_id; ?>&date=${selectedDate}`)
                .then(res => res.text())
                .then(html => {
                    document.getElementById("slotsContainer").innerHTML = html;
                });
        });

        document.getElementById("prevMonth").onclick = () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        };

        document.getElementById("nextMonth").onclick = () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        };

        function selectSlot(slot) {
            document.getElementById('selectedSlot').value = slot;
            bookingForm.classList.remove('d-none');
            bookingForm.scrollIntoView({
                behavior: 'smooth'
            });
        }

        renderCalendar();
    </script>


</body>

</html>