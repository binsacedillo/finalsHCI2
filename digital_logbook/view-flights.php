<?php
session_start();

// Change 'user_id' to the session variable you set during login
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Logged Flights - Digital Pilot Logbook</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="images/dotr-logo.png" alt="DOTr Logo" class="logo">
            <img src="images/caa-logo.png" alt="CAA Logo" class="logo">
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="view-flights.php">View Flights</a>
            <a href="add-flight.php">Add Flight</a>
            <a href="settings.php">Settings</a>
            <a href="profile.php" class="profile-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
            </a>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <h1>My Logged Flights</h1>
            <div class="btn-container" style="margin-bottom: 30px;">
                <a href="add-flight.html" class="btn btn-primary">➕ Add Flight</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Aircraft</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="window.location.href='Flight.html'">
                        <td>2025-10-10</td>
                        <td>C172</td>
                        <td>RPLL</td>
                        <td>RPVB</td>
                        <td>2.1</td>
                    </tr>
                    <tr onclick="window.location.href='Flight.html'">
                        <td>2025-09-28</td>
                        <td>PA-34</td>
                        <td>RPVM</td>
                        <td>RPML</td>
                        <td>1.5</td>
                    </tr>
                    <tr onclick="window.location.href='Flight.html'">
                        <td>2025-09-15</td>
                        <td>B737 Sim</td>
                        <td>RPVP</td>
                        <td>RPVB</td>
                        <td>3.0</td>
                    </tr>
                </tbody>
            </table>

            <p class="table-note">click any row to edit details</p>
        </div>
    </div>

    <footer>
        <p>©2025 CAAP DOTr - Digital Pilot Logbook</p>
    </footer>
</body>

</html>