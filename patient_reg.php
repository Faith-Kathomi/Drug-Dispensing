<?php
require_once("connection.php");

// Get the post records
$username = $_POST["txtusername"];
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];
$fname = $_POST["txtfname"];
$lname = $_POST["txtlname"];
$DOB = $_POST["DOB"];
$gender = $_POST["gender"];
$email = $_POST["txtEmail"];
$phone = $_POST["txtPhone"];

// Check if passwords match
if ($pass1 == $pass2) {
    // Database insert SQL code
    $sql = "INSERT INTO Patients (`username`, `pass1`, `fname`, `lname`, `DOB`, `gender`, `email`, `phone`) 
            VALUES ('$username', '$pass1', '$fname', '$lname', '$DOB', '$gender', '$email', '$phone')";

    // Insert into the database
    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to patient's homepage
        header("Location: patient_homepage.php");
        exit(); // Make sure to exit after redirecting to prevent further execution.
    } else {
        echo "Registration unsuccessful: " . $conn->error;
    }
} else {
    echo "Password did not match";
}

// Close the database connection
$conn->close();
?>
