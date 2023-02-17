<?php
require '../includes/header.php';

// Check Signin Status
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . ROOT_URL . 'signin.php');
    die();
}
