<?php
require_once("header.php");
require('./process/core/pdo.php');
$db = new DatabaseClass();

// Query the database after processing any POST requests
$properties = $db->SelectAll("SELECT * FROM product ORDER BY RAND() LIMIT 5", []);


?>

    <div class="hero">
      <div class="hero-slide">
        <div
          class="img overlay"
          style="background-image: url('images/hero_img15.png')"
        ></div>
        <div
          class="img overlay"
          style="background-image: url('images/img16.jpg')"
        ></div>
        <div
          class="img overlay"
          style="background-image: url('images/hero_img17.png')"
        ></div>
      </div>

      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center">
             <!-- <h6>
              Welcome to Chifourproperties 
            </h6> -->
            <h1 class="heading" data-aos="fade-up">
              "Where every property is a step toward building your future."
            </h1>
            <form
              action="#"
              class="narrow-w form-search d-flex align-items-stretch mb-3"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <input
                type="text"
                class="form-control px-4"
                placeholder="Your ZIP code or City. e.g. Port Harcourt"
              />
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>



   

 <div class="section section-4 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-5">
            <h2 class="font-weight-bold heading text-primary mb-4">
              WELCOME TO CHIFOUR PROPERTIES
            </h2>
            <!-- <p class="text-black-50">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
              enim pariatur similique debitis vel nisi qui reprehenderit.
            </p> -->
          </div>
        </div>
        <div class="row justify-content-between mb-5">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <img src="images/img28.png" alt="Image" class="img-fluid" />
            </div>
           <!--  <div class="img-about2 dots" style="position:absolute; z-index: 2; width: 400px; height: 200px;bottom: -355px; right: 100px;" >
              <img src="images/img22.png" alt="Image" class="img-fluid" />
            </div> -->
          </div>
          <div class="col-lg-4">
            <div class="d-flex feature-h">
              <!-- <span class="wrap-icon me-3">
                <span class="icon-home2"></span>
              </span> -->
              <div class="feature-text">
                <!-- <h3 class="heading">2M Properties</h3> -->
                <p class="text-black-50">
                  <p class="text-black-50">
              Chifour Properties Limited is a dynamic real estate company committed to redefining the property landscape in Nigeria.   
            </p>
            <p class="text-black-50">
             With a passion for excellence and a vision for innovation, we offer a wide range of real estate services that cater to both residential and commercial needs.
            </p>
            <p class="text-black-50">
              Our core focuse in on providing exceptional value through strategic investment, property development, and management services.
            </p>
              </div>
            </div>

           <!--  <div class="d-flex feature-h">
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
            </div> -->

           <!--  <div class="d-flex feature-h">
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
            </div> -->
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
                ><span class="countup text-primary">1</span></span
              >
              <span class="caption text-black-50">City in Nigeria</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">6</span></span
              >
              <span class="caption text-black-50">Estates</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="500"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">2000</span></span
              >
              <span class="caption text-black-50">Satified Clients</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="600"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">200+</span></span
              >
              <span class="caption text-black-50">Realtors</span>
            </div>
          </div>
        </div>
      </div>
    </div>



  <div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-primary heading">Our Estates</h2>
          </div>
          <div class="col-lg-6 text-lg-end">
            <p>
              <a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">View More Estates</a>
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
                <?php if (count($properties) > 0): ?>
                  <?php foreach ($properties as $property): ?>
                    <div class="property-item">
                      <a href="property-single.html" class="img">
                        <img src="./process/admin/uploads/<?php echo $property['image2'];?>" alt="Image" class="img-fluid" />
                      </a>

                      <div class="property-content">
                        <div class="price mb-2"><span><?= htmlspecialchars($property['amount']) ?></span></div>
                        <div>
                          <span class="d-block mb-2 text-black-50"><?= htmlspecialchars($property['name']) ?></span>
                          <span class="city d-block mb-3"><?= htmlspecialchars($property['product_type']) ?></span>
                          <a href="property-single.php?id=<?php echo $property['id']; ?>" class="btn btn-primary py-2 px-3">See details</a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No properties available at the moment.</p>
                <?php endif; ?>
              </div>

              <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>





    <!-- Our Services Start -->
    <section class="features-1">
      <div class="container">
        <h1>Our Services</h1>
        <div class="row">
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature">
              <span class="flaticon-house"></span>
              <h3 class="mb-3">Propertiy Development</h3>
              <p>
                We specialize in developing high-quality residential and commercial properties that meet the highest standards of design, functionality, and sustainability.

              </p>
              <p><a href="#" class="learn-more">Learn More</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
            <div class="box-feature">
              <span class="flaticon-building"></span>
              <h3 class="mb-3">Real Estate Investment</h3>
              <p>
                We offer strategic investment opportunities in the real estate sector, helping our clients maximize returns while minimizing risks.

              </p>
              <p><a href="#" class="learn-more">Learn More</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature">
              <span class="flaticon-house-3"></span>
              <h3 class="mb-3">Property Management</h3>
              <p>
                Our property management services are designed to ensure that your investment is well-maintained and generates optimal returns.

              </p>
              <p><a href="#" class="learn-more">Learn More</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
            <div class="box-feature">
              <span class="flaticon-house-1"></span>
              <h3 class="mb-3">Sales And Leasing</h3>
              <p>
                We provide expert assistance in buying, selling, and leasing properties, ensuring a smooth and efficient transaction process.

              </p>
              <p><a href="#" class="learn-more">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services ends -->


  <!-- Associate sign up start  -->
    <div class="section"  style="background-color: rgba(50, 50, 31, 0.09);">


      <div class="row justify-content-center footer-cta" data-aos="fade-up">
        <div class="col-lg-7 mx-auto text-center">
          <h2 class="mb-4">Be a part of our growing Real Estate Team </h2>
          <p>
            <a
              href="./process/signup.php"
              class="btn btn-primary text-white py-3 px-4"
              >Become an Associate</a
            >
          </p>
        </div>
        <!-- /.col-lg-7 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- Associate sign up ends -->


<!-- Testimonial starts -->
    <div class="section sec-testimonials">
      <!-- <img src=" images/img9.jpg" style="width: 100%; position: absolute; background:rgba(25, 36, 55, 0.1), "> -->

      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
              Testimonials
            </h2>
          </div>
          <div class="col-md-6 text-md-end">
            <div id="testimonial-nav">
              <span class="prev" data-controls="prev">Prev</span>

              <span class="next" data-controls="next">Next</span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
          <div class="testimonial-slider">
            <div class="item">
              <div class="testimonial">
                <img
                  src="images/img27.png"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">James Smith</h3>
                <blockquote>
                  <p>
                    &ldquo;Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at the
                    coast of the Semantics, a large language ocean.&rdquo;
                  </p>
                </blockquote>
                <!-- <p class="text-black-50">Designer, Co-founder</p> -->
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="images/img27.png"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Mike Houston</h3>
                <blockquote>
                  <p>
                    &ldquo;Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at the
                    coast of the Semantics, a large language ocean.&rdquo;
                  </p>
                </blockquote>
                <!-- <p class="text-black-50">Designer, Co-founder</p> -->
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="images/img27.png"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Cameron Webster</h3>
                <blockquote>
                  <p>
                    &ldquo;Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at the
                    coast of the Semantics, a large language ocean.&rdquo;
                  </p>
                </blockquote>
                <!-- <p class="text-black-50">Designer, Co-founder</p> -->
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="images/img27.png"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Dave Smith</h3>
                <blockquote>
                  <p>
                    &ldquo;Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at the
                    coast of the Semantics, a large language ocean.&rdquo;
                  </p>
                </blockquote>
                <!-- <p class="text-black-50">Designer, Co-founder</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Testimonial ends -->


    
 
 <!-- Estate starts -->
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
<!-- Estate ends -->





<?php
require "footer.php";