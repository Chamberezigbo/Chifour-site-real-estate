<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />


    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->






    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">



    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="script.js"></script>




    <!-- <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->

    <title>
      Property &mdash; Free Bootstrap 5 Website Template by Untree.co
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <?php $page = basename($_SERVER['PHP_SELF']) ?>
    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="index.php" class="logo m-0 float-start">
              <img src="images/img6.png">
            </a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="<?php if ($page == 'index.php') : echo 'active'; endif ?>"><a href="index.php">Home</a></li>
              <li class="<?php if ($page == 'about.php') : echo 'active'; endif; ?>"><a href="about.php">About Us</a></li>
               <li class="<?php if ($page == 'services.php') : echo 'active'; endif; ?>"><a href="services.php">Services</a></li>
              <li class="has-children">
                <a href="#">Properties</a>
                <ul class="dropdown">
                  <li class="<?php if ($page == 'build.php') : echo 'active'; endif; ?>"><a href="build.php">Buy and Build Properties</a></li>
                  <li class="<?php if ($page == 'banking.php') : echo 'active'; endif; ?>"><a href="banking.php">Land Banking Properties</a></li>
                  <!-- <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown">
                      <li><a href="#">Sub Menu One</a></li>
                      <li><a href="#">Sub Menu Two</a></li>
                      <li><a href="#">Sub Menu Three</a></li>
                    </ul>
                  </li> -->
                </ul>
              </li>
             
              <li class="<?php if ($page == 'agents.php') : echo 'active'; endif; ?>"><a href="agents.php">Our Realtors</a></li>
              <!-- <li><a href="faq.php">FAQ</a></li> -->
              <li class="<?php if ($page == 'contact.php') : echo 'active'; endif; ?>"><a href="contact.php">Contact Us</a></li>
              
              <li>
                <button class="btn btn-primary" href="contact.php">Visit Our Estate</button>
              
            </li>
            </ul>
          </div>


            <a
              href="contact.php"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>