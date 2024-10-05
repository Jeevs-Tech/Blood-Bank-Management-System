<?php
// Start a session
include('connection.php');
session_start();

// Check if the user is not logged in, redirect to login page
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
    <title>Exchange Blood Registration</title>
    <script>
        function validateForm() {
            const email = document.forms["exchangeForm"]["email"].value;
            const mobile = document.forms["exchangeForm"]["mno"].value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const mobilePattern = /^\d{10}$/;

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }
            if (!mobilePattern.test(mobile)) {
                alert("Please enter a valid 10-digit mobile number.");
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
        <h1> Exchange Blood Donor Registration</h1><br><br><br>
        <center>
            <div id="form">
                <form name="exchangeForm" action="" method="post" onsubmit="return validateForm()">
                    <table>
                        <!-- Form fields -->
                        <br>
                        <tr>
                            <td width="100px" height="50px">Full Name</td>
                            <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name" required></td>
                            <td width="150px" height="50px">Father's Name</td>
                            <td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father Name" required></td>
                        </tr>
                        <tr>
                            <td width="100px" height="50px">Address</td>
                            <td width="200px" height="50px"><textarea name="address" placeholder="Enter address" required></textarea></td>
                            <td width="100px" height="50px">Age</td>
                            <td width="200px" height="50px"><input type="number" name="age" placeholder="Enter Age" required min="18" max="65"></td>
                        </tr>
                        <tr>
                            <td width="100px" height="50px">E-mail</td>
                            <td width="200px" height="50px"><input type="email" name="email" placeholder="Enter e-mail" required></td>
                            <td width="150px" height="50px">Mobile No</td>
                            <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter number" required></td>
                        </tr>
                        <tr>
                            <td width="150px" height="50px">City</td>
                            <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter city" required></td>
                        </tr>
                        <tr>
                            <td width="150px" height="50px">Select Blood Group</td>
                            <td width="200px" height="50px">
                                <select name="bgroup" required>
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
                            <td width="150px" height="50px">Exchange Blood Group</td>
                            <td width="200px" height="50px">
                                <select name="exgroup" required>
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
                            <td><input type="submit" name="sub" value="Register" style="width:70px; height:30px; border-radius:5px;"></td>
                        </tr>
                    </table>
                </form>

                <?php
                if (isset($_POST['sub'])) {
                    $name = $_POST['name'];
                    $fname = $_POST['fname'];
                    $address = $_POST['address'];
                    $age = $_POST['age'];
                    $email = $_POST['email'];
                    $mobile = $_POST['mno'];
                    $city = $_POST['city'];
                    $bloodgroup = $_POST['bgroup'];
                    $exbgroup = $_POST['exgroup'];

                    // Server-side validation
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo "<script>alert('Invalid email format');</script>";
                    } elseif (!preg_match('/^\d{10}$/', $mobile)) {
                        echo "<script>alert('Invalid mobile number format');</script>";
                    } else {
                        // Check if donor with specified blood group is available
                        $stmt = $conn->prepare("SELECT * FROM donor_register WHERE bgroup = ?");
                        $stmt->execute([$bloodgroup]);
                        $donor = $stmt->fetch();

                        if (!$donor) {
                            echo "<script>alert('No donor found with the specified blood group.');</script>";
                        } else {
                            // Proceed with the exchange registration process
                            // Inserting data into exchange_blood table
                            $db3 = $conn->prepare("INSERT INTO exchange_blood (name, fname, address, city, age, email, mno, bgroup, exgroup) VALUES (:name, :fname, :address, :city, :age, :email, :mno, :bgroup, :exgroup)");

                            $db3->bindValue(':name', $name);
                            $db3->bindValue(':fname', $fname);
                            $db3->bindValue(':address', $address);
                            $db3->bindValue(':city', $city);
                            $db3->bindValue(':age', $age);
                            $db3->bindValue(':email', $email);
                            $db3->bindValue(':mno', $mobile);
                            $db3->bindValue(':bgroup', $bloodgroup);
                            $db3->bindValue(':exgroup', $exbgroup);

                            if ($db3->execute()) {
                                echo "<script>alert('Donor Registration Successful')</script>";
                            } else {
                                echo "<script>alert('Donor Registration Failed')</script>";
                            }
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
