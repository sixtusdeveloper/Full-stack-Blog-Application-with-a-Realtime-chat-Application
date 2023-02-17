<?php
require 'includes/signout-header.php';

// Fetch users from database but not current users
$id = $_SESSION['user_id'];
$query = "SELECT firstname, lastname FROM blogusers WHERE id=$id";
$users = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($users);

// Fetch current user from database
// if (isset($_SESSION['user_id'])) {
//     $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
//     $query = "SELECT avatar FROM blogusers WHERE id=$id";
//     $result = mysqli_query($connection, $query);
//     $avatar = mysqli_fetch_assoc($result);
// }
?>

<section class="form__section forgot-psw-container">
  <!-- Include nav Logo file -->
  <?php include_once 'includes/logo_nav.php'; ?>
  <div class="container form__section-container">
    <a href="<?= ROOT_URL ?>Admin/" class="signout-button-link"><span class="cancel-signout-btn"><i class="fas fa-times"></i></span></a>

    <h2 class="center___title logout__title"><span class="logout-name">Oops!!!</span>&nbsp;<?= "{$user['firstname']} {$user['lastname']}" ?></h2>
    <span class="text__Center">You are about to Signout Now</span>

    <div class="alert__message error">
      <p>
        
        Are you sure you want to Signout?
      </p>
    </div>

    <div class="logout_user_img"><img src="<?= ROOT_URL .
        'images/' .
        $avatar['avatar'] ?>" alt="An image of user"></div>
    
    <a href="<?= ROOT_URL ?>signout.php" class="noselect"><span class="text">Confirm</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></a>
  </div>
</section>


