<?php
require 'config/database.php';

// Make sure the edit page button was clicked
if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var(
        $_POST['previous_thumbnail_name'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'],FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // Set is_featured to 0 if it was unchecked
    $is_featured = $is_featured == 1 ?: 0;

    // Check and valid input values
    if (!$title) {
        $_SESSION['edit-post'] =
            "Couldn't valid post. Invalid form data on edit form page";
    } elseif (!$category_id) {
        $_SESSION['edit-post'] =
            "Couldn't update post. Invalid form data on edit form page";
    } elseif (!$body) {
        $_SESSION['edit-post'] =
            "Couldn't update post. Invalid form data on edit form page";
    } else {
        // Delete Existing thumbnail if new thumbnail is available
        if ($thumbnail['name']) {
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            if ($previous_thumbnail_path) {
                unlink($previous_thumbnail_path);
            }

            // Work on the New thumbnail
            // Rename image
            $time = time(); //Make each image name unload unique using current timestamp
            $thumbnail_name = $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name;

            // Make sure the uploaded file is an image
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);

            if (in_array($extension, $allowed_files)) {
                // Make sure avatar is not too large(2mb+)
                if ($thumbnail['size'] < 2000000) {
                    // Upload avatar
                    move_uploaded_file(
                        $thumbnail_tmp_name,
                        $thumbnail_destination_path
                    );
                } else {
                    $_SESSION['edit-post'] =
                        "Couldn't update post. Thumbnail size too big, should be less than 2mb";
                }
            } else {
                $_SESSION['edit-post'] =
                    "Couldn't update post. Thumbnail should png, jpg or jpeg";
            }
        }
    }

    if ($_SESSION['edit-post']) {
        // Redirect to mange page if form was invalid
        header('Location: ' . ROOT_URL . 'Admin/');
        die();
    } else {
        // Set is_featured for all post to 0. if is_featured for the current post is 1
        if ($is_featured == 1) {
            $zero_all_is_featured_query = 'UPDATE posts SET is_featured = 0';
            $zero_all_is_featured_result = mysqli_query(
                $connection,
                $zero_all_is_featured_query
            );
        }

        // Set thumbnail name if new one was uploaded, else keep old thumbnail name
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        // Update the data from the table
        $query = "UPDATE  posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert', category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
    }

    // If No issues
    if (!mysqli_errno($connection)) {
        $_SESSION['edit-post-success'] = 'Post was updated successfully';
    }
}

header('Location: ' . ROOT_URL . 'Admin/');
die();
