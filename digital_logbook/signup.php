<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include __DIR__ . '/db_connect.php'; // $conn variable comes from here

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // NEW: Get the new fields from the form
    $license_no = $_POST["license_no"];
    $license_type = $_POST["license_type"];

    // Encrypt password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // --- SECURITY FIX: PREPARED STATEMENT ---

    // 1. Prepare the SQL query with placeholders (?)
    // NEW: Added license_no and license_type to the query
    $sql = "INSERT INTO users (name, email, password, license_no, license_type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // 2. Bind the variables to the placeholders
    // NEW: Changed "sss" to "sssss" (string, string, string, string, string)
    $stmt->bind_param("sssss", $name, $email, $hashedPassword, $license_no, $license_type);

    // 3. Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location='login.html';</script>";
    } else {
        // Check for a duplicate email error
        if ($conn->errno === 1062) { // 1062 is the error code for 'Duplicate entry'
            echo "<script>alert('Error: This email address is already registered.'); window.history.back();</script>";
        } else {
            echo "<script>alert('Error: An unknown error occurred.'); window.history.back();</script>";
        }
    }

    // 4. Close the statement
    $stmt->close();
    // --- END OF FIX ---

}
