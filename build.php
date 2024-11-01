<?php
require_once("header.php");
require('./process/core/pdo.php');
$db = new DatabaseClass();

// Get the current page from the URL or set a default
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Define how many results per page
$resultsPerPage = 6;

// Calculate the starting limit index
$offset = ($currentPage - 1) * $resultsPerPage;

// Fetch the properties with pagination
$properties = $db->SelectAll("SELECT * FROM product WHERE product_type = 'buy_and_build' ORDER BY RAND() LIMIT :offset, :limit", [
    'offset' => $offset,
    'limit' => $resultsPerPage
]);

// Count total properties for pagination
$totalProperties = $db->SelectOne("SELECT COUNT(*) as total FROM product WHERE product_type = 'buy_and_build'", []);
$totalPages = ceil($totalProperties['total'] / $resultsPerPage);

?>

    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_img17.png')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Properties</h1>

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
                  Estates
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6 text-center mx-auto">
            <h2 class="font-weight-bold text-primary heading">
              Our Buy And Build Estates
            </h2>
          </div>
        </div>
     <!--   <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
                <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="images/img12.png" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>


                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div> -->
                <!-- .item -->


                <!-- <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="images/img13.png" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                    <div class="price mb-2"><span>N 2,000,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >Favour Estate</span
                      >
                      <span class="city d-block mb-3">Omagwa</span>

                      

                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
                <! .item - -->

               <!--  <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="images/img14.png" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                    <div class="price mb-2"><span>N 1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >Enterprenuer Estate</span
                      >
                      <span class="city d-block mb-3">Abara Etche</span>

                     

                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div> -->
                <!-- .item -->

               <!--  <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="images/img23.png" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      

                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div> -->
                <!-- .item -->
<!-- 
                <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="images/img22.png" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                    

                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div> -->
                <!-- .item -->

               <!--  <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="images/img21.png" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>


                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div> -->
                <!-- .item -->
              <!-- </div> -->

            <!--   <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Prev</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Next</span
                >
              </div> -->
           <!--  </div>
          </div>
        </div>
      </div>
    </div> -->


<div class="section section-properties">
    <div class="container">
        <div class="row">
            <?php if (empty($properties)): ?>
                <div class="col-12 text-center">
                    <p>No properties found for your search criteria.</p>
                </div>
            <?php else: ?>
                <?php foreach ($properties as $property): ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="property-item mb-30">
                            <a href="property-single.php?id=<?php echo $property['id']; ?>" class="img">
                                <img src="./process/admin/uploads/<?php echo $property['pro_image']; ?>" alt="Image" class="img-fluid" />
                            </a>

                            <div class="property-content">
                                <div class="price mb-2"><span><?php echo htmlspecialchars($property['amount']); ?></span></div>
                                <div>
                                    <span class="d-block mb-2 text-black-50"><?php echo htmlspecialchars($property['name']); ?></span>
                                    <span class="city d-block mb-3"><?php echo htmlspecialchars($property['product_type']); ?></span>

                                    <a href="property-single.php?id=<?php echo $property['id']; ?>" class="btn btn-primary py-2 px-3">See details</a>
                                </div>
                            </div>
                        </div>
                        <!-- .item -->
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="row align-items-center py-5">
            <div class="col-lg-3">Pagination (<?php echo $currentPage; ?> of <?php echo $totalPages; ?>)</div>
            <div class="col-lg-6 text-center">
                <div class="custom-pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?php echo $i; ?>" class="<?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>
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
require_once "footer.php";