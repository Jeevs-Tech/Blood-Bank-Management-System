<?php
include('connection.php');
session_start();

if (!isset($_SESSION['un'])) {
    header("Location: indexpage.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $age = $_POST['age'];
        $bgroup = $_POST['bgroup'];
        $email = $_POST['email'];
        $mno = $_POST['mno'];

        $sql = "UPDATE donor_register SET name = ?, fname = ?, address = ?, city = ?, age = ?, bgroup = ?, email = ?, mno = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $fname, $address, $city, $age, $bgroup, $email, $mno, $id]);

        header("Location: donor-list.php");
        exit;
    }

    $sql = "SELECT * FROM donor_register WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $donor = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    header("Location: donor-list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Edit Donor</title>
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
            <h1>Edit Donor</h2><br><br><br>
            <center>
                <div id="form">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>Full Name</td>
                                <td><input type="text" name="name" value="<?=$donor->name;?>" required></td>
                            </tr>
                            <tr>
                                <td>Father's Name</td>
                                <td><input type="text" name="fname" value="<?=$donor->fname;?>" required></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><textarea name="address" required><?=$donor->address;?></textarea></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><input type="text" name="city" value="<?=$donor->city;?>" required></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td><input type="text" name="age" value="<?=$donor->age;?>" required></td>
                            </tr>
                            <tr>
                                <td>Blood Group</td>
                                <td>
                                    <select name="bgroup" required>
                                        <option value="A+" <?= $donor->bgroup == 'A+' ? 'selected' : ''; ?>>A+</option>
                                        <option value="B+" <?= $donor->bgroup == 'B+' ? 'selected' : ''; ?>>B+</option>
                                        <option value="O+" <?= $donor->bgroup == 'O+' ? 'selected' : ''; ?>>O+</option>
                                        <option value="AB+" <?= $donor->bgroup == 'AB+' ? 'selected' : ''; ?>>AB+</option>
                                        <option value="A-" <?= $donor->bgroup == 'A-' ? 'selected' : ''; ?>>A-</option>
                                        <option value="B-" <?= $donor->bgroup == 'B-' ? 'selected' : ''; ?>>B-</option>
                                        <option value="O-" <?= $donor->bgroup == 'O-' ? 'selected' : ''; ?>>O-</option>
                                        <option value="AB-" <?= $donor->bgroup == 'AB-' ? 'selected' : ''; ?>>AB-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" value="<?=$donor->email;?>" required></td>
                            </tr>
                            <tr>
                                <td>Mobile No</td>
                                <td><input type="text" name="mno" value="<?=$donor->mno;?>" required></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="update" value="Update" style="width:70px;height:30px;border-radius:5px;">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </center>
        </div>
        <div id="footer"><h4>Copyright&Jeeva Prakash</h4></div>
    </div>
</body>
</html>
