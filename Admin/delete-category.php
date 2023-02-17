<?php
require 'config/database.php';
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //FOR LATER
    //update category_id of posts that belongs to the deleted/current category to the id of the Uncategorized category

    $update_query = "UPDATE posts SET category_id=21 WHERE category_id=$id";
    $update_result = mysqli_query($connection, $update_query);
    // $result = mysqli_fetch_assoc($update_result); 
    // Unfinished code here

    if (!mysqli_errno($connection)) {
        //Delete category
        $query = "DELETE FROM category WHERE id = $id LIMIT 1";
        $result = mysqli_query($connection, $query);
        $_SESSION['delete-category-success'] =
            ' Category was deleted successfully!';
    }
    else{
        //Delete category unsuccessfully
        $_SESSION['delete-category'] =
            "Couldn't delete Category!";
    }
}
header('Location: ' . ROOT_URL . 'Admin/manage-category.php');
die();
