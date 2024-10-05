<?php
include('connection.php');
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
    <title>Donor Registration</title>
    <script>
        function validateForm() {
            var name = document.forms["donorForm"]["name"].value;
            var fname = document.forms["donorForm"]["fname"].value;
            var address = document.forms["donorForm"]["address"].value;
            var city = document.forms["donorForm"]["city"].value;
            var age = document.forms["donorForm"]["age"].value;
            var email = document.forms["donorForm"]["email"].value;
            var mobile = document.forms["donorForm"]["mno"].value;
            var bgroup = document.forms["donorForm"]["bgroup"].value;

            if (name == "" || fname == "" || address == "" || city == "" || age == "" || email == "" || mobile == "" || bgroup == "") {
                alert("All fields must be filled out");
                return false;
            }

            if (mobile.length != 10 || isNaN(mobile)) {
                alert("Mobile number must be 10 digits and numeric");
                return false;
            }

            if (email.indexOf('@') == -1) {
                alert("Email must contain the '@' symbol");
                return false;
            }

            return true;
        }
    </script>
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
        <h1>Donor Registration</h1><br><br><br>
        <center>
            <div id="form">
                <form name="donorForm" action="" method="post" onsubmit="return validateForm()">
                    <table>
                        <br>
                        <tr>
                            <td width="100px" height="50px">Full Name</td>
                            <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
                            <td width="150px" height="50px">Father's Name</td>
                            <td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father Name"></td>
                        </tr>
                        <tr>
                            <td width="100px" height="50px">Address</td>
                            <td width="200px" height="50px"><textarea name="address" placeholder="Enter address"></textarea></td>
                            <td width="150px" height="50px">City</td>
                            <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter city"></td>
                        </tr>
                        <tr>
                            <td width="100px" height="50px">Age</td>
                            <td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age"></td>
                            <td width="150px" height="50px">Select Blood Group</td>
                            <td width="200px" height="50px">
                                <select name="bgroup">
                                    <option value="">Select Blood Group</option>
                                    <option>A+</option>
                                    <option>B+</option>
                                    <option>O+</option>
                                    <option>AB+</option>
                                    <option>A-</option>
                                    <option>B-</option>
                                    <option>O-</option>
                                    <option>AB-</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="100px" height="50px">E-mail</td>
                            <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter e-mail"></td>
                            <td width="150px" height="50px">Mobile No</td>
                            <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter number"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="sub" value="Register" style="width:70px;height:30px;border-radius:5px;"></td>
                        </tr>
                    </table>
                </form>


                <?php
                if (isset($_POST['sub'])) {
                    $name = $_POST['name'];
                    $fname = $_POST['fname'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $age = $_POST['age'];
                    $bloodgroup = $_POST['bgroup'];
                    $email = $_POST['email'];
                    $mobile = $_POST['mno'];

                    // Server-side validation
                    if (empty($name) || empty($fname) || empty($address) || empty($city) || empty($age) || empty($email) || empty($mobile)) {
                        echo "<script>alert('All fields must be filled out');</script>";
                    } else {
                        $db = $conn->prepare("INSERT INTO donor_register (name, fname, address, city, age, bgroup, email, mno) 
                        VALUES (:name, :fname, :address, :city, :age, :bgroup, :email, :mno)");

                        $db->bindValue(':name', $name);
                        $db->bindValue(':fname', $fname);
                        $db->bindValue(':address', $address);
                        $db->bindValue(':city', $city);
                        $db->bindValue(':age', $age);
                        $db->bindValue(':bgroup', $bloodgroup);
                        $db->bindValue(':email', $email);
                        $db->bindValue(':mno', $mobile);

                        if ($db->execute()) {
                            echo "<script>alert('Donor Registration Successful');</script>";
                        } else {
                            echo "<script>alert('Donor Registration Failed');</script>";
                        }
                    }
                 
                }
                ?>
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

    <div id="footer">

        <h4>Copyright&Jeeva Prakash</h4>
    </div>
</div>
</body>
</html>