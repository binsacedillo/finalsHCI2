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
    <title>Digital Pilot Logbook - Index</title>
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
            <a href="statistics.php">Statistics</a>
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
            <div class="welcome-text">
                <h1>Welcome, Pilot <?php echo htmlspecialchars($_SESSION['name']); ?></span></h1>
            </div>

            <div class="stats">
                <h2>Total Flights Logged:</h2>
                <div class="hours">245.7 hours</div>
            </div>

            <div class="btn-group">
                <a href="add-flight.html" class="btn btn-primary">
                    ✈️ Add Flight
                </a>
                <a href="view-flights.html" class="btn btn-primary">
                    🛫 View Flights
                </a>
            </div>
        </div>
    </div>

    <footer>
        <p>©2025 CAAP DOTr - Digital Pilot Logbook</p>
    </footer>
</body>

</html>