<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    // Get Form data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var(
        $_POST['description'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    // Validation
    if (!$title) {
        $_SESSION['add-category'] = 'Enter a title for your category';
    } elseif (!$description) {
        $_SESSION['add-category'] = 'Enter a description for your category';
    }

    // redirect back to add category page with form data if there was invalid input
    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'Admin/add-category.php');
        die();
    } else {
        // insert category data into database
        $query = "INSERT INTO category (title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($connection, $query);
        if (mysqli_errno($connection)) {
            $_SESSION['add-category'] = "Couldn't add category";
            header('Location: ' . ROOT_URL . 'Admin/add-category.php');
            die();
        } else {
            $_SESSION[
                'add-category-success'
            ] = "$title Category was added succesfully";
            header('Location: ' . ROOT_URL . 'Admin/manage-category.php');
            die();
        }
    }
}
