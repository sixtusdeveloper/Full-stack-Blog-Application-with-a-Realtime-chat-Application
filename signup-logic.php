<?php
require 'config/database.php';
// require 'config/constants.php';

// Get Signup form data if signup form button was clicked
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
    $avatar = $_FILES['avatar'];
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    // if(preg_match("/^([0-9][10])$)/", $phone));
    $termspolicy = filter_var($_POST['termspolicy'], FILTER_VALIDATE_BOOL);

    // Phone number
    $pattern = '/^\+[1-9]{1}[0-9]{1,14}$/';

    // Vaidate input values
    if (!$firstName) {
        $_SESSION['signup'] = 'Enter your First name';
    } elseif (!$lastName) {
        $_SESSION['signup'] = 'Enter your Last name';
    } elseif (!$userName) {
        $_SESSION['signup'] = 'Enter your Username';
    } elseif (!$email) {
        $_SESSION['signup'] = 'Enter your email Address';
    } elseif (!$createpassword) {
        $_SESSION['signup'] = 'Enter your password';
    } elseif (!$confirmpassword) {
        $_SESSION['signup'] = 'Confirm your Password';
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = 'Password should be atleast 8 characters';
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = 'Add an Avatar';
    } elseif (!$phone) {
        $_SESSION['signup'] = 'Enter your Phone number';
    } elseif (!is_numeric($phone)) {
        $_SESSION['signup'] = 'Enter a valid Phone number';
    } elseif (!preg_match($pattern, $phone)) {
        $_SESSION['signup'] = 'Phone number should contain your country code';
    } elseif (!$termspolicy) {
        $_SESSION['signup'] = 'Please agree to the Terms & Conditions';
    } else {
        // check if passwords don't matach
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Passwords doesn't match, try again";
        } else {
            // hash passwords
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // Check if username or Email already exist in the database
            $user_check_query = "SELECT * FROM blogusers WHERE username='$userName' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = 'Username or Email already exist';
            } else {
                // Work on the Avatar
                // Rename Avatar
                $time = time(); // Make each image name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

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
                        $_SESSION['signup'] =
                            'File size too big, should be less than 1mb';
                    }
                } else {
                    $_SESSION['signup'] = 'File should be png, jpg or jpeg';
                }
            }
        }
    }
    // Redirect back to signup page if any error
    if (isset($_SESSION['signup'])) {
        // pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'signup.php');
        die();
    } else {
        // Insert new user into the database
        $insert_user_query = "INSERT INTO blogusers (firstname, lastname, username, email,
         password, avatar, is_admin, phone, terms_conditions) VALUES ('$firstName','$lastName','$userName','$email','$hashed_password','$avatar_name', 0, $phone, $termspolicy)";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            // Redirect to Signin page with a Success message
            $_SESSION['signup-success'] =
                'Registration successful. Please Login';
            header('Location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }
} else {
    // If button wasn't clicked, then bounce back to signup page
    header('Location: ' . ROOT_URL . 'signup.php');
    die();
}
