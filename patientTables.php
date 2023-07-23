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
        <table id="patientstable">
            <th>id</th>
            <th>username</th>
            <th>pass1</th>
            <th>fname </th>
            <th>lname</th>
            <th>DOB </th>
            <th>gender</th>
            <th>email </th>
            <th>phone </th>
            <th>Edit</th>
            <th>Delete</th>

           
       
            <?php
            require_once("Connection.php");
             echo"<br>";
            $sql = " SELECT * FROM Patients";
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                    while($row = $result -> fetch_assoc()){
                    echo "<tr>
                    <td>id</td>
            <td>username</td>
            <td>pass1</td>
            <td>fname </td>
            <td>lname</td>
            <td>DOB </td>
            <td>gender</td>
            <td>email </td>
            <td>phone </td>
                    <td><a href = '/drugDispenser/edit1.php?ussername=$row[username]'> Edit </a> </td>
                    <td><a href ='/phptest/drug-dispensing-tool/ProjectForms/deletepatients.php?fname=$row[fname]'>Delete</a></td>
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