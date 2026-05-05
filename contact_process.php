<?php
session_start();
require_once "classes/Contact.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (empty($name) || empty($email) || empty($message)) {
        $_SESSION['error'] = "Ju lutem plotësoni të gjitha fushat!";
        header("Location: contact.php");
        exit();
    }

    $contactObj = new Contact();
    
    if ($contactObj->saveMessage($name, $email, $message)) {
        $_SESSION['success'] = "Mesazhi u dërgua me sukses! Do t'ju kontaktojmë së shpejti.";
    } else {
        $_SESSION['error'] = "Pati një problem teknik. Ju lutem provoni përsëri.";
    }

    header("Location: contact.php");
    exit();
} else {
    header("Location: contact.php");
    exit();
}