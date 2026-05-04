<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

require_once "../classes/Product.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productObj = new Product();
    
    if ($productObj->delete($id)) {
       
        header("Location: products.php?deleted=1");
        exit;
    } else {
        echo "❌ Nuk u arrit të fshihej produkti.";
    }
} else {
    header("Location: products.php");
    exit;
}
?>