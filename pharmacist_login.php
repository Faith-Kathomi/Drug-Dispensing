<?php
session_start();

include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["pass1"];

    // require_once("connection.php");

    echo $username . " " . $password;

    $query = "SELECT * FROM pharmacist WHERE username = '$username' AND pass1 = '$password' LIMIT 1";

    echo "<br>";

    echo $query;

    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['username'] = $username;
        header("Location: pharmacist_homepage.php");
    }


}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pharmacist Login Page</title>
    <style>
        body {
            background-color: cornsilk;
        }
    </style>
</head>

<body>
    <form method="POST">

        <h2>Pharmacist login</h2>

        <label for="username">Username:</label>
        <input type="text" placeholder="Enter username" id="username" name="username" required><br><br>

        <label for="pass1">Password:</label>
        <input type="password" placeholder="Enter password" id="pass1" name="pass1" required><br><br>

        <button type="submit">Login</button>
        <a href="welcome_page.php"><button type="button" class="cancel">Cancel</button></a><br>

        <a style="font-family: cursive;" href="pharmacist_registration_form.php">Don't have an account? Sign up</a>
    </form>
</body>

</html>