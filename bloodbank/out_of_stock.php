<?php //3rd page
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
    <title> exchange List</title>
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
    <h1>Out Stock blood List</h2><br><br><br>
    <center><div id="form">
    <table class="donor-table"> 
    <thead>
        <tr>
            <th><center><b><font color="blue">Name</font></b></center></th>
            <th><center><b><font color="blue">Blood Group</font></b></center></th>
            <th><center><b><font color="blue">Mobile Number</font></b></center></th>
            
        </tr>
    </thead>
    <tbody>
        <?php  
        $db = $conn->query("SELECT * FROM out_stock_blood"); // Query to fetch donor details
        while($r1 = $db->fetch(PDO::FETCH_OBJ)) {
        ?>
        <tr>
            <td><center><?=$r1->bname;?></center></td>
            <td><center><?=$r1->bgroup;?></center></td>
            <td><center><?=$r1->mno;?></center></td>
           
        </tr>      
        <?php     
        }
        ?>
    </tbody>
</table>

    </div></center>
</div>
<a href="home.php" 
                    style="position: absolute; right: 20px; bottom: -120px; padding: 10px 30px; 
                           background: radial-gradient(circle, red, darkred); 
                           color: white; text-decoration: none; border-radius: 5px; 
                           font-size: 16px;">
                    Back
                 </a>

<div id="footer"><h4>Copyright&Jeeva Prakash</h4>
</div>
</div>
</body>
</html>