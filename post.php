<?php
// Include header file
include_once 'includes/header.php';
// Fetch posts from database if id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('Location: ' . ROOT_URL . 'blog.php');
    die();
}
?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to the User Post portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to View and Add your own Posts as a User.
          Be informed, all changes are updated as soon as you're done. However, you still have the privilege to reverse any changes any time.
          Take your time as we have your back.
          </p>
          <a href="blog.php">
            <button class="blog-button">Find Posts
            </button>
          </a>
        </div>

      </div>
    </section>
       
    <section class="singlepost">
      <div class="container singlepost__container">
        <h2>
          <?= $post['title'] ?>
        </h2>
        <div class="post__author">
          <?php
            // Fetch author from blogusers table using the author_id
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM blogusers WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
          ?>
          <div class="post__author-avatar">
            <img src="<?= ROOT_URL ?>images/<?= $author['avatar'] ?>" alt="Avatar" />
          </div>
          <div class="post__author-info">
            <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
            <small>
            <?= date('M d, Y - H:i', strtotime($post['date_time'])) ?>
            </small>
          </div>
        </div>
        <div class="singlepost__thumbnail">
          <img src="<?= ROOT_URL ?>images/<?= $post['thumbnail'] ?>" alt="post thumbnail">
        </div>
        <p><?= substr($post['body'], 0, 500) ?></p>
      </div>
    </section>
    
   <!--=================== End of single post ==================-->
    <!-- Include footer file -->
    <?php include_once 'includes/footer.php'; ?>

