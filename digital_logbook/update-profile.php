<?php
session_start();

// 1. Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to update your profile.");
}

// 2. Include your database connection
require 'db_connect.php'; // $conn variable

// 3. Get user ID from session
$user_id = $_SESSION['user_id'];

// 4. Get data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$license_no = $_POST['license_no'];
$license_type = $_POST['license_type'];

try {
    // 5. Prepare the SQL query
    // (I've cleaned up the spacing in your SQL for safety)
    $sql = "UPDATE users SET name = ?, email = ?, license_no = ?, license_type = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);

    // "ssssi" = string, string, string, string, integer
    $stmt->bind_param("ssssi", $name, $email, $license_no, $license_type, $user_id);

    // 6. Execute the statement
    $stmt->execute();

    // 7. Update session name in case it changed
    $_SESSION['name'] = $name;

    // 8. Close statement and redirect back to the profile page
    $stmt->close();
    header("Location: profile.php?status=success"); // Go back to profile
    exit;
} catch (Exception $e) {
    // Handle errors (e.g., if email is already taken)
    if ($conn->errno === 1062) {
        echo "<script>alert('Error: This email address is already in use.'); window.history.back();</script>";
    } else {
        echo "<script>alert('An error occurred. Please try again.'); window.history.back();</script>";
    }
}
