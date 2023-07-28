<?php

require_once("Connection.php");
echo "<pre>";
print_r($_POST);
echo "</pre>";

$patientName = $_POST["patientName"];
$drug_name = $_POST["drug_name"];
$drug_type = $_POST["drug_type"];
$more_info = $_POST['more_info'];




$sql = "INSERT INTO prescriptions (patientName, drug_name,drug_type,more_info ) 
VALUES ('$patientName', '$drug_name', '$drug_type', '$more_info')";

if ($conn->query($sql) === TRUE) {
  echo "prescription added";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
