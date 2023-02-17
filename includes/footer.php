    <?php
    $email = $_SESSION['newsletter-data']['email'] ?? null;
    // Unset signin data
    unset($_SESSION['newsletter-data']);
    ?> 

    <footer>
      <h2 class="social-title">Find & Follow us on:</h2>
      <div class="footer__socials">
        <a href="https://www.facebook.com/sixtusushrey" target="_blank">
          <i class="fab fa-facebook"></i>
        </a>
        <a href="https://twitter.com/sixtusUshahemba" target="_blank">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.instagram.com/sixtusushrey" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.linkedin.com/in/sixtusushrey" target="_blank">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="https://www.github.com/Sixtus-Developer" target="_blank">
          <i class="fab fa-github"></i>
        </a>
        <a href="https://www.pinterest.com/sixtusushrey/" target="_blank">
          <i class="fab fa-pinterest"></i>
        </a>
      </div>

      <div class="container footer__container">
        <article>
          <h4>Categories</h4>
          <ul>
            <li><a href="">Art</a></li>
            <li><a href="">Wild Life</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Science & Technology</a></li>
            <li><a href="">Music</a></li>
            <li><a href="">Food</a></li>
          </ul>
        </article>
        <article>
          <h4>Support</h4>
          <ul>
            <li><a href="">Online Support</a></li>
            <li><a href="">Call Numbers</a></li>
            <li><a href="">Social Support</a></li>
            <li><a href="">Emails</a></li>
            <li><a href="">Location</a></li>
            <li><a href="">Sports</a></li>
          </ul>
        </article>
        <article>
          <h4>Blog</h4>
          <ul>
            <li><a href="#">Safety</a></li>
            <li><a href="#">Repair</a></li>
            <li><a href="#">Recent</a></li>
            <li><a href="#">Science & Technology</a></li>
            <li><a href="#">Popular</a></li>
            <li><a href="#">Categories</a></li>
          </ul>
        </article>
        <article>
          <h4>PermaLinks</h4>
          <ul>
            <li><a href="<?= ROOT_URL ?>index.php">Home</a></li>
            <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
            <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
            <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
            <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
            <li><a href="#">Food</a></li>
          </ul>
        </article>
      </div>
     
      <div class="newsletter_overall_container">
        <div class="newsletter__container">
          <div class="logo">
              <img src="<?= ROOT_URL ?>project_images/Blogify-logo.png" alt="An image of Logo">
          </div>

          <div class="download-app-wrapper">
            <h5 class="download-title">Download the App on</h5> 
            <span class="apps-store"> 
              <a href="https://play.google.com/store/apps/" target="_blank" class="app_link">      
                <img src="<?= ROOT_URL ?>project_images/play-store-logo.png" alt="Google play store" class="app-logo">      
              </a>
              <a href="https://www.apple.com/app-store/" target="_blank" class="app_link"> 
                <img src="<?= ROOT_URL ?>project_images/apple-store-logo.png" alt="Google play store" class="app-logo">      
              </a>
            </span>
          </div>
              
          <form novalidate action="<?= ROOT_URL ?>newsletter-logic.php" method="POST" class="newsletter-form">
            <span class="newsletter-title">Subscribe to our newsletter for notifications.</span> 
            <div class="input-group">
              <input type="email" class="input" id="Email" name="email" placeholder="johndoe@gmail.com" autocomplete="off" value="<?= $email ?>">
              <input class="button--submit" value="Subscribe" type="submit" name="submit">
            </div>
            <?php if (isset($_SESSION['newsletter'])): ?>
                <p class="newsletter-txt-error">
                  <i class="fas fa-exclamation-circle"></i>
                  <?=
                  $_SESSION['newsletter'];
                  unset($_SESSION['newsletter']);
                  ?>
                </p>
              <!-- script -->
            <?php endif; ?>
          </form>
        </div>
      </div>

      <div class="footer__copyright">
        <small>
          <i class="fas fa-globe"></i>
          &nbsp;Englsih(US)&nbsp; Copyright&copy; - 2023 Developed by
          <span>Sixtus.Dev</span>
          | All rights Reserves | Tearms & Conditions.
        </small>
      </div>
    </footer>
    

    <script type="text/javascript">
      /*===== Resize Navbar on Scroll =====*/
      var navbar = document.querySelector('.navbar')
      var scrollTop = document.querySelector('#scroll-top')
      //when the scroll is higher than 20 viewport height, add the sticky class to the tag with a class navbar
      window.onscroll = () => {
        if(window.scrollY > 20){
          navbar.classList.add('sticky')
          scrollTop.classList.add('is_active')

        }else{
          navbar.classList.remove('sticky')
          scrollTop.classList.remove('is_active')
        }

      }

    </script>
    <script src="<?= ROOT_URL ?>JS/jQuery v3.6.3.min.js"></script>
    <script src="<?= ROOT_URL ?>JS/App.js"></script>
  </body>
</html>
