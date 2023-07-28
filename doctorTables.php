<?php 
require_once("connection.php");

$sqlretrieve = "SELECT * from doctor";
$result = $conn->query($sqlretrieve);
print_r($result);

echo "<br>";

if($result->num_rows > 0){
    
    echo "<table style='border:1px solid black'>";
    $attributes = $result->fetch_fields();
    echo "<tr style='border:1px solid black'>";
    foreach($attributes as $field){
        echo "<th style='border:1px solid black'>". $field->name . "</th>";
      
    }
    echo "</tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        foreach($row as $data){
            echo "<td style='border:1px solid black'>". $data . "</td>" ; 
        }
        
        echo "<tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}



?>