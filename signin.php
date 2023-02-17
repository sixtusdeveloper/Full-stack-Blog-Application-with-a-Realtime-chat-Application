<?php
//Include single_header file
include 'includes/single_header.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

// Unset signin data
unset($_SESSION['signin-data']);

?>

    <section class="form__section forgot-psw-container">
      <!-- include Logo nav file -->
      <?php include_once 'includes/logo_nav.php'; ?>
      <div class="container form__section-container">
        <h2 class="center___title">Sign In</h2>
        <span class="text__Center">It's a pleasure to have you back. Enter your credentials to proceed!</span>
        <!-- SCRIPT -->
        <?php if (isset($_SESSION['signup-success'])): ?>
        <div class="alert__message success">
          <p>
            <i class="fas fa-check-circle"></i>
            <?=
            $_SESSION['signup-success'];
            unset($_SESSION['signup-success']);
            ?>
          </p>
        </div>
        <!-- script -->
        <?php elseif (isset($_SESSION['signin'])): ?>
          <div class="alert__message error" id="remove__error_three">
            <p class="space_center"><span>
              <i class="fas fa-exclamation-circle"></i>
              <?=
              $_SESSION['signin'];
              unset($_SESSION['signin']);
              ?>
              </span>
              <i class="fas fa-times remove-msg" onclick="removeErrMsgThree()"></i>
            </p>
          </div>
          <!-- script -->
        <?php endif; ?>
        <form action="<?= ROOT_URL ?>signin-logic.php" class="service__contact_form" method="POST">
          <div class="flex-input">
            <div class="form__control form_controls">
              <span class="input-button"><i class="fas fa-user custom-item"></i></span>
              <input
              type="text"
              name="username_email"
              id="username"
              value="<?= $username_email ?>"
              placeholder="Username or Email"
              />
            </div>
            
            <div class="form__control form_controls">
              <span class="input-button"><i class="fas fa-lock custom-item"></i></span>
              <input
              type="password"
              name="password"
              id="password"
              placeholder="Password"
              value="<?= $password ?>"
              />
            </div>
          </div>
         
          <div class="flex-input">
            <div class="form__control">
              <label class="container-x">
                <input type="checkbox" name="remember_user" />
                <div class="checkmark"></div>
                <span>Remember Me</span>
              </label>
            </div>
            <small class="small">
              Forgot Password?
              <a href="<?= ROOT_URL ?>forgot-password.php">click here</a>
            </small>
          </div>

          <div class="center-items">
            <div class="flex_full_width">
              <button type="submit" class="btn btn-edit" name="submit">
                <span class="text">Sign In</span>
              </button>
            
              <small class="small">
                Don't have an account?
                <a href="<?= ROOT_URL ?>signup.php">Sign Up</a>
              </small>
            </div>
          </div>
        </form>
      </div>
    </section>
  
  <script src="<?= ROOT_URL ?>JS/App.js">
  </script>