<?php
include_once 'includes/single_header.php';
// get back form data if there was a registration error
$firstName = $_SESSION['signup-data']['firstName'] ?? null;
$lastName = $_SESSION['signup-data']['lastName'] ?? null;
$userName = $_SESSION['signup-data']['userName'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
$phone = $_SESSION['signup-data']['phone'] ?? null;

// Delete signup data session
unset($_SESSION['signup-data']);
?>


  
    <section class="form__section forgot-psw-container">
      <!--- include Logo nav file --->
      <?php include_once 'includes/logo_nav.php'; ?>
      <div class="container form__section-container">
        <h2 class="center___title">Sign Up</h2>
        <span class="text__Center">It's a pleasure to have you back. Enter your credentials to proceed!</span>
        <!-- PHP SCRIPT -->
        <?php if (isset($_SESSION['signup'])): ?> 
          <div class="alert__message error" id="remove__error">
            <p class="space_center"><span>
              <i class="fas fa-exclamation-circle"></i>
              <?=
              $_SESSION['signup'];
              unset($_SESSION['signup']);
              ?>
              </span>
              <i class="fas fa-times remove-msg" onclick="removeErrMsg1()"></i>
            </p>
          </div>
        <?php endif; ?>
        <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
          <div class="flex-input">
            <div class="form__control">
              <input
                type="text"
                name="firstName"
                id="firstName"
                placeholder="First Name"
                value="<?= $firstName ?>"
              />
            </div>
            <div class="form__control">
              <input
                type="text"
                name="lastName"
                id="lastName"
                placeholder="Last name"
                value="<?= $lastName ?>"
              />
            </div>
          </div>

          <div class="flex-input">
            <div class="form__control">
              <input
                type="text"
                name="userName"
                id="userName"
                value="<?= $userName ?>"
                placeholder="Username"
              />
            </div>

            <div class="form__control">
              <input type="email" name="email" id="email" value="<?= $email ?>" placeholder="Email" />
            </div>
          </div>

          <div class="flex-input">
            <div class="form__control">
              <input
                type="password"
                name="createpassword"
                id="createpassword"
                value="<?= $createpassword ?>"
                placeholder="Password"
              />
            </div>

            <div class="form__control">
              <input
                type="password"
                name="confirmpassword"
                id="confirmpassword"
                value="<?= $confirmpassword ?>"
                placeholder="Confirm Password"
              />
            </div>
          </div>
          
          <div class="flex-input">
            <div class="form__control">
              <label for="avatar" class="label-txt">Add avatar</label>
              <input type="file" id="avatar" name="avatar" />
            </div>
            <div class="form__control">
              <label for="phone" class="label-txt">Phone number</label>
              <input type="text" id="phone" name="phone" value="<?= $phone ?>"placeholder="+234 9022-345-505" />
            </div>
          </div>

          <div class="form__control">
            <label class="container-x" for="termspolicy">
              <input type="checkbox" id="termspolicy" name="termspolicy"/>
              <div class="checkmark"></div>
              <span class="flex_inline">
                Agree to &nbsp;
                <a href="<?= ROOT_URL ?>terms_policy.php" class="policy__link">
                  <button class="condition-btn">
                    <a href="<?= ROOT_URL ?>terms_policy.php">Terms & Conditions</a>
                    <svg stroke-width="4" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linejoin="round" stroke-linecap="round"></path>
                    </svg>
                  </button>
                </a>
              </span>
            </label>
          </div>
          <div class="center-items">
            <div class="flex_full_width">
              <button type="submit" class="btn btn-edit" name="submit">
                <span class="text">Sign Up</span>
              </button>
              <small class="small">
                Already have an account?
                <a href="<?= ROOT_URL ?>signin.php">Sign In</a>
              </small>
            </div>
          </div>
        </form>
      </div>
    </section>
    
<script src="<?= ROOT_URL ?>JS/App.js">
</script>