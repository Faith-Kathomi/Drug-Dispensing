<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Pharmacist Home</title>
    <style>
        body {
            background-color: cornsilk;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 200px;
            height: auto;
        }

        .banner {
            text-align: center;
            margin-bottom: 40px;
        }

        .banner img {
            width: 800px;
            height: auto;
        }

        .menu {
            text-align: center;
            margin-bottom: 40px;
        }

        .menu a {
            color: #333;
            text-decoration: none;
            margin-right: 20px;
            font-size: 18px;
        }

        .menu a:hover {
            color: #000;
        }

        .category-content {
            display: none;
        }

        .category-content.active {
            display: block;
        }

        #username-display {
            position: absolute;
            top: 10px;
            right: 10px;
            font-weight: bold;
        }
    </style>
    <script>
        function showCategory(categoryId) {
            const categoryContents = document.getElementsByClassName('category-content');
            for (let i = 0; i < categoryContents.length; i++) {
                categoryContents[i].classList.remove('active');
            }
            document.getElementById(categoryId).classList.add('active');
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="logo_transparent.png" alt="Logo">
        </div>

        <div class="banner">
            <img src="Have a Telemedicine App Idea_ Do know these 5 Powerful Features of The Best Telemedicine Apps.jpeg" alt="Banner">
        </div>

        <div class="menu">
            <a href="#" onclick="showCategory('home')"><i class="fas fa-home"></i> Home</a>
            <a href="#" onclick="showCategory('profile')"><i class="fas fa-user"></i> View Profile</a>
            <a href="#" onclick="showCategory('add-drugs')"><i class="fas fa-capsules"></i> Add Drugs</a>
            <a href="#" onclick="showCategory('prescriptions')"><i class="fas fa-prescription"></i> Give Prescriptions</a>
            <a href="#" onclick="showCategory('chat')"><i class="fas fa-comments"></i> Chat with Us</a>
        </div>

        <div id="username-display">
            <?php
            if (isset($_SESSION['username'])) {
                echo 'Welcome, ' . $_SESSION['username'];
            } else {
                echo 'Welcome, Guest';
            }
            ?>
        </div>

        <section id="home" class="category-content active">
            <h2>Welcome to Pharma Care</h2>
            <p>Order Medicine, Drugs online from trusted chemists, Pharmacy near you. Pharma Care is a revolutionary tech healthcare mobile platform that lets you upload your prescription on its application, check the nearest chemist near you, order your drug, make payment, and have it delivered to your home/room.</p>
        </section>

        <section id="profile" class="category-content">
            <h2>View Profile</h2>
            <p>Your pharmacist profile information will be displayed here.</p>
        </section>

        <section id="add-drugs" class="category-content">
            <h2>Add Drugs</h2>
            <p>You can add new drugs to the system here.</p>
        </section>
 <section id="prescriptions" class="category-content">
            <h2>Manage Prescriptions</h2>
            <p>You can manage prescriptions for your patients here.</p>

           <p><a href="../Project_Folder/drugsTables.php">drugs stock</a></p>
     <p><a href="../Project_Folder/add_prescriptiontables.php">View prescriptions</a></p>
     <p><a href="../Project_Folder/dispense.html">Dispense Drugs</a></p>
     <p><a href="../Project_Folder/DispenseHistory.php">Dispensation History</a></p>
     <p><a href="/Project_Folder/patientTables.php"></a></p>

     <button class="cn"><a href="drug.html">ADD DRUGS</a></button>
      
         
            
            <script>
                // Function to handle drug dispensing for a specific patient
                function dispenseDrugs(patientName) {
                    // Here, you can save the dispensed drugs to the database for the patient.
                    // For simplicity, I'll just show an alert with the dispensed drugs.
                    // Replace this alert with your logic to handle drug dispensing.
                    const patientPrescription = <?php echo json_encode($patients); ?>;
                    const selectedPatient = patientPrescription.find(patient => patient.name === patientName);

                    let dispensedDrugsInfo = `Dispensing drugs to ${patientName}:\n`;
                    for (const drug of selectedPatient.drugs) {
                        dispensedDrugsInfo += `${drug.name} - Frequency: ${drug.frequency}\n`;
                    }

                    alert(dispensedDrugsInfo);
                }
            </script>
        </section>

<section id="chat" class="category-content">
            <h2>Chat with Us</h2>
            <p>You can chat with our support team here.</p>
        </section>
        <p><a href="/Project_Folder/signout.php"></a></p>

    </div>
</body>

</html>