<!-- Include php header file -->
   <?php
   include_once 'includes/header.php';

   // Fetch featured posts from database
   $featured_query = 'SELECT * FROM posts WHERE is_featured = 1';
   $featured_result = mysqli_query($connection, $featured_query);
   $featured = mysqli_fetch_assoc($featured_result);

   // Fetch 9 posts from the database
   $query = 'SELECT * FROM posts ORDER BY date_time DESC LIMIT 9';
   $posts = mysqli_query($connection, $query);

   // For Comments form Validation
   $fullName = $_SESSION['comment-data']['name'] ?? null;
   $userEmail = $_SESSION['comment-data']['user-email'] ?? null;
   $userMsg = $_SESSION['comment-data']['message'] ?? null;
   ?>

   
    <section class="main-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to Blogify, where Development, Creativity and Informative is the goal!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you. Here you'll find a variety of engaging and informative articles, you've the privilege to explore and experience every information you need to know about us as our User.
          Be informed, you have full access to all our platforms which also contains Admin Portal where you can Create, Add, Modify and Manage New and Existing Posts.
          Please, feel free, take your time and explore everything you need know as we have your back. 
          </p>
          <a href="<?= ROOT_URL ?>about.php"class="about-lnk">
            <button class="about-button">Explore more
            </button>
          </a>
        </div>
      </div>
    </section>

    <!-- Show featured posts if there is any -->
    <?php if (mysqli_num_rows($featured_result) == 1): ?>
      <section class="featured">
        <div class="container featured__container">
          <div class="post__thumbnail">
            <img src="<?= ROOT_URL ?>images/<?= $featured[
    'thumbnail'
] ?>" alt="Thumbnail post 4" />
          </div>
          <div class="post-info">
            <?php
            // Fetch category from category's table using the category_id of the post
            $category_id = $featured['category_id'];
            $category_query = "SELECT * FROM category WHERE id=$category_id";
            $category_result = mysqli_query($connection, $category_query);
            $category = mysqli_fetch_assoc($category_result);
            ?>
            <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
            <h2 class="post__title">
              <a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>">
                <?= $featured['title'] ?>
              </a>
            </h2>
            <p class="post__body">
              <?= substr($featured['body'], 0, 300) ?>...
            </p>
            <div class="post__author">
              <?php
              // Fetch author from blogusers table using the author_id
              $author_id = $featured['author_id'];
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
                  <?= date('M d, Y - H:i', strtotime($featured['date_time'])) ?>
                </small>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <!-- ==================
      End of featured posts 
    =====================-->
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
] ?>" class="category__button" id="items"><?= $category['title'] ?></a>
        <?php endwhile; ?>
        
      </div>

      <div class="view_more_btn">
        <button class="more_category-btn" name="get_category_items" id="fetch_categories"onclick="fetch_all_category()">View more categories</button>
      </div>
    </section>

    <section class="users_comment_section">
      <div class="comment_txt_items">
        <h2 class="comment__title">Be the first to leave as comment!</h2>
        <p class="comment__para">Please, feel free to leave a comment in the comment section below. We will be pleased to hear your comment.</p>
      </div>
      <div class="users_comment_wrapper">
        <div class="comment_side_pic">
          <img src="<?= ROOT_URL ?>project_images/connnect-mobile-5.jpg" class="comment_img"  alt="An image of comment" >
          <div class="comment_img_wrapper">
            <img src="<?= ROOT_URL ?>project_images/blogify-logo.png" class="comment_mobile_effect"alt="An image of Blogify Logo">
            <h3 class="blogify__title_text">Find us and get us.</h3>
            <p class="blogify_para_text">We are always available, up and working ready to give you what you're looking for.</p>
            <button class="comment_contact_btn" onclick="redirect_user_contact_page()" id="redirect___btn">Contact Us
            </button>
          </div>
        </div>
        <div class="comment_form_container comment_form-row">
          <form novalidate action="<?= ROOT_URL ?>comments-logic.php" class="comment_form" method="POST">
            <p class="comment_caption">Comment form</p>
            <?php if (isset($_SESSION['comment'])): ?>
              <div class="alert__message error" id="remove__error_two">
                <p class="space_center"><span>
                  <i class="fas fa-exclamation-circle"></i>
                  <?=
                  $_SESSION['comment'];
                  unset($_SESSION['comment']);
                  ?>
                  </span>
                  <i class="fas fa-times remove-msg" onclick="removeErrMsgTwo()"></i>
                </p>
              </div>
            <?php elseif (isset($_SESSION['comment-success'])): ?>
              <div class="alert__message success" id="remove__success_one">
                <p class="space_center"><span>
                  <i class="fas fa-check-circle"></i>
                  <?=
                  $_SESSION['comment-success'];
                  unset($_SESSION['comment-success']);
                  ?>
                  </span>
                  <i class="fas fa-times remove-msg" onclick="removeSucMsgOne()"></i>
                </p>
              </div>
            <?php endif; ?> 
            <div class="flex-input input-group">
              <div class="form__control">
                <input
                  type="text"
                  name="name"
                  id="name"
                  value="<?= $fullName ?>"
                  placeholder="Fullname"
                />
              </div>
              <div class="form__control">
                <input
                  type="email"
                  name="user-email"
                  id="email"
                  value="<?= $userEmail ?>"
                  placeholder="Enter your Email"
                />
              </div>
            </div>
            <div class="flex-input">
              <div class="form__control texarea">
                <textarea
                  name="message"
                  id="body"
                  cols=""
                  rows="6"
                  value="<?= $userMsg ?>"
                  placeholder="Comment body"
                ></textarea>
              </div>
            </div>
            <div class="comment__btn_wrapper">
              <button class="comment__btn" type="submit" name="submit_comment" id="submit-comment">Post comment
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
 
    <div class="collaboration_section">
      <div class="collabo_content_wrapper">
        <div class="colla-text-items">
          <h2 class="collabo-title">Be one of the millions across the globe!</h2>
          <p class="collabo-para">We are trusted and collaborating with millions across the globe with a massive and astonishing record</p>
        </div>

        <div class="collabo-record-wrapper">
          <div class="collabo-user-row">
           <h3 class="collabo_users_title">Over 10+ million</h3>
            <p class="collabo_users_txt">Over ten million users globally currently using our platform, with positive and exceptional feedback.</p>
          </div>

          <div class="collabo-user-row">
           <h3 class="collabo_users_title">Over 850k+ </h3>
            <p class="collabo_users_txt">Had drawn over Eight hundred and fifty thousand subscribers between 2022 and 2023 all international.</p>
          </div>

          <div class="collabo-user-row">
           <h3 class="collabo_users_title">Over 2+ million</h3>
            <p class="collabo_users_txt">Over two million testimonials within 1 year across the globe with not more than 1.2% negative feedback.</p>
          </div>
        </div>
        
        <div class="collaboration-bg">
          <h3 class="collabo__title">Some of the Organizations collaborating with us.</h3>
          <div class="collaboration_row">
            <div><img src="<?= ROOT_URL ?>project_images/collabo-1.png" alt="An image of collabo-one" class="collabo-img"></div>
            <div><img src="<?= ROOT_URL ?>project_images/collabo-2.png" alt="An image of collabo-two" class="collabo-img"></div>
            <div><img src="<?= ROOT_URL ?>project_images/collabo-3.png" alt="An image of collabo-three" class="collabo-img"></div>
            <div><img src="<?= ROOT_URL ?>project_images/collabo-4.png" alt="An image of collabo-four" class="collabo-img"></div>
            <div><img src="<?= ROOT_URL ?>project_images/collabo-5.png" alt="An image of collabo-five" class="collabo-img"></div>
            <div><img src="<?= ROOT_URL ?>project_images/collabo-6.png" alt="An image of collabo-six" class="collabo-img"></div>
            <div><img src="<?= ROOT_URL ?>project_images/collabo-7.png" alt="An image of collabo-seven" class="collabo-img"></div>
            <div><img src="<?= ROOT_URL ?>project_images/collabo-8.png" alt="An image of collabo-eight" class="collabo-img last-img"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Include footer file -->
    <?php include_once 'includes/footer.php'; ?>
 