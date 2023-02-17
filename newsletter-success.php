<?php
include_once './includes/signout-header.php';
// Fetch users from database but not current users
$query = "SELECT email FROM newsletter ORDER BY id DESC";
$users = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($users);

?>
    <section class="form__section forgot-psw-container">
      <!-- include Logo nav file -->
      <?php include_once 'includes/logo_nav.php'; ?>
      <div class="container form__section-container">
        <h2 class="center___title font-size-resized">Thanks <?= $user['email'] ?></h2>
        <p class="text__Center notification-txt">You will be notified on any new updates from Blogify.</p>
        <span class="text__Center">Great Job! You'll never miss any updates from us.</span>  
         <div class="newsletter-container">
            <div class="center-items reverse">
                  
                  <div class="lg alert__message success">
                    <p>
                    <i class="fas fa-check-circle"></i>
                    Successfully subscribed!
                    </p>
                  </div>
                  <button  class="btn newsletter__btn" onclick="redirect_current_URL()" id="submit-btn">Back to home</button>
            </div>
         </div>
      </div>
    </section>

    <script type="text/javascript">
      function redirect_current_URL(){
        const redirect__home = document.querySelector('#success-btn');
        load_URL = 'http://localhost/xampp/PHP-NEW-PROJECT/FullStack-Blog-App/Assets/';
        window.location.replace(load_URL);
      }

    </script>
 