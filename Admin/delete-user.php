<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch user from database
    $query = "SELECT * FROM blogusers WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    // Make sure only one user is fetched
    if (mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;
        // Delete image if available
        if ($avatar_path) {
            unlink($avatar_path);
        }
    }

    // FOR LATER=======================================
    // Fetch thumbnails of user's posts and delete them

    $thumbnails_query = "SELECT thumbnail FROM posts WHERE author_id = $id";
    $thumbnails_result = mysqli_query($connection, $thumbnails_query);
    if (mysqli_num_rows($thumbnails_result) > 0) {
        while ($thumbnail = mysqli_fetch_assoc($thumbnails_result)) {
            $thumbnail_path = '../images/' . $thumbnail_name['thumbnail'];

            // Delete thumnail from images folder if exist
            if ($thumbnail_path) {
                unlink($thumbnail_path);
            }
        }
    }

    // Delete user from database
    $delete_user_query = "DELETE FROM blogusers WHERE id=$id";
    $delete_user_result = mysqli_query($connection, $delete_user_query);
    if (mysqli_errno($connection)) {
        $_SESSION[
            'delete-user'
        ] = "Couldn't delete {$user['firstname']} {$user['lastname']}";
    } else {
        $_SESSION[
            'delete-user-success'
        ] = "{$user['firstname']} {$user['lastname']} was deleted successfully";
    }
}

header('Location: ' . ROOT_URL . 'Admin/manage-user.php');
die();
