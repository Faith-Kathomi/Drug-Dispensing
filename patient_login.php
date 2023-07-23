<?php
session_start();

include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["pass1"];

    // Perform any necessary input validation and/or password hashing before running the query

    $query = "SELECT * FROM patients WHERE username = '$username' AND pass1 = '$password' LIMIT 1";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: patient_homepage.php");
        exit; // Important to include this to stop further execution of the script after the redirect
    } else {
        // Login failed, handle the error (e.g., display an error message)
        echo "Login failed. Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Login Page</title>
    <style>
        body {
            background-color: cornsilk;
        }
    </style>
</head>

<body>
   <form method="POST" action="patient_login.php">

        <h2 style="text-align: left;">Patient login </h2>
        <label for="username">Username:</label>
        <input type="text" placeholder="Enter username" id="username" name="username" required><br><br>

        <label for="pass1">Password:</label>
        <input type="password" placeholder="Enter password" id="pass1" name="pass1" required><br><br>

        <button type="submit">Login</button>
        <a href="patient_homepage.html"><button type="button" class="cancel">Cancel</button></a><br>

        <a style="font-family: cursive;" href="patient_registration_form.html">Don't have an account? Sign up</a>
    </form>
</body>

</html>
