<html>
<head>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
    <body>
        <table id="drugsTable">
            <th>drug_ID</th>
            <th>drug_name</th>
            <th>drug_type</th>
            <th>description </th>
            <th> drug_price</th>
            <th>quantity</th>
            <th>Edit</th>
            <th>Delete</th>

           
       
            <?php
            require_once("Database.php");
             echo"<br>";
            $sql = " SELECT * FROM drugs";
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                    while($row = $result -> fetch_assoc()){
                    echo "<tr>
                    <td> $row[drug_ID]</td>  
                    <td> $row[drug_name] </td>
                    <td> $row[drug_type]</td>
                    <td> $row[description]</td>
                    <td> $row[drug_price]</td> 
                    <td> $row[quantity]</td>
                    <td><a href = '/drugDispenser/editDrugs.php?drug_ID=$row[drug_ID]'> Edit </a> </td>
                    <td><a href ='/phptest/drug-dispensing-tool/ProjectForms/deletepatients.php?drug_ID=$row[drug_ID]'>Delete</a></td>
                     </tr>";
                    }
             }
            else{
             echo "No results";
            }
             $conn->close();
             ?>
        </table>
        <script type='text/javascript' src="pagination.js" ></script>
    </body>    
</html>