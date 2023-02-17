<?php
// Include header file
include_once 'includes/header.php';
// Get back form data if invalid
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

// Delete form data
unset($_SESSION['add-category-data']);
?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
         <h1 class="content_title">
            Welcome to the Add Category portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to Add New Category as a User.
          Be informed, all changes are updated as soon as you're done. However, you still have the privilege to reverse any changes any time.
          Take your time as we have your back.
          </p>
          <a href="#add-category">
            <button class="blog-button">Add Category
            </button>
          </a>
        </div>

      </div>
    </section>
    <section class="form__section" id="add-category">
      <div class="container form__section-container">
        <h2>Add Category</h2>
        <?php if (isset($_SESSION['add-category'])): ?>
          <div class="alert__message error" id="remove__error_five">
            <p class="space_center"><span>
              <i class="fas fa-exclamation-circle"></i>
              <?=
              $_SESSION['add-category'];
              unset($_SESSION['add-category']);
              ?>
              </span>
              <i class="fas fa-times remove-msg" onclick="removeErrMsgFive()"></i>
            </p>
          </div> 
           
        <?php endif; ?>
        <form action="<?= ROOT_URL ?>Admin/add-category-logic.php" method="POST">
          <div class="form__control">
            <input
              type="text"
              id="username"
              name="title"
              value="<?= $title ?>"
              placeholder="Title"
              />
          </div>

          <div class="form__control">
            <textarea
            id="textarea"
            cols=""
            rows="10"
            name="description"
            value="<?= $description ?>"
            placeholder="Description"
            ></textarea>
          </div>

          <div class="center-items">
            <div class="flex_full_width">
              <button type="submit" class="btn btn-edit" name="submit">
                <span class="text">Add Category</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <!-- Include footer file -->
    <?php include_once '../includes/footer.php'; ?>
 
