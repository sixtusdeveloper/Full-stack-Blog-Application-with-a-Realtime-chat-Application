<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    // Get updated form data 
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstName = filter_var(
        $_POST['firstName'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $lastName = filter_var(
        $_POST['lastName'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    // Check for valid form inputs
    if (!$firstName || !$lastName) {
        $_SESSION['edit-user'] = 'Invalid Form input on edit page.';
    } else {
        // update user
        $query = "UPDATE blogusers SET firstname='$firstName', lastname='$lastName', is_admin=$is_admin WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_errno($connection)) {
            $_SESSION['edit-user'] = 'Failed to update user';
        } else {
            $_SESSION[
                'edit-user-success'
            ] = "User $firstName $lastName was updated successfully!";
        }
    }
}

header('Location: ' . ROOT_URL . 'Admin/manage-user.php');
die();
