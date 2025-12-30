<?php
require 'config.php';

// Simple authentication (change this password or add proper login later)
$dashboard_password = 'admin123'; // CHANGE THIS!

session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['password'])) {
        if ($_POST['password'] === $dashboard_password) {
            $_SESSION['admin_logged_in'] = true;
        } else {
            $login_error = "Wrong password!";
        }
    }

    if (!isset($_SESSION['admin_logged_in'])) {
        // Show login form
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Admin Login</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="text-center mb-4 text-purple">Admin Dashboard Login</h4>
                            <?php if (isset($login_error)): ?>
                                <div class="alert alert-danger"><?= $login_error ?></div>
                            <?php endif; ?>
                            <form method="post">
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                </div>
                                <button type="submit" class="btn btn-purple w-100">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
        </html>
        <?php
        exit;
    }
}

// Fetch all bookings
$query = "SELECT b.*, s.name as service_name, subs.name as sub_service_name 
          FROM bookings b
          LEFT JOIN (SELECT 'hair-cuts-colour' as slug, 'Hair Cuts & Colour' as name
                     UNION SELECT 'hair-scalp-treatments', 'Hair & Scalp Treatments'
                     UNION SELECT 'hair-styling-sets', 'Hair Styling & Sets') s ON b.service = s.slug
          LEFT JOIN (
              SELECT 'basic-cut' as sub_slug, 'Basic Cut' as name, 'hair-cuts-colour' as parent
              UNION SELECT 'full-colour', 'Full Colour', 'hair-cuts-colour'
              UNION SELECT 'highlights', 'Highlights', 'hair-cuts-colour'
              UNION SELECT 'deep-conditioning', 'Deep Conditioning', 'hair-scalp-treatments'
              UNION SELECT 'scalp-massage', 'Scalp Massage', 'hair-scalp-treatments'
              UNION SELECT 'updo', 'Updo', 'hair-styling-sets'
              UNION SELECT 'blowdry', 'Blowdry', 'hair-styling-sets'
          ) subs ON b.sub_service = subs.sub_slug AND b.service = subs.parent
          ORDER BY b.date DESC, b.timeslot ASC";

$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-purple { color: #9370db; }
        .btn-purple { background: linear-gradient(135deg, #d8bfd8, #9370db); border: none; color: white; }
        .btn-purple:hover { background: linear-gradient(135deg, #ba55d3, #800080); }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-purple fw-bold">Admin Dashboard</h1>
        <a href="dashboard.php?logout=1" class="btn btn-outline-danger">Logout</a>
    </div>

    <?php if (isset($_GET['logout'])) { session_destroy(); header('Location: dashboard.php'); exit; } ?>

    <div class="card shadow">
        <div class="card-header bg-purple text-white">
            <h4 class="mb-0">All Bookings (<?= $result->num_rows ?> total)</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Service</th>
                        <th>Sub-Service</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= date('D, M j, Y', strtotime($row['date'])) ?></td>
                            <td><?= $row['timeslot'] ?></td>
                            <td><?= $row['service_name'] ?? ucwords(str_replace('-', ' ', $row['service'])) ?></td>
                            <td><?= $row['sub_service_name'] ?? ucwords(str_replace('-', ' ', $row['sub_service'])) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['phone']) ?></td>
                            <td>$<?= number_format($row['price'], 2) ?></td>
                            <td>
                                <span class="badge <?= $row['payment_status'] === 'paid' ? 'bg-success' : 'bg-warning' ?>">
                                    <?= ucfirst($row['payment_status']) ?>
                                </span>
                            </td>
                            <td><?= $row['message'] ? htmlspecialchars(substr($row['message'], 0, 50)) . '...' : '<em>None</em>' ?></td>
                        </tr>
                    <?php endwhile; ?>
                    <?php if ($result->num_rows === 0): ?>
                        <tr><td colspan="10" class="text-center py-4">No bookings yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-outline-purple">← Back to Website</a>
    </div>
</div>
</body>
</html>