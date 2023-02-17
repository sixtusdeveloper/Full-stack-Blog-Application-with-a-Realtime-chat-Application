<?php
// Include header file
include_once 'includes/header.php';

  // Get current user id from the database
  $current_user_id = $_SESSION['user_id'];
  $query = "SELECT id, title, category_id FROM posts
      WHERE author_id = $current_user_id
      ORDER BY id DESC";
  $posts = mysqli_query($connection, $query);
?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to your DashBoard portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to Add, Insert, Delete and Manage your posts as a User.
          Be informed, all changes are updated as soon as you're done. However, you still have the privilege to reverse any changes any time.
          Take your time as we have your back.
          </p>
          <a href="#dashboard">
            <button class="blog-button">Manage posts
            </button>
          </a>
        </div>
      </div>
    </section>

    <section class="dashboard" id="dashboard">
        <?php if (isset($_SESSION['add-post-success'])): ?> <!-- Shows if add post was successfully  -->
          <div class="alert__message success container">
            <p>
              <i class="fas fa-check-circle"></i>
              <?=
              $_SESSION['add-post-success'];
              unset($_SESSION['add-post-success']);
              ?>
            </p>
          </div>
        <?php elseif (isset($_SESSION['edit-post-success'])): ?> <!--Shows if edit post was successfully -->
          <div class="alert__message success container">
            <p>
              <i class="fas fa-check-circle"></i>
              <?=
              $_SESSION['edit-post-success'];
              unset($_SESSION['edit-post-success']);
              ?>
            </p>
          </div>
        <?php elseif (isset($_SESSION['delete-post-success'])): ?><!--- Shows if delete post was successfully -->
          <div class="alert__message success container">
            <p>
              <i class="fas fa-check-circle"></i>
              <?=
              $_SESSION['delete-post-success'];
              unset($_SESSION['delete-post-success']);
              ?>
            </p>
          </div>
        <?php elseif (isset($_SESSION['edit-post'])): ?><!-- Shows if edit post was Not successfully -->
          <div class="alert__message error container">
            <p>
              <i class="fas fa-exclamation-triangle"></i>
              <?=
              $_SESSION['edit-post'];
              unset($_SESSION['edit-post']);
              ?>
            </p>
          </div>
        <?php endif ?>
      <div class="container dashboard__container">
        <button id="open__sidebar-btn" class="sidebar__toggle">
          <i class="fas fa-angle-right"></i>
        </button>
        <button id="close__sidebar-btn" class="sidebar__toggle">
          <i class="fas fa-angle-left"></i>
        </button>
        <aside>
          <ul>
            <li>
              <a href="<?= ROOT_URL ?>Admin/add-posts.php">
                <i class="fas fa-pen"></i>
                <h5>Add Post</h5>
              </a>
            </li>
            <li>
              <a href="<?= ROOT_URL ?>Admin/index.php" class="active">
                <i class="fas fa-address-card"></i>
                <h5>Manage Post</h5>
              </a>
            </li>
            <!-- check if user is admin -->
            <?php if (isset($_SESSION['user_is_admin'])): ?>
              <li>
                <a href="<?= ROOT_URL ?>Admin/add-user.php">
                  <i class="fas fa-user-plus"></i>
                  <h5>Add User</h5>
                </a>
              </li>
              <li>
                <a href="<?= ROOT_URL ?>Admin/manage-user.php">
                  <i class="fas fa-users"></i>
                  <h5>Manage Users</h5>
                </a>
              </li>
              <li>
                <a href="<?= ROOT_URL ?>Admin/add-category.php">
                  <i class="fas fa-edit"></i>
                  <h5>Add Category</h5>
                </a>
              </li>
              <li>
                <a href="<?= ROOT_URL ?>Admin/manage-category.php">
                  <i class="fas fa-list"></i>
                  <h5>Manage Categories</h5>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </aside>
        <main>
          <h2>Manage Posts</h2>
          <?php if (mysqli_num_rows($posts) > 0): ?>    
            <table>
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($post = mysqli_fetch_assoc($posts)): ?>
                  <!--==== Get category title of each post from category's table ===-->
                  <?php 
                  $category_id = $post['category_id'];
                  $category_query = "SELECT title FROM category WHERE id=$category_id";
                  $category_result = mysqli_query($connection, $category_query);
                  $category = mysqli_fetch_assoc($category_result);
                  ?>
                  <tr>
                    <td><?= $post['title'] ?></td>
                    <td><?= $category['title'] ?></td>
                    <td><a href="<?= ROOT_URL ?>Admin/edit-posts.php?id=<?= $post['id']?>" class="btn sm">Edit</a></td>
                    <td>
                      <a href="<?= ROOT_URL ?>Admin/delete-posts.php?id=<?= $post['id']?>" class="btn sm danger">Delete</a>
                    </td>
                  </tr>
                <?php endwhile ?>
              </tbody>
            </table>
          <?php else : ?>
            <div class="alert__message error">
              <p class="font-size p-y-8 m-y-8">
              <?= 'Oops!!! No Current Posts found' ?>
              </p>
              <div class="error-item">
                <img src="<?= ROOT_URL ?>project_images/error-img.png" class="error-img" alt="Error image">
              </div>
            </div>
          <?php endif; ?>
        </main>
      </div>
    </section>

    <!-- Include footer file -->
    <?php include_once '../includes/footer.php'; ?>
