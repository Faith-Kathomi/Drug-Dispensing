<?php
require_once("Database.php");
$drug_ID = "";
$drug_name = "";
$drug_type = "";
$description = "";
$drug_price = "";
$quantity = ""; 


 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["drug_ID"])){
        header("Location: drugsTables.php");
    }

    $drug_ID=$_GET["drug_ID"];

    $sql="SELECT * FROM drugs WHERE drug_ID= $drug_ID ";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: drugsTables.php");
         exit;
    }
    $drug_ID = $row["drug_ID"];
$drug_name = $row["drug_name"];
$drug_type = $row["drug_type"];
$description = $row["description"];
$drug_price = $row['drug_price'];
$quantity = $row["quantity"];

 }elseif(isset($_POST['drug_ID'])){
     
    $drug_ID = $_POST["drug_ID"];
$drug_name = $_POST["drug_name"];
$drug_type= $_POST["drug_type"];
$description = $_POST["description"];
$drug_price= $_POST['drug_price'];
$quantity = $_POST["quantity"];


    
        if(empty($drug_ID) || empty($drug_name) || empty($drug_type)|| empty($description)|| empty($drug_price)|| empty($quantity)){
            echo "All fields are required "; 
            
        }
       
        $sql="UPDATE drugs SET drug_ID='$drug_ID',drug_name ='$drug_name',drug_type='$drug_type',description ='$description',drug_price='$drug_price',quantity='$quantity' WHERE drug_ID='$drug_ID'";
      // $sql="UPDATE RegisterPatients SET F_name='$F_name',WHERE SSN=$SSN";

        if ($conn->query($sql)===TRUE){
            echo "Data updated";
        }else{
            echo "Failed";
        }

        header('Location: drugsTables.php');

    

    
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Drugs edit</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Edit </h1>
    <form action="" method="post" >
            <label for="drug_ID">drug_ID</label>
            <input type="number" name= "drug_ID" id="drug_ID" maxlength="10" required value ="<?php echo $drug_ID ?>">
            <br>
            <br>
            <label for="drug_name">drug name</label>
            <input type="text" name="drug_name" id="drug_name" maxlength="20" required value ="<?php echo $drug_name ?>">
            <br>
            
            <br>
            <label for="drug_type">drug type</label>
            <select id="drug_type" name="drug_type" required value="<?php echo $drug_type ?>">
                <option value="painkiller">painkiller</option>
                <option value="antibiotic">antibiotic</option>
                <option value="eye care">eye care</option>
                <option value="oral care">oral care</option>
                <option value="bacterial infections">bacterial infections</option>
                <option value="vitamins and supplements">vitamins and supplements</option>
                <option value="first aid">first aid</option>
                <option value="influenza">influenza</option>
            </select>
            <br>
           
            <br>
            <label for="description">description</label>
            <input type="text" name= "description" id="description" maxlength="20" required value ="<?php echo $description ?>">
            <br>
            <br>
            <label for="drug_price">drug price</label>
            <input type="number" name= "drup_price"id="drug_price" maxlength="20" required value ="<?php echo $drug_price ?>">
            <br>
            <br>
            <label for="quantity">quantity</label>
            <input type="number" name= "quantity" id="quantity"  maxlength="20"required value ="<?php echo $quantity ?>">
            <br>
            <br>
            <input type="submit" value="edit">
        </form>
</body>
</html>