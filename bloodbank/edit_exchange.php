<?php
// Start a session
session_start();

// Include the database connection file
include('connection.php');

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['un'])) {
    header("Location: indexpage.php");
    exit;
}

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data for the donor
    $stmt = $conn->prepare("SELECT * FROM exchange_blood WHERE id = ?");
    $stmt->execute([$id]);
    $donor = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$donor) {
        echo "No donor found with this ID.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get updated details from the form
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $mno = $_POST['mno'];
        $bgroup = $_POST['bgroup'];
        $exgroup = $_POST['exgroup'];

        // Validate the data
        if (empty($name) || empty($fname) || empty($address) || empty($city) || empty($age) || empty($email) || empty($mno) || empty($bgroup) || empty($exgroup)) {
            echo "All fields must be filled out.";
        } else {
            // Update the donor in the database
            $stmt = $conn->prepare("UPDATE exchange_blood SET name = ?, fname = ?, address = ?, city = ?, age = ?, email = ?, mno = ?, bgroup = ?, exgroup = ? WHERE id = ?");
            $stmt->execute([$name, $fname, $address, $city, $age, $email, $mno, $bgroup, $exgroup, $id]);

            // Redirect to the exchange list page
            header("Location: exchange-list.php");
            exit;
        }
    }
} else {
    echo "Invalid ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Edit Exchange Donor</title>
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
            <h1>Edit Exchange Donor</h1><br><br><br>
            <center>
                <div id="form">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>Full Name</td>
                                <td><input type="text" name="name" value="<?= $donor['name'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Father's Name</td>
                                <td><input type="text" name="fname" value="<?= $donor['fname'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><textarea name="address"><?= $donor['address'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><input type="text" name="city" value="<?= $donor['city'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td><input type="text" name="age" value="<?= $donor['age'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" value="<?= $donor['email'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Mobile No</td>
                                <td><input type="text" name="mno" value="<?= $donor['mno'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Blood Group</td>
                                <td>
                                    <select name="bgroup">
                                        <option value="A+" <?= $donor['bgroup'] == 'A+' ? 'selected' : '' ?>>A+</option>
                                        <option value="B+" <?= $donor['bgroup'] == 'B+' ? 'selected' : '' ?>>B+</option>
                                        <option value="O+" <?= $donor['bgroup'] == 'O+' ? 'selected' : '' ?>>O+</option>
                                        <option value="AB+" <?= $donor['bgroup'] == 'AB+' ? 'selected' : '' ?>>AB+</option>
                                        <option value="A-" <?= $donor['bgroup'] == 'A-' ? 'selected' : '' ?>>A-</option>
                                        <option value="B-" <?= $donor['bgroup'] == 'B-' ? 'selected' : '' ?>>B-</option>
                                        <option value="O-" <?= $donor['bgroup'] == 'O-' ? 'selected' : '' ?>>O-</option>
                                        <option value="AB-" <?= $donor['bgroup'] == 'AB-' ? 'selected' : '' ?>>AB-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Exchange Blood Group</td>
                                <td>
                                    <select name="exgroup">
                                        <option value="A+" <?= $donor['exgroup'] == 'A+' ? 'selected' : '' ?>>A+</option>
                                        <option value="B+" <?= $donor['exgroup'] == 'B+' ? 'selected' : '' ?>>B+</option>
                                        <option value="O+" <?= $donor['exgroup'] == 'O+' ? 'selected' : '' ?>>O+</option>
                                        <option value="AB+" <?= $donor['exgroup'] == 'AB+' ? 'selected' : '' ?>>AB+</option>
                                        <option value="A-" <?= $donor['exgroup'] == 'A-' ? 'selected' : '' ?>>A-</option>
                                        <option value="B-" <?= $donor['exgroup'] == 'B-' ? 'selected' : '' ?>>B-</option>
                                        <option value="O-" <?= $donor['exgroup'] == 'O-' ? 'selected' : '' ?>>O-</option>
                                        <option value="AB-" <?= $donor['exgroup'] == 'AB-' ? 'selected' : '' ?>>AB-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Update"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </center>
        </div>
        
        <div id="footer">
            <h4>Copyright &copy; Jeeva Prakash</h4>
        </div>
    </div>
</body>
</html>
