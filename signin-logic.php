<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    // get the form data
    $username_email = filter_var(
        $_POST['username_email'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $password = filter_var(
        $_POST['password'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    // Validate inputs
    if (!$username_email) {
        $_SESSION['signin'] = 'Username or Email required';
    } elseif (!$password) {
        $_SESSION['signin'] = 'Password is required';
    } else {
        // Fetch user from database
        $fetch_user_query = "SELECT * FROM blogusers WHERE username = '$username_email' OR email='$username_email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if (mysqli_num_rows($fetch_user_result) == 1) {
            // convert the record into Array
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            // Compare form password with database password
            if (password_verify($password, $db_password)) {
                // set session for action control
                $_SESSION['user_id'] = $user_record['id'];
                // set session if user is an admin
                if ($user_record['is_admin'] == 1) {
                    $_SESSION['user_is_admin'] = true;
                }
                // log user in
                header('Location: ' . ROOT_URL . 'Admin/');
            } else {
                $_SESSION['signin'] = 'Please check your input';
            }
        } else {
            $_SESSION['signin'] = 'User not found';
        }
    }
    // If any error redirect back to signin page with login data
    if (isset($_SESSION['signin'])) {
        $_SESSION['signin-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'signin.php');
        die();
    }
} else {
    header('Location: ' . ROOT_URL . 'signin.php');
    die();
}
?>
