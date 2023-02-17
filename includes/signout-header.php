<?php
require 'config/database.php';
// Fetch current user from database
if (isset($_SESSION['user_id'])) {
    $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM blogusers WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== Custom CSS StyleSheet ============-->
    <script src="https://kit.fontawesome.com/7c5a9b010c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= ROOT_URL ?>CSS/styles.css" />
    <!--============= Google Fonts MontSerrat ===============-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>Blogify Application</title>
  </head>
  <body class="form-body">
    


