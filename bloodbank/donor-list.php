<?php
include('connection.php'); // Including the database connection
session_start();

if (!isset($_SESSION['un'])) {
    header("Location: indexpage.php");
    exit;
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
            <h1>Donor List</h1><br><br><br>
            <center>
                <div id="form">
                    <table class="donor-table"> 
                        <thead>
                            <tr>
                                <th><center><b><font color="blue">ID</font></b></center></th>
                                <th><center><b><font color="blue">Name</font></b></center></th>
                                <th><center><b><font color="blue">Father's Name</font></b></center></th>
                                <th><center><b><font color="blue">Address</font></b></center></th>
                                <th><center><b><font color="blue">City</font></b></center></th>
                                <th><center><b><font color="blue">Age</font></b></center></th>
                                <th><center><b><font color="blue">Blood Group</font></b></center></th>
                                <th><center><b><font color="blue">E-mail</font></b></center></th>
                                <th><center><b><font color="blue">Mobile No</font></b></center></th>
                                <th><center><b><font color="blue">Actions</font></b></center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $db = $conn->query("SELECT * FROM donor_register"); // Query to fetch donor details
                            while($r1 = $db->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <tr>
                                <td><center><?=$r1->id;?></center></td>
                                <td><center><?=$r1->name;?></center></td>
                                <td><center><?=$r1->fname;?></center></td>
                                <td><center><?=$r1->address;?></center></td>
                                <td><center><?=$r1->city;?></center></td>
                                <td><center><?=$r1->age;?></center></td>
                                <td><center><?=$r1->bgroup;?></center></td>
                                <td><center><?=$r1->email;?></center></td>
                                <td><center><?=$r1->mno;?></center></td>
                                <td>
                                    <center>
                                        <a href="edit-donor.php?id=<?=$r1->id;?>">Edit</a> | 
                                        <a href="delete-donor.php?id=<?=$r1->id;?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                    </center>
                                </td>
                            </tr>      
                            <?php     
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </center>
        </div>
        <a href="home.php" 
                    style="position: absolute; right: 20px; bottom: -120px; padding: 10px 30px; 
                           background: radial-gradient(circle, red, darkred); 
                           color: white; text-decoration: none; border-radius: 5px; 
                           font-size: 16px;">
                    Back
                 </a>

        <div id="footer"><h4>Copyright&Jeeva Prakash</h4></div>
    </div>
</body>
</html>
