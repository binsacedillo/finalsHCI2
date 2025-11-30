<?php
// START SESSION AT THE VERY TOP
session_start();

// 1. Check if the user is logged in. If not, redirect to login.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

// 2. Include your database connection
include 'db_connect.php'; // $conn variable

// 3. Get the user's ID from the session
$user_id = $_SESSION['user_id'];

// 4. Fetch the user's current data
$sql = "SELECT name, email, license_no, license_type FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// 5. Assign data to variables (and sanitize for safety)
$current_name = htmlspecialchars($user['name']);
$current_email = htmlspecialchars($user['email']);
$current_license_no = htmlspecialchars($user['license_no'] ?? ''); // Use ?? '' in case it's null
$current_license_type = htmlspecialchars($user['license_type'] ?? '');

$stmt->close();
//
// --- PHP LOGIC ENDS HERE, HTML BEGINS BELOW ---
//
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Digital Pilot Logbook</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="profile-page">

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

            <div class="profile-header">
                <div class="logo-container">
                    <img src="images/dotr-logo.png" alt="DOTr Logo" class="logo">
                    <img src="images/caa-logo.png" alt="CAA Logo" class="logo">
                </div>
                <div class="profile-avatar">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                </div>
                <h1 style="margin: 0;">Profile</h1>
            </div>

            <form action="update-profile.php" method="POST" style="padding: 20px;">
                <div class="info-grid">
                    <div class="info-section">
                        <h2>Personal Information</h2>
                        <div class="info-item">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="<?php echo $current_name; ?>" required>
                        </div>
                        <div class="info-item" style="margin-top: 15px;">
                            <strong>Email Address:</strong>
                            <input type="email" name="email" value="<?php echo $current_email; ?>" required>
                        </div>
                    </div>

                    <div class="info-section">
                        <h2>Pilot Information</h2>
                        <div class="info-item">
                            <strong>Pilot License No:</strong>
                            <input type="text" name="license_no" value="<?php echo $current_license_no; ?>">
                        </div>
                        <div class="info-item" style="margin-top: 15px;">
                            <strong>License Type:</strong>
                            <input type="text" name="license_type" value="<?php echo $current_license_type; ?>">
                        </div>
                    </div>
                </div>

                <div class="btn-group">
                    <a href="index.html" class="btn btn-black"
                        style="text-decoration: none; padding: 10px 20px;">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>

            <hr style="margin: 0 20px 25px 20px; border: 0; border-top: 1px solid #eee;">

            <div class="danger-zone">
                <h3>Delete Account</h3>
                <p>This action is permanent and cannot be undone.</p>

                <form action="delete-account.php" method="POST"
                    onsubmit="return confirm('Are you sure you want to PERMANENTLY delete your account?');">

                    <button type="submit" class="btn btn-danger">Delete My Account</button>
                </form>

                <form action="logout.php" method="post">
                    <button type="submit" name="logout">Sign Out</button>
                </form>
            </div>
            <footer>
                <p>©2025 CAAP DOTr - Digital Pilot Logbook</p>
            </footer>
</body>

</html>