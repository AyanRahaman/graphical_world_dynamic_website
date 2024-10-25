<!DOCTYPE html>
<html lang="en">

<head>
<!-- ===============================================================================================================  -->
<?php
// <-- common upper links -->
require_once("common_content/upper_links.php");
?>
<!-- ===============================================================================================================  -->

<title>Graphical World (About us)</title>
</head>




<body>

<!-- ===============================================================================================================  -->
<?php


// <-- navbar -->
require_once("common_content/navbar.php");
?>
<!-- ===============================================================================================================  -->





 <!--//===== ABOUT US SECTION START===== //-->
 <section class="bg-white"><br>
 <h2 class="pt-4 text-center fw-bold h-font">About Us</h2>
 <div class="h-line bg-dark mb-5"></div>


 <div class="container">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
  <?php
         require_once("dashboard/partials/DBconnect.php");
                                      
                                       
                                       $sql = "SELECT * FROM about_us";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $title1 = $Data["title1"];
                                           $title2 = $Data["title2"];
                                           $body = $Data["body"];
                                           $image2 = $Data["image"];
                                       }
                                       ?>
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="dashboard/images/<?php echo $image2; ?>" class="d-block mx-lg-auto img-fluid rounded" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 text-uppercase fw-bold lh-1 mb-3"><?php echo $title1; ?> - <span class="text-warning"><?php echo $title2; ?></span></h1>
      <p class="lead"><?php echo $body; ?></p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="contact_us.php"><button type="button" class="shadow-none btn btn-primary btn-lg rounded-0 px-4 me-md-2" fdprocessedid="91iimw">Contact Us &nbsp;</button></a>
        <a href="services.php"><button type="button" class="shadow-none btn btn-outline-secondary rounded-0 btn-lg px-4" fdprocessedid="60ek9h">Our Services</button></a>
      </div>
    </div>
  </div>
</div>
</section>
  <!--//===== ABOUT SECTION END===== //-->








<!-- //===== OUR TEAM SECTION START =====//  -->
<h2 class="mt-5 pt-4 text-center fw-bold h-font">Our Team</h2>
  <div class="h-line bg-dark mb-5"></div>


  <div class="container mb-5">
    <div class="row g-5">
                                  <?php
                                       require_once("dashboard/partials/DBconnect.php");
                                       
                                       $sql = "SELECT * FROM  team";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $name = $Data["name"];
                                           $image = $Data["image"];
                                           $designation	= $Data["Designation"];
                                           $facebook = $Data["facebook"];
                                           $instagram	= $Data["instagram"];
                                           $twitter	= $Data["twitter"];
                                       
                                       ?>
      <div class="col-12 col-lg-3">
        <div class="card shadow border-0 rounded text-center pop-about">
          <img src="dashboard/images/<?php echo $image; ?>" class="card-img-top" alt="" height="250">
          <div class="card-body">
          <h5 class="card-title fw-bold text-center text-uppercase"><?php echo $name; ?></h5>
          <p><?php 
          if($designation == "Graphics Design"){
            echo "Graphics Designer";
          }
          elseif($designation == "Photography"){
            echo "Photographer";
          }
          elseif($designation == "Web Design & Development"){
            echo "Developer";
          }
          else{
            echo "Digital Marketer";
          }
          ?></p><hr>
            <p class="card-text text-center"><small class="text-muted">
              <a href="<?php echo $twitter; ?>" target="_blank" class="text-decoration-none text-dark fs-5 pe-4">
                <i class="fab fa-twitter me-1 border border-dark border-2 p-2 rounded"></i>
              </a>
              <a href="<?php echo $instagram; ?>" target="_blank" class="text-decoration-none text-dark fs-5 pe-4">
                <i class="fab fa-instagram me-1 border border-dark border-2 p-2 rounded"></i>
              </a>
              <a href="<?php echo $facebook; ?>" target="_blank" class="text-decoration-none text-dark fs-5 pe-4">
                <i class="fab fa-facebook me-1 border border-dark border-2 p-2 rounded"></i>
              </a>
            </small></p>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
      </div>
      
     
    </div>
  </div><br>
<!-- //===== OUR TEAM SECTION END =====//  -->












  


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