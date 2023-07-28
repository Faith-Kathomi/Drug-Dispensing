<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Drug Dispensing Project - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

        .user-info {
            position: absolute;
            top: 20px;
            right: 20px;
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
    <
    <div class="container">
        <div class="logo">
            <img src="logo_transparent.png" alt="Logo">
        </div>

        <div class="banner">
            <img src="Have a Telemedicine App Idea_ Do know these 5 Powerful Features of The Best Telemedicine Apps.jpeg" alt="Banner">
        </div>

        <div class="menu">
            <a href="#" onclick="showCategory('home')"><i class="fas fa-home"></i> Home</a>
            <a href="#" onclick="showCategory('prescriptions')"><i class="fas fa-pills"></i> Manage Prescription</a>
            <a href="#" onclick="showCategory('about')"><i class="fas fa-info-circle"></i> About Us</a>
            <a href="#" onclick="showCategory('contact')"><i class="fas fa-address-book"></i> Contact Us</a>
            <a href="#" onclick="showCategory('cart')"><i class="fas fa-shopping-cart"></i> Cart</a>
       </div>

        <div class="user-info">
            <?php
            if (isset($_SESSION['username'])) {
                echo 'Welcome, ' . $_SESSION['username'];
            } else {
                echo 'Welcome, Guest';
            }
            ?>
        </div>

        <section id="home" class="category-content active">
            <h2>Welcome to the Drug Dispensing Project</h2>
            <p>Pharmacy. Health. Beauty
                Pharma Care is a fast-growing pharmacy and health hub and the only one of its kind in East Africa. The company provides trusted pharmaceuticals to customers across the population from convenient locations – with a total reach of over 2 million people with more than 120 branches in the region.

                Pharma Care offers a range of health services including Blood Pressure, Blood Glucose, Body Mass Index, Malaria diagnosis and Family Nutrition, Doctor Consultations, Laboratory Services, instore advisory services including Mum and Baby consultations and skin care advice in select locations.
                Funded by Leapfrog Investments, with the aim of “Helping the Nation to Look and Feel Good One Person at a Time”, Goodlife focuses on providing high-quality individual customer care at an affordable price and convenient locations across the region.

                Pharma Care has built the foundation of a Professional Pharmacy, Health & Beauty chain, to enable East Africans to start living the Goodlife!
                Recent developments include rapid delivery service (less than 3 hours), online shopping and the invaluable My Goodlife Club; A discount loyalty membership..
            </p>
        </section>

        <section id="prescriptions" class="category-content active">
            <h2>Manage Prescriptions</h2>
            <!-- Display the patient's prescription if available -->
            <?php
            if (isset($_SESSION['patient']) && isset($_SESSION['username'])) {
                $patient = $_SESSION['patient'];

                if ($_SESSION['username'] === $patient['username']) {
                    echo "<div id=\"patient-prescriptions\">";
                    echo "<h3>Prescriptions for " . $patient['username'] . ":</h3>";
                    echo "<p><strong>Prescription Notes:</strong> " . $patient['prescription']['notes'] . "</p>";
                    echo "<p><strong>Drug 1:</strong> " . $patient['prescription']['drug1'] . ", <strong>Frequency:</strong> " . $patient['prescription']['frequency1'] . "</p>";
                  echo "</div>";
                } else {
                    echo "<div id=\"no-prescription\">";
                    echo "<h3>No Prescription Available</h3>";
                    echo "<p>There is no prescription available for you at the moment. Please check back later.</p>";
                    echo "</div>";
                }
            } else {
                // Redirect to login page if not logged in
                
                exit;
            }
            ?>
        </section>


        <section id="about" class="category-content active">
            <h2>About Us</h2>
            <p>Pharma Care is a registered pharmacy governed by the Pharmacy and Poisons Board of Kenya; PPB (K) Health Safety code P0940. Why choose Goodlife Pharmacy
                A leader and innovator in the pharma segment, Pharma Care is a pharmacy, a wellness center, provider of first-line primary healthcare, and has introduced access to clinicians through online doctor services.
                <br><br>
                <strong>Why Choose Pharma Care:</strong>
                <ul>
                    <li>.Well trained professionally qualified staff</li>
                    <li>.Accessibility with over 96 stores nationwide</li>
                    <li>.Widest range of genuine and authentic products</li>
                    <li>.Online shopping and WhatsApp Prescription service with best delivery service across the country in less than 3 hours</li>
                    <li>.Direct links to medical health services e.g., Clinicians and Lab services</li>
                    <li>.Instore health Services provided on site</li>
                </ul>
            </p>
        </section>

        <section id="contact" class="category-content active">
            <h2>Contact Us</h2>
            <p>For any inquiries or assistance, please contact:</p>
            <ul>
                <li>John Doe - Phone: 123-456-7890, Email: john@example.com</li>
                <li>Jane Smith - Phone: 987-654-3210, Email: jane@example.com</li>
            </ul>
        </section>

        <section id="cart" class="category-content active">
            <h2>Cart</h2>
            <p>Your cart items will be displayed here.</p>
        </section>
            </div>
            <p style="text-align: left;"><a href="../signout.php">Sign Out</a></p>
</body>

</html>
