<?php
// Include header file
include_once 'includes/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // Fetch category from database
    $query = "SELECT * FROM category WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    }
} else {
    header('Location: ' . ROOT_URL . 'Admin/manage-category.php');
    die();
}
?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to the Edit Category portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to Modify and Edit your Category as a User.
          Be informed, all changes are updated as soon as you're done. However, you still have the privilege to reverse any changes any time.
          Take your time as we have your back.
          </p>
          <a href="#edit-category">
            <button class="blog-button">Edit Category
            </button>
          </a>
        </div>
      </div>
    </section>
    <section class="form__section" id="edit-category">
      <div class="container form__section-container">
        <h2>Edit Category</h2>
        <form action="<?= ROOT_URL ?>Admin/edit-category-logic.php" method="POST">
          <div class="form__control">
            <input
              type="hidden"
              name="id"
              value="<?= $category['id'] ?>"
            />
            <input
              type="text"
              name="title"
              id="title"
              value="<?= $category['title'] ?>"
              placeholder="Title"
            />
          </div>
          <div class="form__control">
            <textarea
            id="description"
            cols=""
            rows="10"
            name="description"
              placeholder="Description"
            ><?= $category['description'] ?></textarea>
          </div>
          <div class="center-items">
            <div class="flex_full_width">
              <button type="submit" class="btn btn-edit" name="submit">
                <span class="text">Update Category</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <!-- Include footer file -->
    <?php include_once '../includes/footer.php'; ?>

