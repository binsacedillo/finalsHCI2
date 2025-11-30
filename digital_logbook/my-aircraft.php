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
    <title>My Aircraft - Digital Pilot Logbook</title>
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
            <h1>My Aircraft</h1>

            <div class="add-aircraft-btn">
                <button class="btn btn-primary">Add new aircraft</button>
            </div>

            <div class="aircraft-inputs">
                <input type="text" placeholder="Cessna 172" value="Cessna 172">
                <input type="text" placeholder="RP-C1234" value="RP-C1234">
            </div>

            <div class="btn-container">
                <button class="btn btn-primary">Add aircraft</button>
            </div>

            <table style="margin-top: 40px;">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Registration</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cessna 172</td>
                        <td>RP-C1234</td>
                        <td>
                            <button class="btn btn-primary" style="padding: 8px 20px;">Edit</button> |
                            <button class="btn btn-secondary" style="padding: 8px 20px;">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Piper PA-34</td>
                        <td>RP-C5678</td>
                        <td>
                            <button class="btn btn-primary" style="padding: 8px 20px;">Edit</button> |
                            <button class="btn btn-secondary" style="padding: 8px 20px;">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>B737 Simulator</td>
                        <td>B737 Simulator</td>
                        <td>
                            <button class="btn btn-primary" style="padding: 8px 20px;">Edit</button> |
                            <button class="btn btn-secondary" style="padding: 8px 20px;">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="table-note">Click Edit to update aircraft info</p>
        </div>
    </div>

    <footer>
        <p>©2025 CAAP DOTr - Digital Pilot Logbook</p>
    </footer>
</body>

</html>