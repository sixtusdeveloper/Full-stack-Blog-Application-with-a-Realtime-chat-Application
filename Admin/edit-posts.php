<?php
// Include header file
include_once 'includes/header.php';
// Fetch categories from database
$category_query = 'SELECT * FROM category';
$categories = mysqli_query($connection, $category_query);

// Fetch post data from the datebase if the id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('Location: ' . ROOT_URL . 'Admin/');
    die();
}
?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to the Edit Post portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to Modify and Edit your Posts as a User.
          Be informed, all changes are updated as soon as you're done. However, you still have the privilege to reverse any changes any time.
          Take your time as we have your back.
          </p>
          <a href="#edit-post">
            <button class="blog-button">Edit post
            </button>
          </a>
        </div>

      </div>
    </section>
    <section class="form__section" id="edit-post">
      <div class="container form__section-container">
        <h2>Edit Post</h2>
        <form action="<?= ROOT_URL ?>Admin/edit-posts-logic.php" enctype="multipart/form-data" method="POST">
          <div class="flex-input">
            <div class="form__control">
              <input
                type="hidden"
                name="id"
                value="<?= $post['id'] ?>"
              />
              <input
                type="hidden"
                name="previous_thumbnail_name"
                value="<?= $post['thumbnail'] ?>"
              />
              <input
                type="text"
                name="title"
                id="title"
                value="<?= $post['title'] ?>"
                placeholder="Title"
              />
            </div>

            <div class="form__control">
              <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                  <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile; ?> 
              </select>
            </div>
          </div>

          <div class="form__control">
            <label for="thumbnail">Update thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" />
          </div>

          <div class="form__control">
            <textarea
            id="textarea"
            cols=""
            rows="10"
            name="body"
            placeholder="Body"
            ><?= $post['body'] ?></textarea>
          </div>

          <div class="form__control">
            <label class="container-x">
              <input checked="checked" value="1" type="checkbox" name="is_featured" />
              <div class="checkmark"></div>
              <span>Featured</span>
            </label>
          </div>

          <div class="center-items">
            <div class="flex_full_width">
              <button type="submit" class="btn btn-edit" name="submit">
                <span class="text">Update Post</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <!-- Include footer file -->
    <?php include_once '../includes/footer.php'; ?>
 
