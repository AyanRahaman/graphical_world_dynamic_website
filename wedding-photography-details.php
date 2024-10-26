<!DOCTYPE html>
<html lang="en">

<head>
<!-- ===============================================================================================================  -->
<?php
// <-- common upper links -->
require_once("common_content/upper_links.php");
?>
<!-- ===============================================================================================================  -->

<title>Graphical World (photography-details)</title>
</head>




<body class="bg-light">

<!-- ===============================================================================================================  -->
<?php

// <-- navbar -->
require_once("common_content/navbar.php");
?>
<!-- ===============================================================================================================  -->









  <!-- ===== BLOG PART START ===== -->
  <div class="container mb-5">
    <div class="row g-5 mt-3">
      <div class="col-md-8">
                                <?php
                                require_once("dashboard/partials/DBconnect.php");
                                $sql = "SELECT * FROM s_content WHERE id = 4";
                                $stmt = $connectingDB->query($sql);
                                while($Data = $stmt->fetch()) {
                                  $image = $Data["image"];
                                  $about = $Data["about"];   
                                  $type = $Data["type"];                       
                                }
                                ?>
        <img src="image/<?php echo $image; ?>" height="200px" width="100%" class="" alt="<?php echo $image ?>" />
        <article class="blog-post shadow p-3 bg-white">
          <h2 class="display-5 link-body-emphasis mb-3 fw-bold text-center">
          <?php echo $type; ?>
          </h2>

          <p>
            <?php echo $about; ?>
          </p><br>
          <hr>
          <div class="bg-white blog_details">
            <h5>OUR SERVICES</h5>
          </div>
          <div class="our_services">
            <div class="row">
              <div class="col-lg-4">
                              <?php
                                $sql2 = "SELECT * FROM s_services WHERE type ='Wedding Photogrpahy'";
                                $stmt2 = $connectingDB->query($sql2);
                                while($Data2 = $stmt2->fetch()) {
                                  $s_s_name = $Data2["s_s_name"];                      
                                
                                ?>
                <i class="fa-solid fa-check-double" style="color: #3440f4"></i>
                <span class="fw-bold"><?php echo $s_s_name; ?></span><br />
              <?php } ?>
              </div>
            </div>
          </div>
          <br><br>
          <div class="bg-white blog_details">
            <h5>Some common projects we have wroked on included</h5>
          </div>
          <ul class="list-unstyled">
                              <?php
                                $sql3= "SELECT * FROM s_s_c_project WHERE type ='Wedding Photogrpahy'";
                                $stmt3 = $connectingDB->query($sql3);
                                while($Data3 = $stmt3->fetch()) {
                                  $ssc_name = $Data3["ssc_name"];                      
                                
                                ?>
            <li>
              <i class="fa-solid fa-diamond text-warning"></i> <?php echo $ssc_name; ?>
            </li>
            <?php } ?>
          </ul>
          <hr>


          


          <nav class="blog-pagination mt-5" aria-label="Pagination">
            <a href="contact_us"><button type="button" class="btn btn-dark rounded-0">
                Got a project? Contact us!
              </button></a>
          </nav>
        </article>
      </div>

      <div class="col-md-4 shadow bg-white">
        <div class="position-sticky mt-5" style="top: 2rem">
          
          <div>
            <h4 class="fst-italic">
              Our Recent project on Weeding Photography
            </h4>
            <ul class="list-unstyled">
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                  href="#">
                  <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                  </svg>
                  <div class="col-lg-8">
                    <h6 class="mb-0">Example blog post title</h6>
                    <small class="text-body-secondary">January 15, 2024</small>
                  </div>
                </a>
              </li>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                  href="#">
                  <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                  </svg>
                  <div class="col-lg-8">
                    <h6 class="mb-0">This is another blog post title</h6>
                    <small class="text-body-secondary">January 14, 2024</small>
                  </div>
                </a>
              </li>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                  href="#">
                  <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                  </svg>
                  <div class="col-lg-8">
                    <h6 class="mb-0">
                      Longer blog post title: This one has multiple lines!
                    </h6>
                    <small class="text-body-secondary">January 13, 2024</small>
                  </div>
                </a>
              </li>
            </ul>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Follow Us</h4>
                                    <?php
                                       $sql5 = "SELECT * FROM  contact_us";
                                       $stmt5 = $connectingDB->query($sql5);
                                       while ($Data5 = $stmt5->fetch()) {
                                           $facebook = $Data5["fb"];
                                           $instagram = $Data5["insta"];
                                           $twitter = $Data5["tw"];
                                           $whatsapp = $Data5["whatp"];

                                       }
                                       ?>
            <ol class="list-unstyled" style="display: flex">
              <li class="m-2 border bg-dark border-black shadow px-3 py-2 rounded-circle">
                <a class="text-decoration-none text-white" href="<?php echo $facebook; ?>"><i class="fab fa-facebook"></i></a>
              </li>
              <li class="m-2 border bg-dark border-black shadow px-3 py-2 rounded-circle">
                <a class="text-decoration-none text-white" href="<?php echo $instagram; ?>"><i class="fab fa-instagram"></i></a>
              </li>
              <li class="m-2 border bg-dark border-black shadow px-3 py-2 rounded-circle">
                <a class="text-decoration-none text-white" href="<?php echo $whatsapp; ?>"><i class="fab fa-whatsapp"></i></a>
              </li>
              <li class="m-2 border bg-dark border-black shadow px-3 py-2 rounded-circle">
                <a class="text-decoration-none text-white" href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ===== BLOG PART END ===== -->




  


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


 

</body>
</html>