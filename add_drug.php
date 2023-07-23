<?php
require_once("Connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get drug details from the form
    $drug_name = $_POST["drug_name"];
    $drug_type = $_POST["drug_type"];
    $drug_description = $_POST["drug_description"];
    $drug_price = $_POST["drug_price"];

    // Insert drug data into the database
    $sql = "INSERT INTO drugs (drug_name, drug_type, drug_description, drug_price) 
            VALUES ('$drug_name', '$drug_type', '$drug_description', '$drug_price')";

    if ($conn->query($sql) === TRUE) {
        echo "Drug added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
