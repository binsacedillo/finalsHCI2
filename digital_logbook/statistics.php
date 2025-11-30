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
    <title>Dashboard - Digital Pilot Logbook</title>
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
            <a href="index.html">Home</a>
            <a href="view-flights.html">View Flights</a>
            <a href="add-flight.html">Add Flight</a>
            <a href="settings.html">Settings</a>
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
            <h1>Flight Statistics</h1>

            <div class="stats-grid">
                <div class="stats-info">
                    <div class="stat-row">
                        <label>Total Flights Logged:</label>
                        <div class="stat-value">12</div>
                    </div>
                    <div class="stat-row">
                        <label>Total Hours Flown:</label>
                        <div class="stat-value">28.6</div>
                    </div>
                    <div class="stat-row">
                        <label>Most-Flown Aircraft:</label>
                        <div class="stat-value">Cessna 172</div>
                    </div>
                </div>

                <div>
                    <img src="images/aircraft.jpg" alt="Cessna 172" class="aircraft-image">
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>©2025 CAAP DOTr - Digital Pilot Logbook</p>
    </footer>
</body>

</html>