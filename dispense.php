<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $patientName = isset($_POST['patientName']) ? $_POST['patientName'] : '';
    $drug_name = isset($_POST['drug_name']) ? $_POST['drug_name'] : '';
    $drug_quantity = isset($_POST['drug_quantity']) ? $_POST['drug_quantity'] : '';
    $drug_frequency = isset($_POST['drug_frequency']) ? $_POST['drug_frequency'] : '';
    $drug_price = isset($_POST['drug_price']) ? $_POST['drug_price'] : '';

    // Replace 'your_database_credentials' with actual database connection details
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "DrugDispencingTool"; // Replace 'YourDatabaseName' with your actual database name

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Database insert SQL code
    $sql = "INSERT INTO dispensing (patientName, drug_name, drug_quantity,drug_frequency, drug_price) 
            VALUES ('$patientName', '$drug_name', '$drug_quantity', '$drug_frequency','$drug_price')";

    // Insert into the database
    if ($conn->query($sql) === TRUE) {
        echo "Drug dispensed successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
