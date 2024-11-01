<?php
require_once("header.php");
require('./process/core/pdo.php');
$db = new DatabaseClass();

// Capture the property ID from the URL
$propertyId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the property details from the database using the captured ID
$property = $db->SelectOne("SELECT * FROM product WHERE id = ?", [$propertyId]);

if (!$property) {
    echo "Property not found.";
    exit;
}

?>

    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_img17.png')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">
             Our Property
            </h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">
                  <a href="build.html">Properties</a>
                </li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Our Estate
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    
    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="img-property-slide-wrap">
                        <div class="img-property-slide">
                            <img src="./process/admin/uploads/<?php echo $property['image2']; ?>" alt="Image" class="img-fluid" />
                            <img src="./process/admin/uploads/<?php echo $property['image2']; ?>" alt="Image" class="img-fluid" />
                            <img src="./process/admin/uploads/<?php echo $property['image2']; ?>" alt="Image" class="img-fluid" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2 class="heading text-primary"><?php echo htmlspecialchars($property['name']); ?></h2>
                    <p class="meta"><?php echo htmlspecialchars($property['amount']); ?></p>
                    <p class="meta"><?php echo htmlspecialchars($property['product_type']); ?></p>
                    <p class="text-black-50"><?php echo htmlspecialchars($property['description']); ?></p>
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