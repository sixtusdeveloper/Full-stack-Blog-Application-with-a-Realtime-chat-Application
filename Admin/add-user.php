<?php
// Include header file
include_once 'includes/header.php';
// Get form data is there was an error
$firstName = $_SESSION['add-user-data']['firstName'] ?? null;
$lastName = $_SESSION['add-user-data']['lastName'] ?? null;
$userName = $_SESSION['add-user-data']['userName'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;
// Delete session data
unset($_SESSION['add-user-data']);
?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to the Add User portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to Add New Users as a User.
          Be informed, all changes are updated as soon as you're done. However, you still have the privilege to reverse any changes any time.
          Take your time as we have your back.
          </p>
          <a href="#add_user">
            <button class="blog-button">Add a User
            </button>
          </a>
        </div>

      </div>
    </section>
    <section class="form__section" id="add_user">
      <div class="container form__section-container">
        <h2>Add User</h2>
        <?php if (isset($_SESSION['add-user'])): ?>
          <div class="alert__message error" id="remove__error_six">
            <p  class="space_center"><span>
              <i class="fas fa-exclamation-circle"></i>
              <?=
              $_SESSION['add-user'];
              unset($_SESSION['add-user']);
              ?>
              </span>
              <i class="fas fa-times remove-msg" onclick="removeErrMsgSix()"></i>
            </p>
          </div>
        <?php endif; ?>
        <form action="<?= ROOT_URL ?>Admin/add-user-logic.php" enctype="multipart/form-data" method="POST">
          <div class="flex-input">
            <div class="form__control">
              <input
                type="text"
                name="firstName"
                id="firstName"
                value="<?= $firstName ?>"
                placeholder="First Name"
              />
            </div>
            <div class="form__control">
              <input
                type="text"
                name="lastName"
                id="lastName"
                value="<?= $lastName ?>"
                placeholder="Last Name"
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
              <input type="email" name="email" id="email" value="<?= $email ?>"placeholder="Email" />
            </div>
          </div>

          <div class="flex-input">
            <div class="form__control">
              <input
                type="password"
                name="createpassword"
                id="createpassword"
                value="<?= $createpassword ?>"
                placeholder="Create Password"
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
              <label for="avatar">User Role</label>
              <select name="userrole">
                <option value="0">Author</option>
                <option value="1">Admin</option>
              </select>
            </div>

            <div class="form__control">
              <label for="avatar">User Avatar</label>
              <input type="file" id="avatar" name="avatar" />
            </div>
          </div>
          <div class="center-items">
            <div class="flex_full_width">
              <button type="submit" class="btn btn-edit" name="submit">
                <span class="text">Add User</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- Include footer file -->
    <?php include_once '../includes/footer.php'; ?>
 