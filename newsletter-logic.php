<?php
require 'config/database.php';
if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $_SESSION['newsletter'] = 'Enter a valid email address!';
    } else {
        // Check if username or Email already exist in the database
        $user_check_query = "SELECT * FROM newsletter WHERE email='$email'";
        $user_check_result = mysqli_query($connection, $user_check_query);
        if (mysqli_num_rows($user_check_result) > 0) {
            $_SESSION['newsletter'] = 'Email address already exist!';
        }
    }
    // Redirect back to signup page if any error
    if (isset($_SESSION['newsletter'])) {
        // pass form data back to signup page
        $_SESSION['newsletter-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'index.php');
        die();
    } else {
        $query = "INSERT INTO newsletter (email) VALUES ('$email')";
        $result = mysqli_query($connection, $query);
        if (!mysqli_errno($connection)) {
            // Redirect to Signin page with a Success message
            $_SESSION['newsletter-success'] = 'Subscription successful';
            header('Location: ' . ROOT_URL . 'newsletter-success.php');
            die();
        }
    }
}
header('Location: ' . ROOT_URL . 'index.php');
die();
