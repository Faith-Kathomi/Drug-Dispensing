<?php
session_start();

include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve the hashed password from the database
    $query = "SELECT password FROM admin WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['UserRole'] = 'Admin'; // Adding UserRole to the session
            header("Location: Admin_overview.php");
            exit; // Make sure to exit after redirecting to prevent further execution.
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
}
?>
