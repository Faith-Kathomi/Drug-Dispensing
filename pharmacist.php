<?php
session_start();

if (isset($_SESSION['password']) && $_SESSION['UserRole'] === 'pharmacist') {
    $username =$_SESSION['Username'];
    $password = $_SESSION['password'];
   // echo "Welcome back, $Username (Admin)!";
} else {
    header("Location: pharmacist_login.html");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator Dashboard</title>
	<link rel="stylesheet"  href="style.css">
</head>
<body>
<div class="main"></div>
     <h1 style="text-align: right;">Hello,  <?php echo $_SESSION[username]; ?></h1>
     <p><a href="../drugDispenser/drugsTables.php">drugs stock</a></p>
     <p><a href="../drugDispenser/prescriptionTables.php">View prescriptions</a></p>
     <p><a href="../drugDispenser/dispense.html">Dispense Drugs</a></p>
     <p><a href="../drugDispenser/DispenseHistory.php">Dispensation History</a></p>
     <p style="text-align: left;"><a href="../signout.php">Sign Out</a></p>
     <p><a href="/drugDispenser/patientTables.php"></a></p>

     <button class="cn"><a href="Drugs.html">ADD DRUGS</a></button>
   
</body>
</html>