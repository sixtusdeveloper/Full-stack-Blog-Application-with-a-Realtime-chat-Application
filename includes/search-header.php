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
    <link rel="stylesheet" href="<?= ROOT_URL ?>CSS/all.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>CSS/aos.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>CSS/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>CSS/owl.theme.default.min.css" />
    <!--============= Google Fonts MontSerrat ===============-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>Blogify Application</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="container nav__container">
       <a href="<?= ROOT_URL ?>index.php" class="nav__logo"><img src="<?= ROOT_URL ?>project_images/Blogify-logo.png" alt="An image of logo"></a>
        <span class="fas fa-angle-up" id="scroll-top"></span>


        <ul class="nav__items">
          <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
          <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
          <li><a href="<?= ROOT_URL ?>main-services.php">Services</a></li>
          <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
          <!-- check if user is admin -->
          <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav__profile">
              <div class="avatar">
                <img src="<?= ROOT_URL .
                    'images/' .
                    $avatar['avatar'] ?>" alt="Avatar image one" />
              </div>
              <ul class="user_items">
                <?php
                // $id = $_SESSION($_POST['username']);
                $query = "SELECT username FROM blogusers WHERE id=$id ORDER BY id DESC";
                $users = mysqli_query($connection, $query);
                $user = mysqli_fetch_assoc($users);
                ?>
                <li><a href="<?= ROOT_URL ?>Admin/index.php"><?= $user[
    'username'
] ?></a></li>
                <li><a href="<?= ROOT_URL ?>Admin/index.php">Dashboard</a></li>
                <li><a href="<?= ROOT_URL ?>Admin/account.php">User Profile</a> </li>
                <li><a href="<?= ROOT_URL ?>signout_confirm.php">Logout</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li><a href="<?= ROOT_URL ?>signin.php">
             <button class="btn signin__btn">Sign in
            </button>
           </a></li>   
          <?php endif; ?>
        </ul>

        <button id="open__nav-btn"><i class="fas fa-bars"></i></button>
        <button id="close__nav-btn"><i class="fas fa-times"></i></button>
      </div>
    </nav>
