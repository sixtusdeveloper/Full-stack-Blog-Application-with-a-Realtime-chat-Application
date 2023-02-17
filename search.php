<?php
include_once './includes/search-header.php';
$search = $_GET['search'];
if (isset($_GET['submit'])) {
    if (!$search) {
        header('Location: ' . ROOT_URL . 'blog.php');
        $_SESSION['search-error'] =
            'Sorry, the Server was unable to handle empty request!';
        die();
    } else {
        $search = filter_var(
            $_GET['search'],
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC";
        $posts = mysqli_query($connection, $query);
    }
} else {
    header('Location: ' . ROOT_URL . 'blog.php');
    die();
}
?>

<?php if (mysqli_num_rows($posts) > 0): ?>
      <section class="posts section__extra-margin extra-my">
            <h3 class="result_title">These are the available results for your search!...</h3>
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
                  $category_id = $post['category_id'];
                  $category_query = "SELECT title FROM category WHERE id=$category_id";
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
                        <?= date(
                            'M d, Y - H:i',
                            strtotime($post['date_time'])
                        ) ?>
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

    <!-- image loader  -->
    <section class="imageLoader_container" id="searchLoadContent">
      <div id="wifi-loader">
        <svg class="circle-outer" viewBox="0 0 86 86">
            <circle class="back" cx="43" cy="43" r="40"></circle>
            <circle class="front" cx="43" cy="43" r="40"></circle>
            <circle class="new" cx="43" cy="43" r="40"></circle>
        </svg>
        <svg class="circle-middle" viewBox="0 0 60 60">
            <circle class="back" cx="30" cy="30" r="27"></circle>
            <circle class="front" cx="30" cy="30" r="27"></circle>
        </svg>
        <svg class="circle-inner" viewBox="0 0 34 34">
            <circle class="back" cx="17" cy="17" r="14"></circle>
            <circle class="front" cx="17" cy="17" r="14"></circle>
        </svg>
        <div class="text" data-text="Searching"></div>
      </div>
    </section>

    <script type="text/javascript">
        function loading() {
        document.getElementById('searchLoadContent').classList.add('fade-out')
        }
        function fadeOut() {
        setInterval(loading, 4000)
        }
        window.onload = fadeOut()
    </script>

<?php include_once 'includes/footer.php'; ?>

