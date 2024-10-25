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

<style>
<?php
// for landing page image --->
 require_once("dashboard/partials/DBconnect.php");
 $sql = "SELECT * FROM landing_page_image";
 $stmt = $connectingDB->query($sql);
 while ($Data = $stmt->fetch()) {
     $imagge = $Data["image"];
 }
?>
/* for landing page style */
.hero {
  background-image: url("dashboard/images/<?php echo $imagge; ?>");
  background-position: center;
  background-size: cover;
  background-attachment: fixed;
  position: relative;
  z-index: 2;
}
</style>
</head>




<body>

<!-- ===============================================================================================================  -->
<?php
// <-- navbar -->
require_once("common_content/navbar.php");
?>
<!-- ===============================================================================================================  -->








  <!-- //===== LANDING PAGE START =====// -->
  <?php
         $sql = "SELECT * FROM landing_page";
         $stmt = $connectingDB->query($sql);
         while ($Data = $stmt->fetch()) {
             $title = $Data["title"];
             $body = $Data["body"];
             $marquee = $Data["marquee"];
         }
         ?>
  <div class="hero vh-100 d-flex align-items-center" id="home">
      <div class="container">
          <div class="row">
              <div class="col-lg-7 mx-auto text-center">
                  <h1 class="display-4 text-white text-uppercase"><?php echo $title; ?></h1>
                  <p class="text-white my-3"><?php echo $body; ?></p>
                  <a href="contact_us" class="btn me-2 btn-primary p-3 rounded-0">Get Started</a>
                  <a href="portfolio" class="btn btn-outline-light p-3 rounded-0">My Portfolio</a>
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
       <?php echo $marquee; ?>
        <i class="fa-solid fa-star text-warning"></i>
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
              <?php
                 $sql = "SELECT * FROM s_content WHERE id = 1 ";
                 $stmt = $connectingDB->query($sql);
                 while ($Data = $stmt->fetch()) {
                    $image = $Data["image"];
                    $about = $Data["about"];
                    $h1 = $Data["h1"];
                    $h2 = $Data["h2"];
                    $type = $Data["type"];

                 }
              ?>
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-chart-simple fs-2 rounded p-3 bg-warning"></i>
                    <a href="graphics-design-details" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold"><?php echo $type; ?></h4></a>
                    <p><?php echo $about; ?></p>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
            <?php
                        $sql = "SELECT * FROM s_content WHERE id = 2 ";
                        $stmt = $connectingDB->query($sql);
                        while ($Data = $stmt->fetch()) {
                           $image2 = $Data["image"];
                           $about2 = $Data["about"];
                           $h12 = $Data["h1"];
                           $h22 = $Data["h2"];
                           $type2 = $Data["type"];

                        }
               ?>
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-camera-rotate fs-2 rounded p-3 bg-warning"></i>
                    <a href="webdev-details" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold"><?php echo $type2; ?></h4></a>
                    <p><?php echo $about2; ?></p>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
            <?php
                        $sql = "SELECT * FROM s_content WHERE id = 3 ";
                        $stmt = $connectingDB->query($sql);
                        while ($Data = $stmt->fetch()) {
                           $image3 = $Data["image"];
                           $about3 = $Data["about"];
                           $h13 = $Data["h1"];
                           $h23 = $Data["h2"];
                           $type3 = $Data["type"];

                        }
               ?>
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-wand-magic-sparkles fs-2 rounded p-3 bg-warning"></i>
                    <a href="digital-markeeting-details" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold"><?php echo $type3; ?></h4></a>
                    <p><?php echo $about3; ?></p>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
            <?php
                        $sql = "SELECT * FROM s_content WHERE id = 4 ";
                        $stmt = $connectingDB->query($sql);
                        while ($Data = $stmt->fetch()) {
                           $image4 = $Data["image"];
                           $about4 = $Data["about"];
                           $h14 = $Data["h1"];
                           $h24 = $Data["h2"];
                           $type4 = $Data["type"];

                        }
               ?>
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-earth-oceania fs-2 rounded p-3 bg-warning"></i>
                    <a href="wedding-photography-details" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold"><?php echo $type4; ?></h4></a>
                    <p><?php echo $about4; ?></p>
                 </div>
            </div>
        </div>
    </div><br>
<!-- //===== OUR SERVICES SECTION END =====//  -->







  







  <!-- //===== MIDDLE PART START =====// -->
  <?php
         $sql = "SELECT * FROM choose_us";
         $stmt = $connectingDB->query($sql);
         while ($Data = $stmt->fetch()) {
             $small_title = $Data["small_title"];
             $big_title = $Data["big_title"];
             $boddy = $Data["body"];
             $p_completed = $Data["p_completed"];
             $e_workers = $Data["e_workers"];
             $s_customer = $Data["s_customer"];


         }
         ?>
  <div class="second_home bg-white">
    <div class="container">
    <div class="section-title ps-lg-5">
          <h2>About us</h2>
          <p>Why Choose Us</p>
        </div>
      <div class="row featurette">
        <div class="col-md-6 my-5">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded-circle"
            width="500" height="500" src="image/about_us_bg.jpg" alt="home page image" />
          <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> -->
        </div>
        <div class="col-md-6 my-5">
          <span class="badge rounded-pill bg-secondary mt-5 p-2 mb-2"><?php echo $small_title; ?></span>
          <h1 class="featurette-heading text-dark fw-bold" style="font-family: 'Bebas Neue', sans-serif;">
            <span class="text-warning"><?php echo $big_title; ?></span>
          </h1>
          <p class="lead text-muted">
          <?php echo $boddy; ?>
          </p>
          <div class="container">
            <div class="row text-dark">
              <div class="col border-end">
                <h1 class="text-dark"><?php echo $p_completed; ?>+</h1>
                Project Completed
              </div>
              <div class="col border-end">
                <h1 class="text-dark"><?php echo $e_workers; ?>+</h1>
                Expert Worker
              </div>
              <div class="col">
                <h1 class="text-dark"><?php echo $s_customer; ?>%</h1>
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
           <span><a href="portfolio" class="btn btn-danger">Our Portfolio</a></span>
        </div>
 </div>

<div class="swiper mySwiper col-lg-8">
<div class="swiper-wrapper mb-5">
  <?php
      $sql = "SELECT * FROM portfolio ORDER BY id DESC LIMIT 10";
      $stmt = $connectingDB->query($sql);
      while($Data = $stmt->fetch()){
          $image = $Data["image"];
          // $name = $Data["name"];
  ?>
  <div class="swiper-slide bg-white text-center overflow-hidden">
    <img src="dashboard/images/<?php echo $image; ?>" class="w-100 mb-2">
  </div>
  <?php
      }
  ?>
  
</div>
<div class="swiper-pagination"></div>
</div>
  </div>
<!-- Swiper JS -->
</div><br>
    <!-- //===== PROJECT PART END=====// -->






<!-- //===== BOOK AN APPOINTMENT SECTION START =====//  -->
<section class="p-5 text-white text-center shadow border" id="book_appointment">
                                <?php
                                $sql4 = "SELECT * FROM b_an_appointment";
                                $stmt4 = $connectingDB->query($sql4);
                                while($Data4 = $stmt4->fetch()) {
                                  $id = $Data4["id"];
                                  $titttle = $Data4["title"];
                                  $paragraph = $Data4["paragraph"];
                                  $phh = $Data4["ph"];
                                }
                                ?>
    <h1 class="font-monospace fw-bold text-uppercase"><?php echo $titttle; ?></h1>
    <p class="my-4 fw-bold"><?php echo $paragraph; ?></p>
    <a href="tel:7029979185"><button type="button" class="btn btn-warning text-dark border border-dark rounded-0 fw-bold p-3 shadow-none  me-2"><i class="fa fa-phone"></i>
        <?php echo $phh; ?></button></a>
    <a href="contact_us"><button type="button" class="btn btn-outline-warning border rounded-0 fw-bold p-3 shadow-none">Book
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
                                  <?php
                                    // require_once("partials/DBconnect.php");
                                    $sql = "SELECT * FROM feedback WHERE status = 1";

                                    $stmt = $connectingDB->query($sql);
                                    while ($Data = $stmt->fetch()) {
                                        $id = $Data["id"];
                                        $name = $Data["name"];
                                        $date = $Data["date"];
                                        $content = $Data["content"];
                                        $status = $Data["status"];
                                        ?>
        <div class="review-card swiper-slide p-4 shadow border border-dark">
          <div class="header-content">
            <div class="img-area">
              <img alt="customer1" src="image/feedback.png">
            </div>
            <div class="info">
              <h4><?php echo $name; ?></h4>
            <p>Reviewed on <?php echo $date; ?></p>
            </div>
          </div>
          <div class="single-review">
            <p><i class="fa-solid fa-quote-left fs-4"></i> 
                                      <?php echo $content; ?>
            <i class="fa-solid fa-quote-right fs-4"></i></p>
          </div>
          <div class="review-footer">
            <div class="rating">
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
              <span class="active">★</span>
            </div>
          </div>
        </div>
        <?php
                                    }
        ?>
        
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div><br><br>
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