<?php
require 'config/database.php';
// Fetch users from database but not current users
$id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    header('Location: ' . ROOT_URL . 'signin.php');
    die();
} else {
    $query = "SELECT * FROM blogusers WHERE id=$id ORDER BY id DESC";
    $users = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($users);
}

// Fetch current user from database
if (isset($_SESSION['user_id'])) {
    $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM blogusers WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>

<?php
$user_id = $_SESSION['user_id']; // assuming you have user_id in session
if (isset($_SESSION['user_id'])) {
    $query = "UPDATE blogusers SET date_time = NOW() WHERE id = $user_id";
    mysqli_query($connection, $query);
}

$query = "SELECT date_time FROM blogusers WHERE id = $user_id";
$result = mysqli_query($connection, $query);
$last_login = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--======= CSS Files Linked =======-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
      integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="<?= ROOT_URL ?>CSS/services.css" />
    <!-- <link rel="stylesheet" href="./CSS/skins/" /> -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>CSS/color-group/color-1.css" />
    <!--====== Style Switcher ======-->
    <link
      rel="stylesheet"
      href="<?= ROOT_URL ?>CSS/color-group/color-1.css"
      class="alternate-style"
      title="color-1"
    />
    <link
      rel="stylesheet"
      href="<?= ROOT_URL ?>CSS/color-group/color-2.css"
      class="alternate-style"
      title="color-2"
      disabled
    />
    <link
      rel="stylesheet"
      href="<?= ROOT_URL ?>CSS/color-group/color-3.css"
      class="alternate-style"
      title="color-3"
      disabled
    />
    <link
      rel="stylesheet"
      href="<?= ROOT_URL ?>CSS/color-group/color-4.css"
      class="alternate-style"
      title="color-4"
      disabled
    />
    <link
      rel="stylesheet"
      href="<?= ROOT_URL ?>CSS/color-group/color-5.css"
      class="alternate-style"
      title="color-5"
      disabled
    />

    <link rel="stylesheet" href="<?= ROOT_URL ?>CSS/style-switcher.css" />

    <title>FullStack Multi Page Blog Application</title>
  </head>
  <body>
    <!--====== Main Container Starts ======-->
    <div class="main-container">
      <!--====== Aside Container Starts ======-->
      <div class="aside">
        <div class="logo">
          <a href="<?= ROOT_URL ?>index.php"><h1 class="logo-span">
            <img
              src="project_images/Blogify-logo.png"
              id="logoImg"
              class="logo-img"
              alt="A logo image"
            />
          </h1></a>

          <div class="user_profile_img">
           <img src="<?= ROOT_URL .
               'images/' .
               $avatar['avatar'] ?>" class="profile-pic"alt="profile-img">
               <p class="user__name"><?= "{$user['firstname']} {$user['lastname']}" ?></p>
               <p class="user_signin_time"><small style="color: lightseagreen">last loggedin was:</small><br> <?= $last_login[
                   'date_time'
               ] ?></p>
               
          </div>
        </div>

        <div class="nav-toggler">
          <span></span>
        </div>

        <ul class="nav">
          <li>
            <a href="#home" class="links active">
              <i class="fas fa-list"></i>
              Overview
            </a>
          </li>
          <li>
            <a href="#user-guide" class="links">
              <i class="fas fa-book-open"></i>
              User guide
            </a>
          </li>
          <li>
            <a href="#services" class="links">
              <i class="fas fa-medal"></i>
              Services
            </a>
          </li>
          <li>
            <a href="#Reviews" class="links">
              <i class="fas fa-comments"></i>
              Reviews
            </a>
          </li>
          <li>
            <a href="#contact" class="links">
              <i class="fas fa-phone-volume"></i>
              Contact
            </a>
          </li>
          <li>
            <a href="<?= ROOT_URL ?>signout_confirm.php" class="links">
              <i class="fas fa-sign-out-alt"></i>
              Signout
            </a>
          </li>
        </ul>
      </div>
      <!--====== Aside Container Ends ======-->

      <!--====== Main Content Starts ======-->
      <div class="main-content">
        <!--====== Home Section Starts ======-->
        <section class="home active section my-b-4" id="home">
          <div class="container resize">
            <div class="row">
              <div class="home-info padd-15">
                <div class="section-title">
                <h2>Overview</h2>
                </div>
                <h3 class="hello">
                  Welcome&nbsp;
                  <span class="name"><?= "{$user['firstname']} {$user['lastname']}" ?></span>
                </h3>
                <h3 class="my-profession">
                  This's Blogify where you can&nbsp;
                  <span class="typing"></span>
                </h3>
                <p>
                  We pride ourselves on providing top-quality services to our customers. Our team of experts is dedicated to helping you achieve your goals and reach your full potential.
                  Here are the services that we offer:
                </p>
                <h3><strong class="strong"> Website Design and Development.</strong></h3>
                <p>
                We specialize in creating custom websites that are tailored to your specific needs and goals. Whether you're looking to build a new website from scratch or revamp an existing one, our team has the skills and expertise to help you succeed.
                </p>
                <h3><strong class="strong">Search Engine Optimization (SEO)</strong></h3>
                <p>
                  Our SEO services help improve your website's visibility and search engine rankings, making it easier for potential customers to find you online. We use a variety of techniques, including keyword research, on-page optimization, and backlink building, to help you achieve the best results.
                </p>

                <h3><strong class="strong">Social Media Marketing</strong></h3>
                <p>
                 We help you to create and implement a social media strategy that will help you connect with your target audience and grow your business. Whether you're looking to increase your followers, improve engagement, or drive more sales, our team has the experience and expertise to help you succeed.
                </p>

                <h3><strong class="strong">Email Marketing</strong></h3>
                <p>
                 Our email marketing services help you to build relationships with your customers and increase your sales. We'll help you create email campaigns that are tailored to your specific goals, whether you're looking to promote a new product or service, or simply stay in touch with your audience.
                </p>

                <h3><strong class="strong">Graphic Design</strong></h3>
                <p>
                  We provide high-quality graphic design services that will help you to stand out from the crowd. Whether you need a new logo, business cards, or other marketing materials, our team has the skills and expertise to help you achieve your goals.</p>
                
                <a href="#" class="btn">Get In Touch With A Professional</a>
              </div>
              <div class="home-img">
                <img
                  src="<?= ROOT_URL ?>project_images/services-img-1.png"
                  alt="An image of Sixtus"
                />
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="community-platform padd-15">
                <h3><strong class="strong">Blogify Social Community Platform</strong></h3>
                <p>Blogify is one of the modern Blog applications that offers users the opportunity to showcase, communicate, network, Advertise and a lot more. The platform doesn't only allow users to publish the posts on the application but it rather go beyond that.</p>
                <p>Our social community platform is a built in application developed by Blogify to allow more and easy chat with other Blogify users and to share views and opinions and also find connection from many other Blogify users across the globe. However, this specific platform has some policy and requires some qualification which may only favor you if complied.</p>
                <br>
                <a href="#user-guide" class="btn">Learn More <i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--====== Home Section Ends ======-->

        <!--====== About Section Starts ======-->
        <section class="about section my-b-4" id="user-guide">
          <div class="container">
            <div class="row">
              <div class="section-title padd-15 my-1A">
                <h2>User Guide</h2>
              </div>
            </div>
            <div class="row">
              <div class="about-content padd-15">
                <div class="row">
                  <div class="about-text padd-15">
                    <h3><strong class="strong">How to get started!</strong></h3>
                    <p>
                      First thing to do before you get started with Blogify, you need to be registered as a Blogify user and follow these few steps in order to have a better experience using Blogify the Application.

                      <h3><strong class="strong-step">Step one.</strong></h3>
                      <span class="display-color"><li>Navigate to the top-right corner of the application, where you will see a button "Signin".
                        Click on it and you would be redirected to the Signin portal, there you will find a few options 
                        Signup and Reset password/Update password. Because, you're just registering as a new user, click on Signup and get redirected to it portal for Signup.
                        Enter the required information accurately and click on the Signup button to submit your credentials.
                        <p>If your credentials matches the requirements, you would be shown a success message of submission and redirected to your Dashboard, else you would be bounced back to the Signup portal.</p>
                      </li></span>
                    </p>
                    <p>
                      <h3><strong class="strong-step">Step two.</strong></h3>
                      <span class="display-color"><li>After you've successfully Signed up and accessed your Dashboard, you'll find two(2) features from your Dashboard.
                        Add posts and Manage posts. <br><h4>Note:</h4>
                        You're getting those few features because you're an Author by default, only an Admin have full access to all the features from the Dashboard. Unfortunately, you can't make your self an Admin. For you to become an Admin, you'll need to be added by an existing user to become an Admin.
                      </li></span>
                    </p>
                    <p>
                      <h3><strong class="strong-step">Step Four.</strong></h3>
                      <span class="display-color"><li>
                        Request a user ID if you have any, else connect to any of the users so they can Add you as Admin. After that you're set to go, you'ill be provided with all the cool features including:
                        <span class="display-color"><li>Adding Posts</li></span>
                        <span class="display-color"><li>Managing Posts</li></span>
                        <span class="display-color"><li>Adding Category</li></span>
                        <span class="display-color"><li>Managing Categories</li></span>
                        <span class="display-color"><li>Adding Users</li></span>
                        <span class="display-color"><li>Managing Users</li></span>
                        <span class="display-color"><li>Editing and Deleting Posts</li></span>
                        <span class="display-color"><li>Editing and Deleting Categories</li></span>
                        <span class="display-color"><li>Editing and Deleting Users</li></span>
                        <span class="display-color"><li>Retrieving Users from the database.</li></span><br>
                        <span class="display-color">Now you've the full user guide for the Dashboard, you can proceed and have a wonderful experience.</span> 
                      </li></span>
                    </p>
                    
                    <p>
                      You may come across the Uncategories Category, be informed this is doesn't have anything to do with your Posts. It stores and keeps record all the deleted Posts from the database.
                    </p>
                    <p>
                      For more details of Posts, click on any Category of a post and you'll be redirected to that user's full details of the post.
                      You can also filter posts using the search bar available in the Blog page of the Application.
                      <br><span class="display-color"><span class="display-color">Note:</span><br> Any invalid search will be bounced back only valid and direct entries or searches are allowed.</span>
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="community-content">
              <div class="row padd-15">
                <h3><strong class="strong-step margin-bottom">Our Social Community Platform.</strong></h3>
                <p class="display-color">The Blogify Social Community is a social platform where multiple Blogify users can interact with each other from the same or different Social groups or community zones. In the Social community platform, users have the right to share any content of their chioce even sensitive information and private conversation if necessary. 
                </p><br>
                <p class="display-color">However, this platform operates slightly different as opposed to the Public platform or the Blog post platform. In the Social Community Platform, only the Elite can make it there meaning users must meet some certain requirements before they can access the Elite Chat zone also called Blogify Social community. In other words, A user must have a legitimate and accurate information about them, and must have used the Blog post platform and had publish some recent posts of atleast three or more in different Categories. </p>
                <br>
                <h3><strong class="strong-header">Important Notice</strong></h3><br>
                <p class="display-color">The Elite Chat zone consist of sensitive information and data about Elite users. Therefore, we've put in all our best to ensure quality security features and an intuitive and proper user experience. To make things easier for your self and anyone with your permission accessing your status or chat, ensure to keep all your sensitive information or credentials consistence and accurate for easy and smooth interrogation with the Application Database.</p>
              </div>
            </div>
          </div>
        </section>
        <!--====== About Section Ends ======-->

        <!--====== Services Section Starts ======-->
        <section class="service section my-b-4" id="awards">
          <div class="container">
            <div class="row">
              <div class="section-title padd-15">
                <h2>Services</h2>
                <p class="top_margin"><li class="white-text">A user-friendly interface that makes it easy to create and manage blog posts</li>
                    <li class="white-text">A variety of customization options to make your blog look and feel unique</li>
                    <li class="white-text">Built-in tools for optimizing your blog for search engines</li>
                    <li class="white-text">Analytics and statistics to help you track and measure the performance of your blog</li>
                    <li class="white-text">A community of users to connect and share ideas with Support for multiple languages</li>
                  </p>
              </div>
            </div>
            <!--====== Service Item Ends ======-->
            <div class="row">
              <!--====== Service Item Starts ======-->
              <div class="service-item padd-15">
                <div class="service-item-inner">
                  <div class="icon">
                    <i class="fa fa-code"></i>
                  </div>
                  <h4>Web Development</h4>
                  <p>
                    Creating a website for any business is important but it's
                    better you not just create any website but a quality,
                    responsive and interative type that brings attraction.
                  </p>
                </div>
                <!--====== Service Item Ends ======-->
              </div>

              <!--====== Service Item Starts ======-->
              <div class="service-item padd-15">
                <div class="service-item-inner">
                  <div class="icon">
                    <i class="fa fa-laptop-code"></i>
                  </div>
                  <h4>Web Design</h4>
                  <p>
                    Everyone loves Designs and decorations because it charming
                    and attractive to look at. So, It's important your websites,
                    portfolio, blogs e.t.c are well decorated and designed.
                  </p>
                </div>
                <!--====== Service Item Ends ======-->
              </div>

              <!--====== Service Item Starts ======-->
              <div class="service-item padd-15">
                <div class="service-item-inner">
                  <div class="icon">
                    <i class="fa fa-palette"></i>
                  </div>
                  <h4>Brand / Logo Design</h4>
                  <p>
                    Every Business should be uniquely identify. That makes it
                    not just unique but easy to identify and that's the reason
                    you need a Logo for your business.
                  </p>
                </div>
                <!--====== Service Item Ends ======-->
              </div>

              <!--====== Service Item Starts ======-->
              <div class="service-item padd-15">
                <div class="service-item-inner">
                  <div class="icon">
                    <i class="fas fa-database"></i>
                  </div>
                  <h4>Database Administration<b class="style">(DA)</b></h4>
                  <p>
                    Data Management is an essential and important role in every business But
                    what's the best way to store, track, mantain and access your
                    data whenever, where ever in need of it.
                  </p>
                </div>
                <!--====== Service Item Ends ======-->
              </div>

              <!--====== Service Item Starts ======-->
              <div class="service-item padd-15">
                <div class="service-item-inner">
                  <div class="icon">
                    <i class="fa fa-paint-brush"></i>
                  </div>
                  <h4>Graphic Design</h4>
                  <p>Promote and sell your products, make books cover, 
                    Advertise your business, let people know what they need to
                    upgrade their business with the help of graphic Designs.
                    
                  </p>
                </div>
                <!--====== Service Item Ends ======-->
              </div>

              <!--====== Service Item Starts ======-->
              <div class="service-item padd-15">
                <div class="service-item-inner">
                  <div class="icon">
                    <i class="fa fa-laptop-code"></i>
                  </div>
                  <h4>Responsive Web Design<b class="style">(RWD)</b></h4>
                  <p>
                    It's very important for every Website, Web app to behave responsively on any type of device
                    it been viewed. This's why every business needs a Responsive Web Designer(RWD).
                  </p>
                </div>
                <!--====== Service Item Ends ======-->
              </div>
            </div>
          </div>
        </section>

        <!--====== Portfolio Section Starts ======-->
        <section class="portfolio section my-b-4" id="portfolio">
          <div class="container">
            <div class="row">
              <div class="section-title padd-15">
                <h2>Services</h2>
              </div>
            </div>

            <div class="row">
              <div class="portfolio-heading padd-15">
                <h2>My Lastest Projects :</h2>
              </div>
            </div>
            <div class="row padd-15">
              <div class="row padd-15 tab-titles">
                <h4 class="tab-links active-link" onclick="opentab('all-projects')">All projects</h4>
                <h4 class="tab-links" onclick="opentab('fullstack-websites')">Full-stack Apps</h4>
                <h4 class="tab-links" onclick="opentab('static-websites')">Font-end Apps</h4>
                <h4 class="tab-links" onclick="opentab('mobile-apps')">Mobile Apps</h4>
                <h4 class="tab-links" onclick="opentab('desktop-apps')">Desktop Apps</h4>
                <h4 class="tab-links" onclick="opentab('brands-logos')">Brands</h4>
              </div>
            </div>
            
            <div class="portfolio-contents">
              <!--==================== All-products Section Starts ====================-->
              <div class="flex-row tab-contents active-tab" id="all-projects">
                <div class="row">
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="images"
                          alt="An image of portfolio 01"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="#" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-2.png"
                          alt="An image of portfolio 02"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="#" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-3.png"
                          alt="An image of portfolio 03"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-4.png"
                          alt="An image of portfolio 04"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-5.png"
                          alt="An image of portfolio 05"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts  ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-6.png"
                          alt="An image of portfolio 06"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-7.jpg"
                          alt="An image of portfolio 07"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-8.jpg"
                          alt="An image of portfolio 08"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-9.jpg"
                          alt="An image of portfolio 09"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-10.png"
                          alt="An image of portfolio 10"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-11.png"
                          alt="An image of portfolio 11"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-12.jpg"
                          alt="An image of portfolio 12"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-13.png"
                          alt="An image of portfolio 13"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-14.png"
                          alt="An image of portfolio 14"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-15.png"
                          alt="An image of portfolio 15"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                </div>
              </div>
              <!--===================== All-products Section ends here  =====================-->

              <!--==================== fullstack-websites Section Starts ====================-->
              <div class="flex-row tab-contents" id="fullstack-websites">
                <div class="row">
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15" >
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-1.png"
                          alt="An image of portfolio 01"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-2.png"
                          alt="An image of portfolio 02"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-3.png"
                          alt="An image of portfolio 03"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  
                </div>
              </div>

              <!--==================== static-websites Section Starts ====================-->
              <div class="flex-row tab-contents" id="static-websites">
                <div class="row">
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-4.png"
                          alt="An image of portfolio 04"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-5.png"
                          alt="An image of portfolio 05"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts  ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-6.png"
                          alt="An image of portfolio 06"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-7.jpg"
                          alt="An image of portfolio 07"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  
                </div>
              </div>

              <!--==================== Mobile-apps Section Starts ====================-->
              <div class="flex-row tab-contents" id="mobile-apps">
                <div class="row">
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-8.jpg"
                          alt="An image of portfolio 08"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-9.jpg"
                          alt="An image of portfolio 09"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-10.png"
                          alt="An image of portfolio 10"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  
                </div>
              </div>
      
              <!--==================== Brands/Logos Section Starts ====================-->
              <div class="flex-row tab-contents" id="brands-logos">
                <div class="row">
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-11.png"
                          alt="An image of portfolio 11"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15 ">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-12.jpg"
                          alt="An image of portfolio 12"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                 
                </div>
              </div>

              <!--==================== Desktop-apps Section Starts ====================-->
              <div class="flex-row tab-contents" id="desktop-apps">
                <div class="row">
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15 ">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-13.png"
                          alt="An image of portfolio 13"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-14.png"
                          alt="An image of portfolio 14"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  <!--====== Portfolio Item Starts ======-->
                  <div class="portfolio-item padd-15">
                    <div class="portfolio-item-inner shadow-dark">
                      <div class="portfolio-img">
                        <img
                          src="./images/project-15.png"
                          alt="An image of portfolio 15"
                        />
                        <div class="portfolio-layer">
                          <a href="#"><i class="fab fa-chrome"></i></a>
                          <a href="" target="_blank" class="view-webiste-link">
                            check it out
                          </a>
                        </div>
                      </div>
                    </div>
                    <!--====== Portfolio Item Ends ======-->
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--====== Portfolio Section Ends ======-->

        <!--====== Contact Section Starts ======-->
        <section class="contact section my-b-4" id="contact">
          <div class="container">
            <div class="row">
              <div class="section-title padd-15">
                <h2>Contact Us</h2>
              </div>
            </div>
            <h3 class="contact-title padd-15">Have You Any Questoins ?</h3>
            <h3 class="contact-sub-title padd-15">I'm At Your Services</h3>
            <div class="row">
              <!--====== Contact Info Items Starts ======-->
              <div class="contact-info-item padd-15">
                <div class="icon"><i class="fas fa-phone"></i></div>
                <h4>Call Us On</h4>
                <p class="" id="userPhone">+234 9022 048 105</p>
                <!--====== Contact Info Items Ends ======-->
              </div>

              <!--====== Contact Info Items Starts ======-->
              <div class="contact-info-item padd-15">
                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                <h4>Office</h4>
                <p class="" id="userPhone">Victoria Island, Lagos</p>
                <!--====== Contact Info Items Ends ======-->
              </div>

              <!--====== Contact Info Items Starts ======-->
              <div class="contact-info-item padd-15">
                <div class="icon"><i class="fas fa-envelope"></i></div>
                <h4>Email</h4>
                <p class="" id="userEmail">info@sixtusdev.com</p>
                <!--====== Contact Info Items Ends ======-->
              </div>

              <!--====== Contact Info Items Starts ======-->
              <div class="contact-info-item padd-15">
                <div class="icon"><i class="fas fa-globe-europe"></i></div>
                <h4>Website</h4>
                <p class="" id="userEmail">www.sixtusdev.com</p>
                <!--====== Contact Info Items Ends ======-->
              </div>
            </div>

            <h3 class="contact-title padd-15">Do You Prefer Social Media ?</h3>
            <h3 class="contact-sub-title padd-15">
              We're very responsive to Chats
            </h3>
            <div class="row">
              <!--====== Contact Info Items Starts ======-->
              <div class="contact-info-item social-media padd-15">
                <a
                  href="http://www.github.com/Sixtus-Developer/"
                  target="_blank"
                  class="social-media-link"
                >
                  <i class="fab fa-github social-icon"></i>
                </a>
                <h4>Github</h4>
                <!--====== Contact Info Items Ends ======-->
              </div>

              <!--====== Contact Info Items Starts ======-->
              <div class="contact-info-item padd-15">
                <a
                  href="https://twitter.com/SixtusUshahemba/"
                  target="_blank"
                  class="social-media-link"
                >
                  <i class="fab fa-twitter social-icon"></i>
                </a>
                <h4>Twitter</h4>
                <!--====== Contact Info Items Ends ======-->
              </div>

              <!--====== Contact Info Items Starts ======-->
              <div class="contact-info-item padd-15">
                <a
                  href="https://www.instagram.com/sixtusushrey/"
                  target="_blank"
                  class="social-media-link"
                >
                  <i class="fab fa-instagram social-icon"></i>
                </a>
                <h4>Instagram</h4>
                <!--====== Contact Info Items Ends ======-->
              </div>

              <!--====== Contact Info Items Starts ======-->
              <div class="contact-info-item padd-15">
                <a
                  href="https://www.linkedin.com/in/sixtusushrey/"
                  target="_blank"
                  class="social-media-link"
                >
                  <i class="fab fa-linkedin social-icon"></i>
                </a>
                <h4>linkedIn</h4>
                <!--====== Contact Info Items Ends ======-->
              </div>
            </div>

            <h3 class="contact-title padd-15">Send Us An Email Message!</h3>
            <h3 class="contact-sub-title">
              We're very responsive to messages
            </h3>
            <p class="contact_msg">Please, let us know below in the Contact form below what services you do like to get from us to offer you!</p>
            <!--====== Contact Form ======-->
            <div class="row service_contact_form">
              <div class="img-container center padd-15">
                <div class="img-layer">
                  <img
                    src="./project_images/connnect-mobile-5.jpg"
                    class="form-image"
                    alt="An image of connect mobile"
                  />
                  <div class="profile-text">
                    <img
                      src="project_images/Blogify-logo.png"
                      class="Blogify__logo"
                      alt="An image of laptop codes"
                    />
                    <h3>Blogify Chat Zone</h3>
                    <p>
                      We stand strong and firm in the Development industry,
                       providing the best and top rated services.
                    </p>
                    <div class="download-btn">
                      <!-- <span><a href="" id="download-CV"class="btn download-cv">Download CV</a></span> -->
                      <span>
                        <button id="check-website" onclick="redirect_chat_zone()"class="btn check-website">
                          Chat Community
                        </button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <form novalidate action="services-logic.php" class="contact-form padd-15" method="post" id="form">
                <div class="row">
                  <div class="form-item col-6 padd-15">
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Name"
                        name="name"
                        id="name"
                      />

                      <!-- <div class="input-group">
                        <input type="text" name="text" autocomplete="off" class="input">
                        <label class="user-label">First Name</label>
                      </div> -->
                      <span class="error-msg" id="error-msg"></span>
                    </div>
                    
                  </div>

                  <div class="form-item col-6 padd-15">
                    <div class="form-group">
                      <input
                        type="email"
                        class="form-control"
                        placeholder="Email"
                        name="email"
                        id="email"
                      />
                      <span class="error-msg" id="error-msg"></span>
                    </div>
                   
                  </div>
                </div>
                <div class="row">
                  <div class="form-item col-6 padd-15">
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Subject"
                        name="subject"
                        id="subject"
                        
                      />
                      <span class="error-msg" id="error-msg"></span>
                      
                    </div>
                  </div>
                  <div class="form-item col-6 padd-15">
                    <div class="form-group">
                      <input
                        type="tel"
                        class="form-control"
                        placeholder="Phone number"
                        name="phone"
                        id="phone"
                      />
                      <span class="error-msg" id="error-msg"></span>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-item col-12 padd-15">
                    <div class="form-group">
                      <textarea
                        name="message"
                        class="form-control"
                        id="message"
                        placeholder="Message"
                      ></textarea> 
                      <span class="error-msg" id="error-msg"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-item col-12 padd-15">
                    <button type="submit" name="submit" class="btn btn-submit" id="btnSubmit">
                      Send Message
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </section>
        <!--====== Contact Section Ends ======-->
      </div>
      <!--====== Main Content Ends ======-->
      <footer class="footer">
        <div class="copyright">
          Copyright&copy; 2023 | Developed by&nbsp;
          <span class="change-color">Sixtus</span>Dev | All Rights Reserved.
        </div>
      </footer>
    </div>

    <!--====== Main Container Ends ======-->

    <!--====== Style Switcher Starts ======-->
    <div class="style-switcher">
      <div class="style-switcher-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
      </div>
      <div onclick="changeLogo()" class="day-night s-icon">
        <i class="fas"></i>
      </div>
      <h4>Theme Colors</h4>
      <div class="colors">
        <span class="color-1" onclick="setActiveStyle('color-1')"></span>
        <span class="color-2" onclick="setActiveStyle('color-2')"></span>
        <span class="color-3" onclick="setActiveStyle('color-3')"></span>
        <span class="color-4" onclick="setActiveStyle('color-4')"></span>
        <span class="color-5" onclick="setActiveStyle('color-5')"></span>
      </div>
    </div>

    <div class="loader"  id="loader">
      <div class="loading">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
      </div>
    </div>

    <script type="text/javascript">
      // Project files tabLinks
      var tabLinks = document.getElementsByClassName('tab-links')
      var tabContents = document.getElementsByClassName('tab-contents')

      function opentab(tabname) {
        for (tablink of tabLinks) {
          tablink.classList.remove('active-link')
        }

        for (tabContent of tabContents) {
          tabContent.classList.remove('active-tab')
        }

        event.currentTarget.classList.add('active-link')
        document.getElementById(tabname).classList.add('active-tab')
      }

    </script>
     
    <!--====== Javascript File Linked =======-->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"
      referrerpolicy="no-referrer"
    ></script>
    <script src="<?= ROOT_URL ?>JS/services-main.js"></script>
    <script src="<?= ROOT_URL ?>JS/services-switcher.js"></script>
    <script src="<?= ROOT_URL ?>JS/validate-form.js"></script>

   
  </body>
</html>

