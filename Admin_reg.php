<?php
// Replace 'your_database_credentials' with actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DrugDispencingTool";
// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // You should perform additional validation and sanitation here
    
    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the admin data into the database
    $sql = "INSERT INTO admin (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to admin overview page
        header("Location: admin_overview.php");
        exit(); // Make sure to exit after redirecting to prevent further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
