<?php
require_once("Database.php");
$SSN = "";
$F_name = "";
$L_name = "";
$Gender = "";
$Countrycode = "";
$PatientPhone = ""; 
$PatientAddress = "";
$DateOfBirth = "";
$HeightinCm = "";
$WeightinKg = "";
$Allergies = "";
$Email= "";
$UserPassword = "";
$UserRole = "";


 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["SSN"])){
        header("Location: patientTables.php");
    }

    $SSN=$_GET["SSN"];

    $sql="SELECT * FROM RegisterPatients WHERE SSN= $SSN ";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: patientTables.php");
         exit;
    }
    $SSN = $row["SSN"];
$F_name = $row["F_name"];
$L_name = $row["L_name"];
$Gender = $row["Gender"];
$CountryCode = $row['CountryCode'];
$PatientPhone = $row["PatientPhone"];
$PatientAddress = $row["PatientAddress"];
$DateOfBirth = $row["DateOfBirth"];
$HeightinCm = $row["HeightinCm"];
$WeightinKg = $row["WeightinKg"];
$Allergies = $row["Allergies"];
$Email =$row["Email"];
$UserPassword = $row["UserPassword"];
$UserRole =$row["UserRole"];
 }elseif(isset($_POST['SSN'])){
     
    $SSN = $_POST["SSN"];
$F_name = $_POST["F_name"];
$L_name = $_POST["L_name"];
$Gender = $_POST["Gender"];
$CountryCode = $_POST['CountryCode'];
$PatientPhone = $_POST["PatientPhone"];
$PatientAddress = $_POST["PatientAddress"];
$DateOfBirth = $_POST["DateOfBirth"];
$HeightinCm = $_POST["HeightinCm"];
$WeightinKg = $_POST["WeightinKg"];
$Allergies = $_POST["Allergies"];
$Email =$_POST["Email"];
$UserPassword = $_POST["UserPassword"];
$UserRole =$_POST["UserRole"];

    
        if(empty($SSN) || empty($F_Name) || empty($L_Name)|| empty($Gender)|| empty($CountryCode)|| empty($PatientPhone)|| empty($PatientAddress)|| empty($DateOfBirth)|| empty($HeightinCm) || empty($WeightinKg)|| empty($Allergies)|| empty($Email)|| empty($UserPassword)|| empty($UserRole)){
            echo "All fields are required "; 
            
        }
       
        $sql="UPDATE registerpatients SET SSN='$SSN',F_name ='$F_name',L_name='$L_name',Gender ='$Gender',CountryCode='$CountryCode',PatientPhone='$PatientPhone', PatientAddress='$PatientAddress', DateOfBirth='$DateOfBirth', HeightinCm='$HeightinCm',WeightinKg='$WeightinKg',Allergies='$Allergies',Email='$Email',UserPassword='$UserPassword',UserRole='$UserRole' WHERE SSN='$SSN'";
      // $sql="UPDATE RegisterPatients SET F_name='$F_name',WHERE SSN=$SSN";

        if ($conn->query($sql)===TRUE){
            echo "Data updated";
        }else{
            echo "Failed";
        }

        header('Location: patientTables.php');

    

    
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient edit</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Edit </h1>
    <form action="" method="post" >
            <label for="SSN">SSN</label>
            <input type="number" name= "SSN" id="SSN" maxlength="10" required value ="<?php echo $SSN ?>">
            <br>
            <br>
            <label for="F_name">First name</label>
            <input type="text" name="F_name" id="F_name" maxlength="20" required value ="<?php echo $F_name ?>">
            <br>
            <br>
            <label for="L_name">Last name</label>
            <input type="text" name="L_name" id="L_name" maxlength="20" required value ="<?php echo $L_name ?>">
            <br>
            <br>
            <label for="Gender">Gender</label>
            <select id="Gender" name="Gender" required value="<?php echo $Gender ?>">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="Non-binary">Non-binary</option>
            </select>
            <br>
            <br>
            <label for="CountryCode">CountryCode</label>
            <select id="CountryCode" name="CountryCode" required value="<?php echo $CountryCode ?>">
                <option value="">+232</option>
                <option value="">+254</option>
                <option value="">+002</option>
                <option value="">+499</option>
                <option value="">+86</option>
            </select>
            <br>
            <br>
            <label for="PatientPhone">PatientPhone</label>
            <input type="number" name= "PatientPhone" id="PatientPhone" maxlength="10" required value ="<?php echo $PatientPhone ?>">
            <br>
            <br>
            <label for="PatientAddress">PatientAddress</label>
            <input type="text" name= "PatientAddress" id="PatientAddress" maxlength="20" required value ="<?php echo $PatientAddress ?>">
            <br>
            <br>
            <label for="DateOfBirth">DateOfBirth</label>
            <input type="date" name= "DateOfBirth"id="DateOfBirth" maxlength="20" required value ="<?php echo $DateOfBirth ?>">
            <br>
            <br>
            <label for="HeightinCm">HeightinCm</label>
            <input type="number" name= "HeightinCm" id="HeightinCm"  maxlength="20"required value ="<?php echo $HeightinCm ?>">
            <br>
            <br>
            <label for="WeightinKg">WeightinKg</label>
            <input type="text" name= "WeightinKg" id="WeightinKg" required value ="<?php echo $WeightinKg ?>">
            <br>
            <br>
            <label for="Allergies">Allergies</label>
            <input type="text" name= "Allergies" id="Allergies" required value ="<?php echo $Allergies ?>">
            <br>
            <br>
            <label for="Email">Email</label>
            <input type="email" name= "Email" id="Email" required value= "<?php echo $Email ?>">
            <br>
            <br>
            <label for="UserPassword">UserPassword</label>
            <input type="password" name= "UserPassword" id="UserPassword" required value ="<?php echo $UserPassword?>">
            <br>
            <br>
            <label for="UserRole">UserRole</label>
            <select id="UserRole" name="UserRole" required value="<?php echo $UserRole?>">
                <option value="patient">patient</option>
                <option value="doctor">doctor</option>
                <option value="Admin">Admin</option>
                <option value="supervisor">supervisor</option>
            </select>
            <br>
            <br>
            <input type="submit" value="edit">
        </form>
</body>
</html>