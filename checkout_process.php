<?php
session_start();
require_once "classes/Order.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $total = 150.00; // I njëjti total si te checkout.php

    $orderObj = new Order();
    
    if ($orderObj->placeOrder($user_id, $address, $phone, $total)) {
        echo "<script>alert('Porosia u krye me sukses!'); window.location.href='index.php';</script>";
    } else {
        echo "Gabim gjatë procesimit të porosisë.";
    }
}