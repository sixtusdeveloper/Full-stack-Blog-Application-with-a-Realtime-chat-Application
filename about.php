<?php
// Include header file
include_once 'includes/header.php'; ?>

    <section class="about-bg">
      <div class="flex_contents">
        <div class="content_wrapper">
          <h1 class="content_title">
            Welcome to About Blogify,
            have a great experience!
          </h1>
          <p class="content_body">
          Hello there! It's a pleasure having you. Here, you've the privilege to explore every information you need to know about us as a User.
          Be informed, you have full access to all our platforms which also contains Admin Portal where you can Create, Add, Modify and Manage New and Existing Posts.
          Please, feel free, take your time and explore everything you need as we have your back. 
          </p>
          <a href="<?= ROOT_URL ?>services.php" class="about-lnk">
            <button class="about-button">Learn more
            </button>
          </a>
        </div>

      </div>
    </section>
    <section class="about_main">
      <div class="about_content_row">
        <div class="col-one">
          <h3>Why we're still standing as the top 10 social community.</h3>
          <p>Blogify is a global social community, where people from different part of the world connect to each other through it social platform, for social interactions, views, Advertisements, Job Annoucements, Job requests etc.
            This process doesn't require any proffessional skills or assistance as it's straight forward and well guided.
            Becoming a memeber of this social community is as simple as joining other fimiliar social communities, such as Facebook, twitter, instagram, telegram, pinterest and so on.
            All you need to do is, register or sign up for an Account and you are good to go.
          </p>
          <button onclick="redirect_register()" id="join_btn"class="about_btn"> join now
           </button>
        </div>
        <div class="col-two">
          <img src="<?= ROOT_URL ?>project_images/Blogify-mobile.png" alt="Blogify mobile image">
        </div>
      </div>


      <div class="about_content_row margin-top">
        <div class="col-one">
          <h3>Connect the world with the most exclusive, modern and Advanced technology anywhere, anytime.</h3>
          <p>Worried about fastness, intuitiveness, flexibility, control and security? Great
             to bring you this amazing news, we use most modern, sophisticated and advanced
              technology for handling and maintaining our social platform! Which means, all your data are 
              in good shape, so you have nothing to worry about because, we got you covered.
          </p>
          <button onclick="redierct_contact()"class="about__btn">
            Get in touch
          </button>
        </div>

        <div class="col-two">
          <img src="<?= ROOT_URL ?>project_images/connect-world-2.png" alt="Image of connect the world">
        </div>
      </div>  
    </section>
    <section class="connect-bg">
      <div class="connect_row">
        <div class="connect_items">
          <h2>The modern way to connect and network across the globe with friends, family and business partners.</h2> 
          <p>Easy way to make your views, dreams, contribution, talent and experience know to the world with just one click to set it up and be among the millions across the globe!</p>
          <button onclick="redirect_user_community()"class="connect_btn">
              CONNECT NOW
          </button>
        </div>
      </div>
    </section>

    <section class="testimonials-bg">
      <div class="testimonial-container">
        <h3 class="testi-title">What people say about us</h3> 
        <div class="testimonials__items">
          <!---------------------- 1st Testimonial Content ------------------------->
          <div class="testimonial-content" > 
            <span class="icon-center">
                <i class="fas fa-quote-left"></i>
            </span>
            <img src="<?= ROOT_URL ?>project_images/user-1.jpg" alt="User One"class="user-testimonial-img" />
            <h5 class="user_name">Docas Anbrose</h5>
            <span class="user_posted_time">Posted: 08-01-2023 1:12AM</span>
            <div class="users_text">
              <div class="inner__txt__wrapper">
                <p class="user_txt_par">
                First of all, I must say that this's one of the impressive applications I've used so far. The most amazing part of it is that it's very interactive, loads very fast and easily responsive.
                To top it up.
                </p>
                <button class="btn-cssbuttons">
                  <span>Connect</span><span>
                    <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                      <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"></path>
                    </svg>
                  </span>
                  <ul>
                    <li>
                      <a href="https://twitter.com/SumethWrrn"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                      <path fill="white" d="M962.267429 233.179429q-38.253714 56.027429-92.598857 95.451429 0.585143 7.972571 0.585143 23.990857 0 74.313143-21.723429 148.260571t-65.974857 141.970286-105.398857 120.32-147.456 83.456-184.539429 31.158857q-154.843429 0-283.428571-82.870857 19.968 2.267429 44.544 2.267429 128.585143 0 229.156571-78.848-59.977143-1.170286-107.446857-36.864t-65.170286-91.136q18.870857 2.852571 34.889143 2.852571 24.576 0 48.566857-6.290286-64-13.165714-105.984-63.707429t-41.984-117.394286l0-2.267429q38.838857 21.723429 83.456 23.405714-37.741714-25.161143-59.977143-65.682286t-22.308571-87.990857q0-50.322286 25.161143-93.110857 69.12 85.138286 168.301714 136.265143t212.260571 56.832q-4.534857-21.723429-4.534857-42.276571 0-76.580571 53.979429-130.56t130.56-53.979429q80.018286 0 134.875429 58.294857 62.317714-11.995429 117.174857-44.544-21.138286 65.682286-81.115429 101.741714 53.174857-5.705143 106.276571-28.598857z"></path></svg></a>
                    </li>
                    <li>
                      <a href="https://codepen.io/sharpth"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                      <path fill="white" d="M123.52064 667.99143l344.526782 229.708899 0-205.136409-190.802457-127.396658zM88.051421 585.717469l110.283674-73.717469-110.283674-73.717469 0 147.434938zM556.025711 897.627196l344.526782-229.708899-153.724325-102.824168-190.802457 127.396658 0 205.136409zM512 615.994287l155.406371-103.994287-155.406371-103.994287-155.406371 103.994287zM277.171833 458.832738l190.802457-127.396658 0-205.136409-344.526782 229.708899zM825.664905 512l110.283674 73.717469 0-147.434938zM746.828167 458.832738l153.724325-102.824168-344.526782-229.708899 0 205.136409zM1023.926868 356.00857l0 311.98286q0 23.402371-19.453221 36.566205l-467.901157 311.98286q-11.993715 7.459506-24.57249 7.459506t-24.57249-7.459506l-467.901157-311.98286q-19.453221-13.163834-19.453221-36.566205l0-311.98286q0-23.402371 19.453221-36.566205l467.901157-311.98286q11.993715-7.459506 24.57249-7.459506t24.57249 7.459506l467.901157 311.98286q19.453221 13.163834 19.453221 36.566205z"></path></svg></a>
                    </li>
                    <li>
                      <a href="https://github.com/SharpTH"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                        <path fill="white" d="M950.930286 512q0 143.433143-83.748571 257.974857t-216.283429 158.573714q-15.433143 2.852571-22.601143-4.022857t-7.168-17.115429l0-120.539429q0-55.442286-29.696-81.115429 32.548571-3.437714 58.587429-10.313143t53.686857-22.308571 46.299429-38.034286 30.281143-59.977143 11.702857-86.016q0-69.12-45.129143-117.686857 21.138286-52.004571-4.534857-116.589714-16.018286-5.12-46.299429 6.290286t-52.589714 25.161143l-21.723429 13.677714q-53.174857-14.848-109.714286-14.848t-109.714286 14.848q-9.142857-6.290286-24.283429-15.433143t-47.689143-22.016-49.152-7.68q-25.161143 64.585143-4.022857 116.589714-45.129143 48.566857-45.129143 117.686857 0 48.566857 11.702857 85.723429t29.988571 59.977143 46.006857 38.253714 53.686857 22.308571 58.587429 10.313143q-22.820571 20.553143-28.013714 58.88-11.995429 5.705143-25.746286 8.557714t-32.548571 2.852571-37.449143-12.288-31.744-35.693714q-10.825143-18.285714-27.721143-29.696t-28.306286-13.677714l-11.410286-1.682286q-11.995429 0-16.603429 2.56t-2.852571 6.582857 5.12 7.972571 7.460571 6.875429l4.022857 2.852571q12.580571 5.705143 24.868571 21.723429t17.993143 29.110857l5.705143 13.165714q7.460571 21.723429 25.161143 35.108571t38.253714 17.115429 39.716571 4.022857 31.744-1.974857l13.165714-2.267429q0 21.723429 0.292571 50.834286t0.292571 30.866286q0 10.313143-7.460571 17.115429t-22.820571 4.022857q-132.534857-44.032-216.283429-158.573714t-83.748571-257.974857q0-119.442286 58.88-220.306286t159.744-159.744 220.306286-58.88 220.306286 58.88 159.744 159.744 58.88 220.306286z"></path></svg>
                      </a>
                    </li>
                  </ul>
                </button>
              </div>
            </div>
          </div>

          <!--------------------------- 2nd Testimonial Content ---------------------->
          <div class="testimonial-content">
            <span class="icon-center">
              <i class="fas fa-quote-left"></i>
            </span>
            <img src="<?= ROOT_URL ?>project_images/user-2.jpg" alt="User Two" class="user-testimonial-img"/>
            <h5 class="user_name">Francis Andrew</h5>
            <span class="user_posted_time">Posted: 02-01-2023 11:12AM</span>
            <div class="users_text">
              <div class="inner__txt__wrapper">
                <p class="user_txt_par">
                First of all, I must say that this's one of the impressive applications I've used so far. The most amazing part of it is that it's very interactive, loads very fast and easily responsive.
                To top it up.
                </p> 
                <button class="btn-cssbuttons">
                  <span>Connect</span><span>
                    <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                      <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"></path>
                    </svg>
                  </span>
                  <ul>
                    <li>
                      <a href="https://twitter.com/SumethWrrn"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                      <path fill="white" d="M962.267429 233.179429q-38.253714 56.027429-92.598857 95.451429 0.585143 7.972571 0.585143 23.990857 0 74.313143-21.723429 148.260571t-65.974857 141.970286-105.398857 120.32-147.456 83.456-184.539429 31.158857q-154.843429 0-283.428571-82.870857 19.968 2.267429 44.544 2.267429 128.585143 0 229.156571-78.848-59.977143-1.170286-107.446857-36.864t-65.170286-91.136q18.870857 2.852571 34.889143 2.852571 24.576 0 48.566857-6.290286-64-13.165714-105.984-63.707429t-41.984-117.394286l0-2.267429q38.838857 21.723429 83.456 23.405714-37.741714-25.161143-59.977143-65.682286t-22.308571-87.990857q0-50.322286 25.161143-93.110857 69.12 85.138286 168.301714 136.265143t212.260571 56.832q-4.534857-21.723429-4.534857-42.276571 0-76.580571 53.979429-130.56t130.56-53.979429q80.018286 0 134.875429 58.294857 62.317714-11.995429 117.174857-44.544-21.138286 65.682286-81.115429 101.741714 53.174857-5.705143 106.276571-28.598857z"></path></svg></a>
                    </li>
                    <li>
                      <a href="https://codepen.io/sharpth"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                      <path fill="white" d="M123.52064 667.99143l344.526782 229.708899 0-205.136409-190.802457-127.396658zM88.051421 585.717469l110.283674-73.717469-110.283674-73.717469 0 147.434938zM556.025711 897.627196l344.526782-229.708899-153.724325-102.824168-190.802457 127.396658 0 205.136409zM512 615.994287l155.406371-103.994287-155.406371-103.994287-155.406371 103.994287zM277.171833 458.832738l190.802457-127.396658 0-205.136409-344.526782 229.708899zM825.664905 512l110.283674 73.717469 0-147.434938zM746.828167 458.832738l153.724325-102.824168-344.526782-229.708899 0 205.136409zM1023.926868 356.00857l0 311.98286q0 23.402371-19.453221 36.566205l-467.901157 311.98286q-11.993715 7.459506-24.57249 7.459506t-24.57249-7.459506l-467.901157-311.98286q-19.453221-13.163834-19.453221-36.566205l0-311.98286q0-23.402371 19.453221-36.566205l467.901157-311.98286q11.993715-7.459506 24.57249-7.459506t24.57249 7.459506l467.901157 311.98286q19.453221 13.163834 19.453221 36.566205z"></path></svg></a>
                    </li>
                    <li>
                      <a href="https://github.com/SharpTH"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                        <path fill="white" d="M950.930286 512q0 143.433143-83.748571 257.974857t-216.283429 158.573714q-15.433143 2.852571-22.601143-4.022857t-7.168-17.115429l0-120.539429q0-55.442286-29.696-81.115429 32.548571-3.437714 58.587429-10.313143t53.686857-22.308571 46.299429-38.034286 30.281143-59.977143 11.702857-86.016q0-69.12-45.129143-117.686857 21.138286-52.004571-4.534857-116.589714-16.018286-5.12-46.299429 6.290286t-52.589714 25.161143l-21.723429 13.677714q-53.174857-14.848-109.714286-14.848t-109.714286 14.848q-9.142857-6.290286-24.283429-15.433143t-47.689143-22.016-49.152-7.68q-25.161143 64.585143-4.022857 116.589714-45.129143 48.566857-45.129143 117.686857 0 48.566857 11.702857 85.723429t29.988571 59.977143 46.006857 38.253714 53.686857 22.308571 58.587429 10.313143q-22.820571 20.553143-28.013714 58.88-11.995429 5.705143-25.746286 8.557714t-32.548571 2.852571-37.449143-12.288-31.744-35.693714q-10.825143-18.285714-27.721143-29.696t-28.306286-13.677714l-11.410286-1.682286q-11.995429 0-16.603429 2.56t-2.852571 6.582857 5.12 7.972571 7.460571 6.875429l4.022857 2.852571q12.580571 5.705143 24.868571 21.723429t17.993143 29.110857l5.705143 13.165714q7.460571 21.723429 25.161143 35.108571t38.253714 17.115429 39.716571 4.022857 31.744-1.974857l13.165714-2.267429q0 21.723429 0.292571 50.834286t0.292571 30.866286q0 10.313143-7.460571 17.115429t-22.820571 4.022857q-132.534857-44.032-216.283429-158.573714t-83.748571-257.974857q0-119.442286 58.88-220.306286t159.744-159.744 220.306286-58.88 220.306286 58.88 159.744 159.744 58.88 220.306286z"></path></svg>
                      </a>
                    </li>
                  </ul>
                </button>
              </div>
            </div>
          </div>

          <!-------------------------- 3rd Testimonial Content ---------------------------->
          <div class="testimonial-content" > 
            <span class="icon-center">
              <i class="fas fa-quote-left"></i>
            </span>
            <img src="<?= ROOT_URL ?>project_images/user-3.jpg" alt="User Three"class="user-testimonial-img" />
            <h5 class="user_name">Aphoncis Wilfred</h5>
            <span class="user_posted_time">Posted: 02-01-2023 11:12AM</span>
            <div class="users_text">
              <div class="inner__txt__wrapper">
                <p class="user_txt_par">
                First of all, I must say that this's one of the impressive applications I've used so far. The most amazing part of it is that it's very interactive, loads very fast and easily responsive.
                To top it up.
                </p>
                <button class="btn-cssbuttons">
                  <span>Connect</span><span>
                    <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                      <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"></path>
                    </svg>
                  </span>
                  <ul>
                    <li>
                      <a href="https://twitter.com/SumethWrrn"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                      <path fill="white" d="M962.267429 233.179429q-38.253714 56.027429-92.598857 95.451429 0.585143 7.972571 0.585143 23.990857 0 74.313143-21.723429 148.260571t-65.974857 141.970286-105.398857 120.32-147.456 83.456-184.539429 31.158857q-154.843429 0-283.428571-82.870857 19.968 2.267429 44.544 2.267429 128.585143 0 229.156571-78.848-59.977143-1.170286-107.446857-36.864t-65.170286-91.136q18.870857 2.852571 34.889143 2.852571 24.576 0 48.566857-6.290286-64-13.165714-105.984-63.707429t-41.984-117.394286l0-2.267429q38.838857 21.723429 83.456 23.405714-37.741714-25.161143-59.977143-65.682286t-22.308571-87.990857q0-50.322286 25.161143-93.110857 69.12 85.138286 168.301714 136.265143t212.260571 56.832q-4.534857-21.723429-4.534857-42.276571 0-76.580571 53.979429-130.56t130.56-53.979429q80.018286 0 134.875429 58.294857 62.317714-11.995429 117.174857-44.544-21.138286 65.682286-81.115429 101.741714 53.174857-5.705143 106.276571-28.598857z"></path></svg></a>
                    </li>
                    <li>
                      <a href="https://codepen.io/sharpth"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                      <path fill="white" d="M123.52064 667.99143l344.526782 229.708899 0-205.136409-190.802457-127.396658zM88.051421 585.717469l110.283674-73.717469-110.283674-73.717469 0 147.434938zM556.025711 897.627196l344.526782-229.708899-153.724325-102.824168-190.802457 127.396658 0 205.136409zM512 615.994287l155.406371-103.994287-155.406371-103.994287-155.406371 103.994287zM277.171833 458.832738l190.802457-127.396658 0-205.136409-344.526782 229.708899zM825.664905 512l110.283674 73.717469 0-147.434938zM746.828167 458.832738l153.724325-102.824168-344.526782-229.708899 0 205.136409zM1023.926868 356.00857l0 311.98286q0 23.402371-19.453221 36.566205l-467.901157 311.98286q-11.993715 7.459506-24.57249 7.459506t-24.57249-7.459506l-467.901157-311.98286q-19.453221-13.163834-19.453221-36.566205l0-311.98286q0-23.402371 19.453221-36.566205l467.901157-311.98286q11.993715-7.459506 24.57249-7.459506t24.57249 7.459506l467.901157 311.98286q19.453221 13.163834 19.453221 36.566205z"></path></svg></a>
                    </li>
                    <li>
                      <a href="https://github.com/SharpTH"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                        <path fill="white" d="M950.930286 512q0 143.433143-83.748571 257.974857t-216.283429 158.573714q-15.433143 2.852571-22.601143-4.022857t-7.168-17.115429l0-120.539429q0-55.442286-29.696-81.115429 32.548571-3.437714 58.587429-10.313143t53.686857-22.308571 46.299429-38.034286 30.281143-59.977143 11.702857-86.016q0-69.12-45.129143-117.686857 21.138286-52.004571-4.534857-116.589714-16.018286-5.12-46.299429 6.290286t-52.589714 25.161143l-21.723429 13.677714q-53.174857-14.848-109.714286-14.848t-109.714286 14.848q-9.142857-6.290286-24.283429-15.433143t-47.689143-22.016-49.152-7.68q-25.161143 64.585143-4.022857 116.589714-45.129143 48.566857-45.129143 117.686857 0 48.566857 11.702857 85.723429t29.988571 59.977143 46.006857 38.253714 53.686857 22.308571 58.587429 10.313143q-22.820571 20.553143-28.013714 58.88-11.995429 5.705143-25.746286 8.557714t-32.548571 2.852571-37.449143-12.288-31.744-35.693714q-10.825143-18.285714-27.721143-29.696t-28.306286-13.677714l-11.410286-1.682286q-11.995429 0-16.603429 2.56t-2.852571 6.582857 5.12 7.972571 7.460571 6.875429l4.022857 2.852571q12.580571 5.705143 24.868571 21.723429t17.993143 29.110857l5.705143 13.165714q7.460571 21.723429 25.161143 35.108571t38.253714 17.115429 39.716571 4.022857 31.744-1.974857l13.165714-2.267429q0 21.723429 0.292571 50.834286t0.292571 30.866286q0 10.313143-7.460571 17.115429t-22.820571 4.022857q-132.534857-44.032-216.283429-158.573714t-83.748571-257.974857q0-119.442286 58.88-220.306286t159.744-159.744 220.306286-58.88 220.306286 58.88 159.744 159.744 58.88 220.306286z"></path></svg>
                      </a>
                    </li>
                  </ul>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="faq_section">
      <h1>Frequent Asked Questions</h1>
      <p>Check out the common and most questions asked by users. You can also check the full list of questions asked by our users and likewise ask yours also.</p>
      <div class="faq_row">
        <div class="faq_content_wrapper">
        
        </div>
      </div>
      
      <div class="accordion-container">
        <div class="accordion-inner-wrapper">
          <div class="accordion-item">
            <button class="accordion-header"><strong>How does Blogify App works?</strong><i class="fas fa-angle-down"></i></button>
            <div class="accordion-body">Blogify application works just almost like most of the social media applications on the internet. However, there is just a slight difference, with Blogify application, you won't add your post and not have access to remove, modify or edit and update it anytime you want to. Rather, we made it more easier for you so you could even manipulate and customize it to your standard. Which will make life a lot more easier for you and makes your credentials and data a lot more secured.</div>
          </div>
          <div class="accordion-item">
            <button class="accordion-header"><strong>Where can I learn how to better use this Application?</strong><i class="fas fa-angle-down"></i></button>
            <div class="accordion-body">There are some few ways you could get a complete guide on how to use the application correctly and more friendly. You can check out the  <a href="main-services.php" class="guideline_link">How to use</a> or check the overview section of the page for more information about using this app. And you can as well chat or seek for help from any of our available agents if any more ambiguation.</div>
          </div>
          <div class="accordion-item">
            <button class="accordion-header"><strong>How do I become an Admin?</strong><i class="fas fa-angle-down"></i></button>
            <div class="accordion-body">
            By default you can't make yourself an Admin. However, any existing user can add you up as an Admin. After that you will be able to access other crusial features of the Application, like Adding category, Managing categoryg users, Managin and so on. More importantly, you will be able to add anyone as Admin
            </div>
          </div>
          <div class="accordion-item">
            <button class="accordion-header"><strong>How would new signed up users access the dashboard?</strong><i class="fas fa-angle-down"></i></button>
            <div class="accordion-body">Every signed up users have access to the Dashboard but partial access to it features. Navigate to the top-right corner of your profile picture or avatar and hover on it, then, you would see some of the linked features available. Click and navigate to the Dashboard, there you will be able to only add a post and manage your posts as an author.</div>
          </div>
          <div class="accordion-item">
            <button class="accordion-header"><strong>How do I add, edit or delete a post I no longer need?</strong><i class="fas fa-angle-down"></i></button>
            <div class="accordion-body">Once you signed up as a user, you would be able to add post and manage your posts from your dashboard. However, you will be limited to adding and managing users only if you're added by an existing user otherwise, you will be limited to other essential features of the App.</div>
          </div>
        </div>
      </div>

      <div class="user-feedback">
        <h5>Find this article helpful?</h5>
        <p>If you like to explore more about our FAQ, the check out the full list of it from <a href="faq.php" class="FAQ-link">here</a></p>
        <span class="user-feedback-items">
          <button class="respond_yes_btn" id="respond-yes"onclick="respond_yes()">Yes</button>
          <button class="respond_yes_btn" id="respond-no" onclick="respond_no()">No</button>
        </span>
      </div>
    </section>
    <div class="result" id="result">🎉Thanks for your response! Feel free to let us know how or where we should improve.</div>
    <div class="result" id="reject">😭We regret any inconveniences you might experienced on our App! Please, let us know how or where we should improve.</div>



    <script type="text/javascript">
      // Redirect user to Community page
      function redirect_register(){
        window.location.href = "register.php";
      }

      // Redirect user Contact page
      function redierct_contact(){
        window.location.href = "contact.php";
      }
      // Redirect user Contact page
      function redirect_user_community(){
        window.location.href = "Admin/community.php";
      }
    </script>
    <!-- Include footer file -->
    <?php include_once 'includes/footer.php'; ?>
       
 