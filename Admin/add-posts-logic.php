<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user_id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];
    $body = filter_var($_POST['body'], FILTER_SANITIZE_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var(
        $_POST['is_featured'],
        FILTER_SANITIZE_NUMBER_INT
    );

    // Set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ?: 0;

    // Validate form data
    if (!$title) {
        $_SESSION['add-post'] = 'Enter post title';
    } elseif (!$category_id) {
        $_SESSION['add-post'] = 'Select post category';
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = 'Choose post thumbnail';
    } elseif (!$body) {
        $_SESSION['add-post'] = 'Enter post body';
    } else {
        // Work on thumbnail
        // Rename image
        $time = time(); //Make each image name unique
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        // Make sure file is an image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        // Check if image extension is in allowed files
        if (in_array($extension, $allowed_files)) {
            // Make sure image size is not too big, max(2mb)
            if ($thumbnail['size'] < 2_000_000) {
                // Upload thumbnail
                move_uploaded_file(
                    $thumbnail_tmp_name,
                    $thumbnail_destination_path
                );
            } else {
                $_SESSION['add-post'] =
                    'File size too big, should be less than 2mb.';
            }
        } else {
            $_SESSION['add-post'] = 'File should be png, jpg or jpeg';
        }
    }

    // If any error redirect back (with form data) to add-posts page
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'Admin/add-posts.php');
        die();
    } else {
        // Set is_featured of all posts to 0 if is_featured for the current post is 1
        if ($is_featured == 1) {
            $zero_all_is_featured_query = 'UPDATE posts SET is_featured=0';
            $zero_all_is_featured_result = mysqli_query(
                $connection,
                $zero_all_is_featured_query
            );
        }
        //Insert post into database
        $query = "INSERT INTO posts (title, thumbnail, body, category_id, author_id, is_featured) VALUES ('$title', '$thumbnail_name', '$body', $category_id, $author_id, $is_featured)";
        $result = mysqli_query($connection, $query);

        //If connection was successful
        if (!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = 'New post was added succesfully!';
            header('Location: ' . ROOT_URL . 'Admin/');
            die();
        }
    }
}

header('Location: ' . ROOT_URL . 'Admin/add-posts.php');
die();
