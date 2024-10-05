
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
    <title>Donor List</title>
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
    <h1>Stock Blood List</h2><br><br><br>
    <center><div id="form">
    <table class="donor-table"> 
    <thead>
        <tr>
            <th><center><b><font color="blue">Name</font></b></center></th>
            <th><center><b><font color="blue">Qty</font></b></center></th>
           
           
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><center>A+</center></td>
            <td><center>  <?php
                $db=$conn->query("SELECT * FROM donor_register where bgroup='A+'");
                echo $row=$db->rowcount();
                ?></center></td>
        </tr>      
        <tr>
            <td><center>B+</center></td>
            <td><center>  <?php
                $db=$conn->query("SELECT * FROM donor_register where bgroup='B+'");
                echo $row=$db->rowcount();
                ?></center></td>
        </tr>      
        <tr>
            <td><center>O+</center></td>
            <td><center>
                <?php
                $db=$conn->query("SELECT * FROM donor_register where bgroup='O+'");
                echo $row=$db->rowcount();
                ?>
         </center></td>
        </tr>      
        <tr>
            <td><center>AB+</center></td>
            <td><center>  <?php
                $db=$conn->query("SELECT * FROM donor_register where bgroup='AB+'");
                echo $row=$db->rowcount();
                ?></center></td>
        </tr>      
        <tr>
            <td><center>A-</center></td>
            <td><center>  <?php
                $db=$conn->query("SELECT * FROM donor_register where bgroup='A-'");
                echo $row=$db->rowcount();
                ?></center></td>
        </tr> 
              <tr>
            <td><center>B-</center></td>
            <td><center>  <?php
                $db=$conn->query("SELECT * FROM donor_register where bgroup='B-'");
                echo $row=$db->rowcount();
                ?></center></td>
        </tr>     
          <tr>
            <td><center>O-</center></td>
            <td><center>  <?php
                $db=$conn->query("SELECT * FROM donor_register where bgroup='O-'");
                echo $row=$db->rowcount();
                ?></center></td>
        </tr>      
         <tr>
            <td><center>AB-</center></td>
            <td><center>  <?php
                $db=$conn->query("SELECT * FROM donor_register where bgroup='AB-'");
                echo $row=$db->rowcount();
                ?></center></td>
        </tr>      
        
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
 