<?php
// Include header file
include_once 'includes/header.php';
//Fetch categories from database
$query = 'SELECT * FROM category';
$categories = mysqli_query($connection, $query);

// Get back form data if form was invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body= $_SESSION['add-post-data']['body'] ?? null;

// Delete form data session
unset($_SESSION['add-post-data']);
?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to the Add Post portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to Add New Posts as a User.
          Be informed, all changes are updated as soon as you're done. However, you still have the privilege to reverse any changes any time.
          Take your time as we have your back.
          </p>
          <a href="#add-posts">
            <button class="blog-button">add your posts
            </button>
          </a>
        </div>

      </div>
    </section>
    <section class="form__section" id="add-posts">
      <div class="container form__section-container">
        <h2>Add Posts</h2>
        <?php if(isset($_SESSION['add-post'])) : ?>
          <div class="alert__message error" id="remove__error_four">
            <p class="space_center"><span>
              <i class="fas fa-exclamation-circle"></i>
              <?= 
              $_SESSION['add-post'];
              unset($_SESSION['add-post']); 
              ?>
              </span>
              <i class="fas fa-times remove-msg" onclick="removeErrMsgFour()"></i>
          </p>
          </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>Admin/add-posts-logic.php" enctype="multipart/form-data" method="POST">
          <div class="flex-input">
            <div class="form__control">
              <input
                type="text"
                name="title"
                id="title"
                value="<?= $title ?>"
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

          <div class="form__control" name="">
            <label for="thumbnail">Add thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" />
          </div>
        
          <div class="form__control">
            <textarea
              name="body"
              id="body"
              cols=""
              rows="10"
              placeholder="Body"
            ><?= $body ?></textarea>
          </div>
          <?php if (isset($_SESSION['user_is_admin'])): ?>
            <div class="form__control">
              <label for="is_featured"class="container-x">
                <input checked="checked" id="is_featured"class="input-check" type="checkbox" name="is_featured" value="1" />
                <div class="checkmark"></div>
                <span>Featured</span>
              </label>
            </div>
          <?php endif; ?>

          <div class="center-items">
            <div class="flex_full_width">
              <button type="submit" class="btn btn-edit" name="submit">
                <span class="text">Add Post</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <!-- Include footer file -->
    <?php include_once '../includes/footer.php'; ?>

