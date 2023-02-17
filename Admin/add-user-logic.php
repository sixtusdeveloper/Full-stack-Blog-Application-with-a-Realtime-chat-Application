<?php
require 'config/database.php';
// require 'config/constants.php';

// Get form data if submit form button was clicked
if (isset($_POST['submit'])) {
    $firstName = filter_var(
        $_POST['firstName'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $lastName = filter_var(
        $_POST['lastName'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $userName = filter_var(
        $_POST['userName'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var(
        $_POST['createpassword'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $confirmpassword = filter_var(
        $_POST['confirmpassword'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // Vaidate input values
    if (!$firstName) {
        $_SESSION['add-user'] = 'Please enter your Firstname';
    } elseif (!$lastName) {
        $_SESSION['add-user'] = 'Please enter your Lastname';
    } elseif (!$userName) {
        $_SESSION['add-user'] = 'Please enter a Username';
    } elseif (!$email) {
        $_SESSION['add-user'] = 'Please enter a valid Email address!';
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['add-user'] = 'Password should be atleast 8 characters';
    } elseif (!$avatar['name']) {
        $_SESSION['add-user'] = 'Please add an Avatar';
    } else {
        // check if passwords don't matach
        if ($createpassword !== $confirmpassword) {
            $_SESSION['add-user'] = 'Passwords do not match, try again';
        } else {
            // hash passwords
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // Check if username or Email already exist in the database
            $user_check_query = "SELECT * FROM blogusers WHERE username='$userName' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['add-user'] = 'Username or Email already exist';
            } else {
                // Work on the Avatar
                // Rename Avatar
                $time = time(); // Make each image name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;

                //   Make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    // Make sure image is not too large(1mb+)
                    if ($avatar['size'] < 1000000) {
                        //  Upload avatar
                        move_uploaded_file(
                            $avatar_tmp_name,
                            $avatar_destination_path
                        );
                    } else {
                        $_SESSION['add-user'] =
                            'File size too big, should be less than 1mb';
                    }
                } else {
                    $_SESSION['add-user'] = 'File should be png, jpg or jpeg';
                }
            }
        }
    }
    // Redirect back to add-user page if any error
    if (isset($_SESSION['add-user'])) {
        // pass form data back to add-user page
        $_SESSION['add-user-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'Admin/add-user.php');
        die();
    } else {
        // Insert new user into the database
        $insert_user_query = "INSERT INTO blogusers SET firstname ='$firstName', lastname='$lastName', username= '$userName', email='$email',
         password='$hashed_password', avatar='$avatar_name', is_admin=$is_admin";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            // Redirect to Manage-user page with a Success message
            $_SESSION[
                'add-user-success'
            ] = "New user $firstName $lastName was added successfully.";
            header('Location: ' . ROOT_URL . 'Admin/manage-user.php');
            die();
        }
    }
} else {
    // If button wasn't clicked, then bounce back to signup page
    header('Location: ' . ROOT_URL . 'Admin/add-user.php');
    die();
}
