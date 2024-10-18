<!DOCTYPE html>
<html lang="en">

<head>
<!-- ===============================================================================================================  -->
<?php
// <-- common upper links -->
require_once("common_content/upper_links.php");
?>
<!-- ===============================================================================================================  -->

<title>Graphical World</title>
</head>




<body>

<!-- ===============================================================================================================  -->
<?php
// <-- First navbar -->
require_once("common_content/first_navbar.php");

// <-- Second navbar -->
require_once("common_content/second_navbar.php");
?>
<!-- ===============================================================================================================  -->








  <!-- //===== LANDING PAGE START =====// -->
  <?php
         require_once("dashboard/partials/DBconnect.php");
         $sql = "SELECT * FROM contact_us";
         $stmt = $connectingDB->query($sql);
         while ($Data = $stmt->fetch()) {
             $address = $Data["address"];
             $heading_title = $Data["heading"];
             $ph1 = $Data["ph1"];
             $ph2 = $Data["ph2"];
             $email = $Data["email"];
             $g_map = $Data["g_map"];
         }
         
         ?>
  <div class="hero vh-100 d-flex align-items-center" id="home">
      <div class="container">
          <div class="row">
              <div class="col-lg-7 mx-auto text-center">
                  <h1 class="display-4 text-white">WELCOME TO - GRAPHICAL WORLD</h1>
                  <p class="text-white my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque quia
                      sequi eius. Quas, totam aliquid. Repudiandae reiciendis vel excepturi ipsa voluptate dicta!</p>
                  <a href="#" class="btn me-2 btn-primary p-3 rounded-0">Get Started</a>
                  <a href="#" class="btn btn-outline-light p-3 rounded-0">My Portfolio</a>
              </div>
          </div>
      </div>
  </div>
  <!-- //===== LANDING PAGE END =====// -->





  
  <!--//===== MARQUEE HEADING PART START ===== //-->
  <div class="p-2 shadow-sm fst-italic" style="background-color: black;">
    <marquee behavior="" direction="">
      <h5 class="text-white p-1">
        <i class="fa-solid fa-star text-warning"></i>
        Walk into the digital market with graphical world
        <i class="fa-solid fa-star text-warning"></i>
        বিয়েতে অ্যালবাম বানান। আপনার সুন্দর মুহূর্তের ছবিগুলো সারা জীবন সাথে রাখুন। অল্প খরচে আমাদের সঙ্গে
        <i class="fa-solid fa-star text-warning"></i>
        <!-- 7029979185 or submit the contact us form or visit our campus. Address: NH-60, Sagar, Bandhersole Bus
          Stop, West
          Bengal 731124 -->
      </h5>
    </marquee>
  </div><br>
  <!-- //===== MARQUEE HEADING PART END =====//  -->




  <!-- //===== OUR SERVICES SECTION START =====//  -->
  <div class="container mt-5">
  <div class="section-title ps-lg-5">
          <h2>Services</h2>
          <p>Check our Services</p>
        </div>

        <div class="row p-lg-5">
            <div class="col-lg-6 col-md-6 mb-4">
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-chart-simple fs-2 rounded p-3 bg-warning"></i>
                    <a href="digital-markeeting-details.php" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold">Digital Markeeting</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus ut, aperiam accusantium illum vel eum totam atque ex cumque corrupti.</p>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-camera-rotate fs-2 rounded p-3 bg-warning"></i>
                    <a href="photography-details.php" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold">Photography</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus ut, aperiam accusantium illum vel eum totam atque ex cumque corrupti.</p>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-wand-magic-sparkles fs-2 rounded p-3 bg-warning"></i>
                    <a href="graphics-design-details.php" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold">Graphic Design</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus ut, aperiam accusantium illum vel eum totam atque ex cumque corrupti.</p>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-earth-oceania fs-2 rounded p-3 bg-warning"></i>
                    <a href="webdev-details.php" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold">Wesite Building</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus ut, aperiam accusantium illum vel eum totam atque ex cumque corrupti.</p>
                 </div>
            </div>
        </div>
    </div><br>
<!-- //===== OUR SERVICES SECTION END =====//  -->







  







  <!-- //===== MIDDLE PART START =====// -->
  <div class="second_home bg-white">
    <div class="container">
    <div class="section-title ps-lg-5">
          <h2>About us</h2>
          <p>About Graphical World</p>
        </div>
      <div class="row featurette">
        <div class="col-md-6 my-5">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded-circle"
            width="500" height="500" src="image/about_us_bg.jpg" alt="home page image" />
          <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> -->
        </div>
        <div class="col-md-6 my-5">
          <span class="badge rounded-pill bg-secondary mt-5 p-2 mb-2">The best Cleaning Serivice Solution</span>
          <h1 class="featurette-heading text-dark fw-bold" style="font-family: 'Bebas Neue', sans-serif;">
            Your Top Choice
            <span class="text-warning">For Digital Work Designing and Graphic</span>
          </h1>
          <p class="lead text-muted">
            Some great placeholder content for the first featurette here.
            Imagine some exciting prose here.
          </p>
          <div class="container">
            <div class="row text-dark">
              <div class="col border-end">
                <h1 class="text-dark">6500+</h1>
                Project Completed
              </div>
              <div class="col border-end">
                <h1 class="text-dark">5+</h1>
                Expert Worker
              </div>
              <div class="col">
                <h1 class="text-dark">99%</h1>
                Satisfy Customer
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><br><br><br>
  <!-- //===== MIDDLE PART END =====// -->







  
<!-- //===== PROJECT PART START =====// -->
  <div class="container px-4 pt-5 mb-5">
    <!-- Swiper -->
  <div class="row">
  <div class="col-lg-4 mt-3">
  <div class="section-title ps-lg-5">
          <h2>Portfolio</h2>
          <p>My creative Work <span class="text-danger font-italic">Latest Project</span></p>
          <!-- <span class="btn btn-danger">Danger</span> -->
           <span><a href="portfolio.php" class="btn btn-danger">Our Portfolio</a></span>
        </div>
 </div>

<div class="swiper mySwiper col-lg-8">
<div class="swiper-wrapper mb-5">
  <div class="swiper-slide bg-white text-center overflow-hidden">
    <img src="image/invition_card.jpeg" class="w-100 mb-2">
  </div>
  <div class="swiper-slide bg-white text-center overflow-hidden">
    <img src="image/weeding_photography.jpeg" class="w-100 mb-2">
  </div>
  <div class="swiper-slide bg-white text-center overflow-hidden">
    <img src="image/visiting_card_03.jpeg" class="w-100 mb-2">
  </div>
  <div class="swiper-slide bg-white text-center overflow-hidden">
    <img src="image/visiting_card_02.jpeg" class="w-100 mb-2">
  </div>
  <div class="swiper-slide bg-white text-center overflow-hidden">
    <img src="image/visiting_card_02.jpeg" class="w-100 mb-2">
  </div>
  <div class="swiper-slide bg-white text-center overflow-hidden">
    <img src="image/visiting_card_02.jpeg" class="w-100 mb-2">
  </div>
</div>
<div class="swiper-pagination"></div>
</div>
  </div>
<!-- Swiper JS -->
</div><br>
    <!-- //===== PROJECT PART END=====// -->






<!-- //===== BOOK AN APPOINTMENT SECTION START =====//  -->
<section class="p-5 text-white text-center shadow border" id="book_appointment">
    <h1 class="font-monospace fw-bold">MAKE YOUR DREAM SMILE A REALITY</h1>
    <p class="my-4 fw-bold">Call Us To Book Your Appointment Today</p>
    <a href="tel:7029979185"><button type="button" class="btn btn-warning text-dark border border-dark rounded-0 fw-bold p-3 shadow-none  me-2"><i class="fa fa-phone"></i>
        7029979185</button></a>
    <a href="contact_us.html"><button type="button" class="btn btn-outline-warning border rounded-0 fw-bold p-3 shadow-none">Book
          an Appointment</button></a>   
  </section><br><br>
  <!-- //===== BOOK AN APPOINTMENT SECTION START =====//  -->






  <!-- //===== TESTIMONIAL SECTION START =====//  -->

  <div class="container mt-5 mb-5">
  <div class="section-title ps-lg-5 mb-5">
          <h2>Feedback</h2>
          <p>Our Client's Feedback</p>
        </div>
    <!-- Swiper -->
    <div class="swiper swiper-testimonials">
      <div class="swiper-wrapper mb-5">
        <div class="review-card swiper-slide p-4 shadow">
          <div class="header-content">
            <div class="img-area">
              <img alt="customer1" src="image/ayann.jpg">
            </div>
            <div class="info">
              <h4>Jason Chedd</h4>
              <p>Web Designer</p>
            </div>
          </div>
          <div class="single-review">
            <p><i class="fa-solid fa-quote-left fs-4"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,
              dolorum. <i class="fa-solid fa-quote-right fs-4"></i></p>
          </div>
          <div class="review-footer">
            <div class="rating">
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
            </div>
            <p>Reviewed on 01/03/2023</p>
          </div>
        </div>
        <div class="review-card swiper-slide p-4 shadow">
          <div class="header-content">
            <div class="img-area">
              <img alt="customer1" src="image/ayann.jpg">
            </div>
            <div class="info">
              <h4>John Doe</h4>
              <p>Maketing Manager</p>
            </div>
          </div>
          <div class="single-review">
            <p><i class="fa-solid fa-quote-left fs-4"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,
              dolorum.<i class="fa-solid fa-quote-right fs-4"></i></p>
          </div>
          <div class="review-footer">
            <div class="rating">
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="">★</span>
              <span class="">★</span>
            </div>
            <p>Reviewed on 01/01/2023</p>
          </div>
        </div>
        <div class="review-card swiper-slide p-4 shadow">
          <div class="header-content">
            <div class="img-area">
              <img alt="customer1" src="image/ayann.jpg">
            </div>
            <div class="info">
              <h4>John Doe</h4>
              <p>Maketing Manager</p>
            </div>
          </div>
          <div class="single-review">
            <p><i class="fa-solid fa-quote-left fs-4"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,
              dolorum.<i class="fa-solid fa-quote-right fs-4"></i></p>
          </div>
          <div class="review-footer">
            <div class="rating">
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="">★</span>
              <span class="">★</span>
            </div>
            <p>Reviewed on 01/01/2023</p>
          </div>
        </div>
        <div class="review-card swiper-slide p-4 shadow">
          <div class="header-content">
            <div class="img-area">
              <img alt="customer1" src="image/ayann.jpg">
            </div>
            <div class="info">
              <h4>John Doe</h4>
              <p>Maketing Manager</p>
            </div>
          </div>
          <div class="single-review">
            <p><i class="fa-solid fa-quote-left fs-4"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,
              dolorum. <i class="fa-solid fa-quote-right fs-4"></i></p>
          </div>
          <div class="review-footer">
            <div class="rating">
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="">★</span>
              <span class="">★</span>
            </div>
            <p>Reviewed on 01/01/2023</p>
          </div>
        </div>
        <div class="review-card swiper-slide p-4 shadow">
          <div class="header-content">
            <div class="img-area">
              <img alt="customer1" src="image/ayann.jpg">
            </div>
            <div class="info">
              <h4>John Doe</h4>
              <p>Maketing Manager</p>
            </div>
          </div>
          <div class="single-review">
            <p><i class="fa-solid fa-quote-left fs-4"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,
              dolorum.<i class="fa-solid fa-quote-right fs-4"></i></p>
          </div>
          <div class="review-footer">
            <div class="rating">
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="">★</span>
              <span class="">★</span>
            </div>
            <p>Reviewed on 01/01/2023</p>
          </div>
        </div>
        <div class="review-card swiper-slide p-4 shadow">
          <div class="header-content">
            <div class="img-area">
              <img alt="customer1" src="image/ayann.jpg">
            </div>
            <div class="info">
              <h4>John Doe</h4>
              <p>Maketing Manager</p>
            </div>
          </div>
          <div class="single-review">
            <p><i class="fa-solid fa-quote-left fs-4"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,
              dolorum.<i class="fa-solid fa-quote-right fs-4"></i></p>
          </div>
          <div class="review-footer">
            <div class="rating">
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="">★</span>
              <span class="">★</span>
            </div>
            <p>Reviewed on 01/01/2023</p>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <!-- //===== TESTIMONIAL SECTION END =====//  -->











<!-- ===============================================================================================================  -->
<?php
// <-- common lower links -->
require_once("common_content/footer.php");
?>
<!-- ===============================================================================================================  -->




<!-- ===============================================================================================================  -->
<?php
// <-- common lower links -->
require_once("common_content/lower_links.php");
?>
<!-- ===============================================================================================================  -->


 <!-- Swiper Js Code -->
 <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
    });
  </script>
  <!-- Testimonial swiper js code -->
  <script>
    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
  </script>

  

<!-- **** Swiper Js Code for our project section ***** -->
<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 40,
    pagination: {
      el: ".swiper-pagination",
    },
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
</script>

</body>
</html>