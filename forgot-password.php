<?php
include_once './includes/single_header.php'; ?> 
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== Custom CSS StyleSheet ============-->
    
    <script src="https://kit.fontawesome.com/7c5a9b010c.js" crossorigin="anonymous"></script>
    <!--============= Google Fonts MontSerrat ===============-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="<?= ROOT_URL ?>CSS/styles.css" />
    <title>Blogify Application</title>
  </head>
  <body class="form-body">
    
    <section class="form__section forgot-psw-container">
      <!-- Include nav Logo file -->
      <?php include_once 'includes/logo_nav.php'; ?>
      <div class="container form__section-container">
        <h2 class="center___title">Change Password</h2>
        <span class="text__Center">It's a pleasure to have you back. Enter your credentials to proceed!</span>

        <div class="alert__message success">
          <p>
            <i class="fas fa-check-circle"></i>
            This is a Success message
          </p>
        </div>
        <form action="" enctype="multipart/form-data">
          <div class="flex-input">
            <div class="form__control form_controls">
              <span class="input-button"><i class="fas fa-user custom-item"></i></span>
              <input
                type="text"
                name="userName"
                id="userName"
                placeholder="Username or Email"
              />
            </div>

            <div class="form__control form_controls">
              <span class="input-button"><i class="fas fa-lock custom-item"></i></span>
              <input
                type="password"
                name="lastpassword"
                id="lastpassword"
                placeholder="Last used password"
              />
            </div>
          </div>

          <div class="form__control">
            <label class="container-x">
              <input type="checkbox" checked="checked" />
              <div class="checkmark"></div>
              <span>Remember Me</span>
            </label>
          </div>

          <div class="center-items">
             <div class="flex_full_width">
                <button type="submit" class="btn btn-edit" name="submit">
                  <span class="text">Change Password</span>
                </button>
                
                <small class="small">
                  Remember Password?
                  <a href="<?= ROOT_URL ?>signin.php">Back to Sign In</a>
                </small>
             </div>
          </div>
        </form>
      </div>
    </section>
    

<script src="<?= ROOT_URL ?>JS/App.js">
</script>