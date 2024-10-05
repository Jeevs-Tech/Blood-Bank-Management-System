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

    try {
        // Begin transaction
        $conn->beginTransaction();

        // Delete the donor from the exchange_blood table
        $stmt = $conn->prepare("DELETE FROM exchange_blood WHERE id = ?");
        $stmt->execute([$id]);

        // Commit the transaction
        $conn->commit();
        header("Location: exchange_list.php");
        exit;
    } catch (PDOException $e) {
        // Rollback the transaction on error
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid ID.";
}
?>
