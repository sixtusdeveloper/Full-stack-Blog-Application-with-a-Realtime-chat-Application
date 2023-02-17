<?php
// Include header file
include_once 'includes/header.php'; 
  // Fetch categories from database
  $query = "SELECT * FROM category ORDER BY title";
  $categories = mysqli_query($connection, $query);

?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to the Manage Category portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to Update and Manage your Category as a User.
          Be informed, all changes are updated as soon as you're done. However, you still have the privilege to reverse any changes any time.
          Take your time as we have your back.
          </p>
          <a href="#manage_category">
            <button class="blog-button">Manage category
            </button>
          </a>
        </div>

      </div>
    </section>
    <section class="dashboard" id="manage_category">
        <?php if (isset($_SESSION['add-category-success'])): //Shows if add category was successfully ?>
          <div class="alert__message success container">
            <p>
              <i class="fas fa-check-circle"></i>
              <?=
              $_SESSION['add-category-success'];
              unset($_SESSION['add-category-success']);
              ?>
            </p>
          </div>
        <?php elseif (isset($_SESSION['add-category'])): //Shows if add category was Not successfully ?>
          <div class="alert__message error container">
            <p>
              <i class="fas fa-exclamation-triangle"></i>
              <?=
              $_SESSION['add-category'];
              unset($_SESSION['add-category']);
              ?>
            </p>
          </div>
        <?php elseif (isset($_SESSION['edit-category'])): //Shows if edit category was Not successfully ?>
          <div class="alert__message error container">
            <p>
              <i class="fas fa-exclamation-triangle"></i>
              <?=
              $_SESSION['edit-category'];
              unset($_SESSION['edit-category']);
              ?>
            </p>
          </div>
        <?php elseif (isset($_SESSION['edit-category-success'])): //Shows if edit category was successfully ?>
          <div class="alert__message success container">
            <p>
              <i class="fas fa-check-circle"></i>
              <?=
              $_SESSION['edit-category-success'];
              unset($_SESSION['edit-category-success']);
              ?>
            </p>
          </div>
        <?php elseif (isset($_SESSION['delete-category-success'])): //Shows if delete category was successfully ?>
          <div class="alert__message success container">
            <p>
              <i class="fas fa-check-circle"></i>
              <?=
              $_SESSION['delete-category-success'];
              unset($_SESSION['delete-category-success']);
              ?>
            </p>
          </div>
        <?php elseif (isset($_SESSION['delete-category'])): //Shows if delete category was Not successfully ?>
          <div class="alert__message error container">
            <p>
              <i class="fas fa-exclamation-triangle"></i>
              <?=
              $_SESSION['delete-category'];
              unset($_SESSION['delete-category']);
              ?>
            </p>
          </div>
        <?php endif ?>
      <div class="container dashboard__container">
            <button id="open__sidebar-btn" class="sidebar__toggle"><i class="fas fa-angle-right"></i></button>
            <button id="close__sidebar-btn" class="sidebar__toggle"><i class="fas fa-angle-left"></i></button>
        <aside>
          <ul>
            <li>
              <a href="<?= ROOT_URL ?>Admin/add-posts.php">
                <i class="fas fa-pen"></i>
                <h5>Add Post</h5>
              </a>
            </li>
            <li>
              <a href="<?= ROOT_URL?>Admin/index.php">
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
                <a href="<?= ROOT_URL?>Admin/manage-user.php">
                  <i class="fas fa-users"></i>
                  <h5>Manage Users</h5>
                </a>
              </li>
              <li>
                <a href="<?= ROOT_URL?>Admin/add-category.php">
                  <i class="fas fa-edit"></i>
                  <h5>Add Category</h5>
                </a>
              </li>
              <li>
                <a href="<?= ROOT_URL?>Admin/manage-category.php" class="active">
                  <i class="fas fa-list"></i>
                  <h5>Manage Categories</h5>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </aside>
        <main>
          <h2>Manage Categories</h2>
          <?php if(mysqli_num_rows($categories) > 0) :  ?>
            <table>
              <thead>
                <tr>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php while($category = mysqli_fetch_assoc($categories)) : ?>  
                  <tr>
                      <td><?= $category['title'] ?></td>
                      <td><a href="<?= ROOT_URL?>Admin/edit-category.php?id=<?= $category['id'] ?>" class="btn sm">Edit</a></td>
                      <td><a href="<?= ROOT_URL ?>Admin/delete-category.php?id=<?= $category['id'] ?>" class="btn sm danger">Delete</a></td>
                  </tr>
                <?php endwhile; ?> 
              </tbody>
            </table>
          <?php else : ?>
            <div class="alert__message error">
              <p class="font-size p-y-8 m-y-8">
              <?= 'Oops, No Current Categories found' ?>
              </p>
              <div class="error-item">
                <img src="<?= ROOT_URL ?>project_images/error-img.png" class="error-img" alt="Error image">
              </div>
            </div>
          <?php  endif ?>
        </main>
      </div>
    </section>

    <!-- Include footer file -->
    <?php include_once '../includes/footer.php'; ?>

