

<?php
// Include the database connection file
require_once 'connection.php';
echo "hi";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values submitted via the form
    $name = $_POST['name'];
    $password = $_POST['password']; 
    echo $name;

    try {
        // Prepare a SQL statement to insert user data
        $stmt = $conn->prepare("INSERT INTO admin (uname, pass) VALUES (:uname, :pass)");
        $stmt->bindParam(':uname', $name);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();

        echo "User registered successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>