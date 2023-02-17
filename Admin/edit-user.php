<?php
// Include header file
include_once 'includes/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM blogusers WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
} else {
    header('Location: ' . ROOT_URL . 'Admin/manage-user.php');
    die();
}
?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to the Edit User portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to Modify and Edit your Users as a User.
          Be informed, all changes are updated as soon as you're done. However, you still have the privilege to reverse any changes any time.
          Take your time as we have your back.
          </p>
          <a href="#edit_user">
            <button class="blog-button">Edit Users
            </button>
          </a>
        </div>
      </div>
    </section>
    
    <section class="form__section form-section-bg" id="edit_user">
      <div class="container form__section-container">
        <h2>Edit User</h2>
        
        <form action="<?= ROOT_URL ?>Admin/edit-user-logic.php" method="POST">
          <div class="flex-input">
            <div class="form__control">
              <input
                type="hidden"
                value="<?= $user['id'] ?>"
                name="id"
              />
              <input
                type="text"
                id="firstName"
                value="<?= $user['firstname'] ?>"
                name="firstName"
                placeholder="Firstname"
              />
            </div>

            <div class="form__control">
              <input
                type="text"
                name="lastName"
                id="lastName"
                 value="<?= $user['lastname'] ?>"
                placeholder="Lastname"
              />
            </div>
          </div>
          <div class="form__control">
            <select name="userrole">
              <option value="0">Author</option>
              <option value="1">Admin</option>
            </select>
          </div>
          <div class="center-items">
            <div class="flex_full_width">
              <button type="submit" class="btn btn-edit" name="submit">
                <span class="text">Update User</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <!-- Include footer file -->
    <?php include_once '../includes/footer.php'; ?>
 
