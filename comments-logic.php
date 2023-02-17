<?php
require 'config/database.php';

// Sanitizing the input data
if (isset($_POST['submit_comment'])) {
    $fullName = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $userEmail = filter_var($_POST['user-email'], FILTER_VALIDATE_EMAIL);
    $userMsg = filter_var(
        $_POST['message'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    // Validating the input fields
    if (!$fullName && !$userEmail && !$userMsg) {
        $_SESSION['comment'] = 'All fields are required!';
    } elseif (!$fullName) {
        $_SESSION['comment'] = 'Name is required!';
    } elseif (!$userEmail) {
        $_SESSION['comment'] = 'Enter a valid Email address!';
    } elseif (!$userMsg) {
        $_SESSION['comment'] = "Can't process an empty text body!";
    } else {
        // INSERT USER COMMENT INTO DATABASE
        $_SESSION['comment-success'] = 'Comment was posted successfully !';
        $comment_query = "INSERT INTO comments (name, email, message) VALUES ('$fullName', '$userEmail', '$userMsg')";
        $comment_result = mysqli_query($connection, $comment_query);
        header('Location: ' . ROOT_URL . 'index.php');
        die();
    }
}
header('Location: ' . ROOT_URL . 'index.php');
die();
