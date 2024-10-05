<?php 
// Start a session
include('connection.php');
session_start();

// Check if the user is not , redirect to login page
if (!isset($_SESSION['un'])) {
    header("Location: indexpage.php");
    exit; // Ensure no further code is executed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style1.css"> <!-- Link CSS file for styling -->
    <style>
        /* CSS for image links */
        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            background-color: white; /* Ensure the background color is white */
        }

        li {
            flex: 1 1 20%; /* Reduce the width to ensure images fit better */
            max-width: 20%;
            margin: 10px; /* Adjust spacing as needed */
            box-sizing: border-box;
            text-align: center;
            background-color: white; /* Ensure the background color is white */
        }

        li img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto; /* Center the image horizontally */
        }

        li span {
            display: block;
            margin-top: 5px;
            font-size: 16px;
        }

        /* Ensure footer is within view */
        #body {
            padding-bottom: 50px; /* Ensure there's space for the footer */
        }

        #footer {
            position: relative;
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
        }
    </style>
    <title>Home</title>
</head>
<body>
    <div class="full"> 
        <div id="header">
            <h1><a href="home.php" style="text-decoration:none;color:white;">Blood Bank Management System</a></h1>
            <div class="logout-link">
                <a href="logout.php"><font color="white">Logout</font></a>
            </div>
        </div>
       
        <div id="body">
            <?php
            // Display a welcome message with the username
            echo "<h2>Welcome " . $_SESSION['un'] . "</h2>";
            ?>

            <!-- Navigation links with images -->
            <ul>
                <li>
                    <a href="user_reg.php">
                        <span>User Registration</span>
                        <img src="img/doner.png" alt="User Registration">
                    </a>
                </li>
                <li>
                    <a href="donor-register.php">
                        <span>Donor Registration</span>
                        <img src="img/doner.png" alt="Donor Registration">
                    </a>
                </li>
                <li>
                    <a href="donor-list.php">
                        <span>Donor List</span>
                        <img src="img/list.png" alt="Donor list">
                    </a>
                </li>
                <li>
                    <a href="Stock-Blood-List.php">
                        <span>Stock List</span>
                        <img src="img/stock.png" alt="Stock list">
                    </a>
                </li>
                <li>
                    <a href="out_of_stock.php">
                        <span>Out of Stock Blood List</span>
                        <img src="img/out.png" alt="Out of Stock list">
                    </a>
                </li>
                <li>
                    <a href="exchange-register.php">
                        <span>Exchange Blood Registration</span>
                        <img src="img/ex.png" alt="Exchange Blood">
                    </a>
                </li>   
                <li>
                    <a href="exchange-list.php">
                        <span>Exchange Blood list</span>
                        <img src="img/change.png" alt="Exchange list">
                    </a>
                </li>   
            </ul>
                
        </div>
        
        <div id="footer">
            <h4>Copyright &copy; Jeeva Prakash</h4>
        </div>
    </div>
</body>
</html>
