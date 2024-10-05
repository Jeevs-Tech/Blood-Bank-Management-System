<?php  // 1st page
include('connection.php');
session_start();


//database connection 
if(isset($_POST['sub']))  
{
 $username=$_POST['un'];  
 $password=$_POST['ps'];
 $db=$conn->prepare("SELECT * FROM admin WHERE uname='$username' AND pass='$password'");
 $db->execute();
 $res=$db->fetchAll(PDO::FETCH_OBJ);

if($res)
{

 $_SESSION['un']=$username; 
 header("location:home.php"); //connection successfull go to next page

}
else
{
 echo "<script>alert('wrong user ')</script>";// connection failed show msg
 echo "<script>alert('enter login name & password ')</script>";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>


    <style>
        /* CSS for the text container */
        .text-container {
            position: absolute;
            top: -6%;
            left: -6%;
            transform: translate(65%, 65%);
            text-align:center;
            z-index: 1; /* Ensure text appears above the background image */
        }
        h1{
            color:red;
            font-size: 40px;
        }
    </style>




</head>
<body>
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/bg.svg">
            </div>
            <div class="text-container">
                <h1>Blood Bank Management System</h1>
                <p>The blood you donote gives someone another chance at at life.</p>
            </div>
        <div class="login-content">
            <form action="indexpage.php" method="POST">
                <img src="img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Username</h5>
                        <input type="text" name="un">
                   </div>
                </div>
                <div class="input-div pass">
                   <div class="i"> 
                        <i class="fas fa-lock"></i>
                   </div>
                   <div class="div">
                        <h5>Password</h5>
                        <input type="text" name="ps">
                   </div>
                </div>
                <a href="#"></a>
                <input type="submit" name="sub" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
