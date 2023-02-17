<?php
// Include header file
include_once 'includes/header.php';
// Fetch post if the id set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);
} else {
    header('Location: ' . ROOT_URL . 'blog.php');
    die();
}
?>
    <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to the Category posts portal,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you back. Here, you've the privilege to explore and engage about our Services as a User.
          You can as well register to become an Admin, which gives you access to Add and Manipulate your Posts any time, any where. 
          Feel free to explore as you want as we have your back.
          </p>
          <a href="about.php">
            <button class="blog-button">Find Posts
            </button>
          </a>
        </div>

      </div>
    </section>

    <!--==================== End of nav =========================-->
      
    <header class="category__title">
      <h2 class="category_heading">
        <?php
        // Fetch category from category's table using the category_id of the post
        $category_id = $id;
        $category_query = "SELECT * FROM category WHERE id=$id";
        $category_result = mysqli_query($connection, $category_query);
        $category = mysqli_fetch_assoc($category_result);

        echo $category['title'];
        ?>
      </h2>
    </header>
    <!--===========
      End of Category Title 
    =============-->
    <?php if (mysqli_num_rows($posts) > 0): ?>
      <section class="posts">
        <div class="container post__container">
          <?php while ($post = mysqli_fetch_assoc($posts)): ?>
            <article class="post">
              <div class="post__thumbnail">
                <img src="<?= ROOT_URL ?>images/<?= $post[
    'thumbnail'
] ?>" alt="Thumbnail" />
              </div>
              <div class="post__info">
                <h3 class="post__title">
                  <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>">
                    <?= $post['title'] ?>
                  </a>
                </h3>
                <p class="post__body">
                  <?= substr($post['body'], 0, 300) ?>...
                </p>
                <div class="post__author">
                  <?php
                  // Fetch author from blogusers table using the author_id
                  $author_id = $post['author_id'];
                  $author_query = "SELECT * FROM blogusers WHERE id=$author_id";
                  $author_result = mysqli_query($connection, $author_query);
                  $author = mysqli_fetch_assoc($author_result);
                  ?>
                  <div class="post__author-avatar">
                    <img src="<?= ROOT_URL ?>images/<?= $author[
    'avatar'
] ?>" alt="Avatar" />
                  </div>
                  <div class="post__author-info">
                    <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                    <small>
                    <?= date('M d, Y - H:i', strtotime($post['date_time'])) ?>
                    </small>
                  </div>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
      </section>
    <?php else: ?>
     <div class="alert__message error lg py-10 m-y-8">
      <p class="font-size p-y-8 m-y-8"><?= 'Oops!!! No Current Posts found for this category!' ?></p>
      <div class="error-item">
        <img src="<?= ROOT_URL ?>project_images/error-img.png" class="error-img" alt="Error image">
      </div> 
    </div>
    <?php endif; ?>
    <!--==========================
       End of post 
      =================-->
    <section class="category__buttons">
      <div class="container category__buttons-container">
        <?php
        $all_category_query = 'SELECT * FROM category';
        $all_categories = mysqli_query($connection, $all_category_query);
        ?>
        <?php while ($category = mysqli_fetch_assoc($all_categories)): ?>
          <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category[
    'id'
] ?>" class="category__button"><?= $category['title'] ?></a>
        <?php endwhile; ?>
        
      </div>
    </section>

    <!--=========================
       End of category buttons 
    ===================-->

    <!-- Include footer file -->
    <?php include_once 'includes/footer.php'; ?>

