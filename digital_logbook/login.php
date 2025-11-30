<?php
// SESSIONS MUST BE STARTED AT THE VERY TOP
session_start();

include 'db_connect.php'; // $conn variable comes from here

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // --- SECURITY FIX: PREPARED STATEMENT ---
    // 1. Prepare the SQL query
    // "SELECT *" is fine here since it gets all columns, including the new ones
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    // 2. Bind the email variable
    $stmt->bind_param("s", $email);

    // 3. Execute and get the result
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // 4. Verify the password
        if (password_verify($password, $user['password'])) {

            // --- SESSION LOGIC ---
            // Password is correct! Store user info in the session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            // --- ADD THESE TWO LINES ---
            $_SESSION['license_no'] = $user['license_no'];
            $_SESSION['license_type'] = $user['license_type'];
            // --- END OF NEW LINES ---

            // Redirect to the main app page
            header("Location: index.php");
            exit; // Always call exit after a header redirect

        } else {
            echo "<script>alert('Incorrect password!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No account found with that email.'); window.history.back();</script>";
    }

    // 5. Close the statement
    $stmt->close();
    // --- END OF FIX ---
}