<?php
include('connection.php');
session_start();

if (!isset($_SESSION['un'])) {
    header("Location: indexpage.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM donor_register WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header("Location: donor-list.php");
    exit;
} else {
    header("Location: donor-list.php");
    exit;
}
?>
