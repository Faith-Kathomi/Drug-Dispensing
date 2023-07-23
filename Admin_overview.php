<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['UserRole'] === 'Admin') {
    $username = $_SESSION['username'];
    // $password = $_SESSION['password']; // Not required in the overview code
} else {
    header("Location: admin_login.php");
    exit; // Make sure to exit after redirecting to prevent further execution.
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrator Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1 style="text-align: right;">Hello, <?php echo $username; ?></h1>
     <p><a href="../Project_Folder/drugsTables.php">Drugs Stock</a></p>
     <p><a href="../Project_Folder/patientTables.php">View Patients</a></p>
     <p><a href="../Project_Folder/pharmacyTables.php">View Pharmacies</a></p>
     <p><a href="../Project_Folder/prescriptionTables.php">View Prescriptions</a></p>
     <p><a href="../Project_Folder/doctorTables.php">View Doctors</a></p>
     <p><a href="/Project_Folder/patientTables.php"></a></p>
     
</body>
</html>
