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
    <title>Edit Flight Entry - Digital Pilot Logbook</title>
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
            <a href="index.php">Dashboard</a>
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
            <h1>Edit Flight Entry</h1>

            <form>
                <div class="form-row">
                    <label>Date:</label>
                    <input type="text" value="Cessna 172" readonly>
                </div>

                <div class="form-row">
                    <label>Aircraft:</label>
                    <input type="text" value="RP-C1234" readonly>
                </div>

                <div class="form-row">
                    <label>Departure:</label>
                    <input type="text" value="RPLL">
                </div>

                <div class="form-row">
                    <label>Arrival:</label>
                    <input type="text" value="RPVB">
                </div>

                <div class="form-row">
                    <label>Duration (hrs):</label>
                    <input type="number" step="0.1" value="2.5">
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary">Delete Flight</button>
                </div>
            </form>

            <p class="table-note">Click Edit to update flight entry</p>
        </div>
    </div>

    <footer>
        <p>©2025 CAAP DOTr - Digital Pilot Logbook</p>
    </footer>
</body>

</html>