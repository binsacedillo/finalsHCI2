<?php
// 1. Start the session at the very top
session_start();

// 2. Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login
    header("Location: login.html");
    exit;
}

// 3. Include your database connection
include 'db_connect.php'; // $conn variable

// 4. Get the user ID from the session
$user_id = $_SESSION['user_id'];

// 5. Prepare and execute the DELETE statement
// Using a prepared statement is crucial for security
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    // Handle error if statement preparation fails
    echo "Error preparing statement: " . $conn->error;
    exit;
}

// Bind the user_id as an integer ("i")
$stmt->bind_param("i", $user_id);

// 6. Execute the deletion
if ($stmt->execute()) {
    // 7. Deletion was successful. Now, log the user out.
    session_unset();   // Unset all session variables
    session_destroy(); // Destroy the session

    // 8. Redirect to the login page (or homepage)
    // We can add a message to show the user their account was deleted
    header("Location: login.html?status=deleted");
    exit;
} else {
    // Handle error if deletion fails
    echo "Error deleting account: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();