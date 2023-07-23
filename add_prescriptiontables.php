<?php
require_once("Connection.php");

// Retrieve prescriptions from the database
$sql = "SELECT * FROM prescriptions";
$result = $conn->query($sql);

// Check if any prescriptions were found
if ($result->num_rows > 0) {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>Prescriptions</title>';
    echo '</head>';
    echo '<body>';
    echo '<h2>Prescriptions</h2>';
    
    // Start creating the HTML table
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Prescription ID</th>';
    echo '<th>Patient Name</th>';
    echo '<th>Drug Name</th>';
    echo '<th>Drug Type</th>';
    echo '<th>More Info</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Loop through the result and display each prescription as a row in the table
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['prescription_id'] . '</td>';
        echo '<td>' . $row['patientName'] . '</td>';
        echo '<td>' . $row['drug_name'] . '</td>';
        echo '<td>' . $row['drug_type'] . '</td>';
        echo '<td>' . $row['more_info'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    echo '</body>';
    echo '</html>';
} else {
    echo 'No prescriptions found.';
}

$conn->close();
?>
