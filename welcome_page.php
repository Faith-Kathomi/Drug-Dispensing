<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <style>
        #username-display {
            position: absolute;
            top: 10px;
            right: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div id="username-display">
        <?php
        if (isset($_SESSION['username'])) {
            echo 'Welcome, ' . $_SESSION['username'];
        } else {
            echo 'Welcome, Guest';
        }
        ?>
    </div>
    <p>Welcome to Pharma Care.Order Medicine, Drug online from trusted chemists, Pharmacy near you.Pharma care, is a revolutionary tech healthcare mobile platform that lets you upload your prescription on its application, check the nearest chemist near you, order your drug, make payment and it will be delivered to your home/room.
</body>

</html>