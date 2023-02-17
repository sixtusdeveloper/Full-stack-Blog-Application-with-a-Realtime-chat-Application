<?php
// Include header file
include_once 'includes/header.php';

// Fetch all posts from the database
$query = 'SELECT * FROM posts ORDER BY date_time DESC';
$posts = mysqli_query($connection, $query);
?>
    <!--==================== End of nav =========================-->
     <section class="blog-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
         <h1 class="content_title">
            Welcome to the Blog Page,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you. Here, you've the privilege to explore and Checkout our Blog Posts as well as Adding and Managing your own Posts right away as a User.
          Please, it would be of a great help to us if you kindly register as a user in the Registration platform provided in the website. This proccess would notify us of your accesss into the platform as well as Activating you as Admin.
          Feel free, take your time and explore everything you need as we have your back.
          </p>
          <a href="<?= ROOT_URL ?>signup.php">
            <button class="blog-button">Register here
            </button>
          </a>
        </div>

      </div>
    </section>
    <section class="search__bar">
      <h2 style="text-align: center;">Find posts you love!</h2>
      <form action="<?= ROOT_URL ?>search.php" class="container search__bar-container" method="GET">
        <div>
          <label for="search"><i class="fas fa-search"></i></label>
          <input
            type="search"
            name="search"
            class="search-bar"
            id="searchInput"
            placeholder="Search for posts "
          />
        </div>
        <button type="submit" class="btn" name="submit">GO</button>
      </form>
      <?php if (isset($_SESSION['search-error'])): ?>
        <div class="search-error-wrapper">
          <p class="search-error" id="Search_Err_Msg">
            <i class="fas fa-exclamation-circle"></i>
          <?=
          $_SESSION['search-error'];
          unset($_SESSION['search-error']);
          ?>
          </p>
        </div>
      <?php endif; ?>
    </section>

    <!-- ==================
    End of search bar
    ==================--->
    <section class="posts <?= $featured ? '' : 'section__extra-margin' ?>">
      <div class="container post__container">
        <?php while ($post = mysqli_fetch_assoc($posts)): ?>
          <article class="post">
            <div class="post__thumbnail">
              <img src="<?= ROOT_URL ?>images/<?= $post[
    'thumbnail'
] ?>" alt="Thumbnail" />
            </div>
            <div class="post__info">
              <?php
              // Fetch category from category's table using the category_id of the post
              // $category_id = $post['category_id'];
              $category_id = $post['category_id'];
              $category_query = "SELECT * FROM category WHERE id=$category_id";
              $category_result = mysqli_query($connection, $category_query);
              $category = mysqli_fetch_assoc($category_result);
              ?>
              <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post[
    'category_id'
] ?>" class="category__button">
              <?= $category['title'] ?>
              </a>
              <h3 class="post__title">
                <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>">
                  <?= $post['title'] ?>
                </a>
              </h3>
              <p class="post__body">
                <?= substr($post['body'], 0, 100) ?>...
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
      <div class="view_more_btn">
        <button class="more_category-btn" name="get_category_items" id="fetch_categories"onclick="fetch_all_category()">View more categories</button>
      </div>
    </section>

    <!--=========================
       End of category buttons 
    ===================-->


   <!-- Include footer file -->
    <?php include_once 'includes/footer.php'; ?>
