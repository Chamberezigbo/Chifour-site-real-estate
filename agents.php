<?php
require_once("header.php");
require('./process/core/pdo.php');
$db = new DatabaseClass();

// Query the database after processing any POST requests
$users = $db->SelectAll("SELECT * FROM agent");

?>


    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_img17.png')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Our Realtors</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Our Realtors
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
                     

   <!--  <div class="section section-4 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-5">
            <h2 class="font-weight-bold heading text-primary mb-4">
              Let's find home that's perfect for you
            </h2>
            <p class="text-black-50">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
              enim pariatur similique debitis vel nisi qui reprehenderit.
            </p>
          </div>
        </div>
        <div class="row justify-content-between mb-5">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <img src="images/hero_bg_3.jpg" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-home2"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">2M Properties</h3>
                <p class="text-black-50">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum iste.
                </p>
              </div>
            </div>

            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-person"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Top Rated Agents</h3>
                <p class="text-black-50">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum iste.
                </p>
              </div>
            </div>

            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-security"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Legit Properties</h3>
                <p class="text-black-50">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum iste.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row section-counter mt-5">
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">3298</span></span
              >
              <span class="caption text-black-50"># of Buy Properties</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">2181</span></span
              >
              <span class="caption text-black-50"># of Sell Properties</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="500"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">9316</span></span
              >
              <span class="caption text-black-50"># of All Properties</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="600"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">7191</span></span
              >
              <span class="caption text-black-50"># of Agents</span>
            </div>
          </div>
        </div>
      </div>
    </div> -->

   
    <div class="section section-5 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-6 mb-5">
            <h2 class="font-weight-bold heading text-primary mb-4">
              Our Realtors
            </h2>
            <p class="text-black-50">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
              enim pariatur similique debitis vel nisi qui reprehenderit totam?
              Quod maiores.
            </p>
          </div>
        </div>
        <div class="row">
            <?php if (!empty($users)) { ?>
                <?php foreach ($users as $user) { ?>
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
                        <div class="h-100 person">
                            <!-- Placeholder for image if needed -->
                            <!-- <img src="path/to/agent/image.jpg" alt="Agent Image" class="img-fluid" /> -->

                            <div class="person-contents">
                                <h2 class="mb-0">
                                    <a href="#"><?php echo htmlspecialchars($user['fullName']); ?></a>
                                </h2>
                                <span class="meta d-block mb-3">
                                    <a href="#"><?php echo htmlspecialchars($user['email']); ?></a>
                                </span>
                                <span class="meta d-block mb-3">
                                    <a href="#"><?php echo htmlspecialchars($user['phone']); ?></a>
                                </span>
                                <p>
                                    <!-- Placeholder for agent description -->
                                    <?php echo htmlspecialchars($user['address']); ?>
                                </p>

                                <ul class="verification-status list-unstyled list-inline">
                                    <?php if ($user['verified']) { ?>
                                        <!-- Good mark for verified users -->
                                        <li class="list-inline-item">
                                            <span class="icon-check-circle" style="color: green; font-size: 1.5em;"></span> <!-- Checkmark icon -->
                                        </li>
                                        <li class="list-inline-item">Verified</li>
                                    <?php } else { ?>
                                        <!-- Bad mark for not verified users -->
                                        <li class="list-inline-item">
                                            <span class="icon-times-circle" style="color: red; font-size: 1.5em;"></span> <!-- Cross icon -->
                                        </li>
                                        <li class="list-inline-item">Not Verified</li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="col-12">
                    <p class="text-center">No agents available.</p>
                </div>
            <?php } ?>
        </div>
      </div>
    </div>




 <

    
     <div class="section">
      <div class="row justify-content-center footer-cta" data-aos="fade-up">
        <div class="col-lg-7 mx-auto text-center">
          <h2 class="mb-4">Be a part of our growing Real State Realtors</h2>
          <p>
            <a
              href="./process/signup.php"
              class="btn btn-primary text-white py-3 px-4"
              >Sign up to be an Associate</a
            >
          </p>
        </div>
        <!-- /.col-lg-7 -->
      </div>
      <!-- /.row -->
    </div>



        <section>
        <h1>Our Estates</h1>
        <div class="slider">
            <div class="slider-items">
                <img src="images/img1.png"
                    alt="">
                <img src="imges/img2"
                    alt="">
                <img src="images/img3.png"
                    alt="">
                <img src="images/img4.png"
                    alt="">
                <img src="images/img5.png"
                    alt="">
                <img src="images/img1.png" alt="">
                <img src="images/img2.png"
                    alt="">
                <img src="images/img3.png"
                    alt="">
                <img src="images/img4.png"
                    alt="">
                <img src="images/img5.png"
                    alt="">
                <img src="images/img1.png"
                    alt="">
                <img src="images/img3.png"
                    alt="">
                <img src="images/img4.png" alt="">
                <img src="images/img5.png"
                    alt="">


            </div>
        </div>

    </section>






<?php
require "footer.php";