<!DOCTYPE html>
<html lang="en">

<head>
<!-- ===============================================================================================================  -->
<?php
// <-- common upper links -->
require_once("common_content/upper_links.php");
?>
<!-- ===============================================================================================================  -->

<title>Graphical World (Services)</title>
</head>




<body class="bg-light">

<!-- ===============================================================================================================  -->
<?php


// <-- navbar -->
require_once("common_content/navbar.php");
?>
<!-- ===============================================================================================================  -->




  <!-- //===== OUR SERVICES SECTION START =====//  -->

  <div class="container mt-5">
  <div class="section-title ps-lg-5">
          <h2>Services</h2>
          <p>Check our Services</p>
        </div>
  
        <div class="row p-lg-5">
            <div class="col-lg-6 col-md-6 mb-4">
            <?php
                        require_once("dashboard/partials/DBconnect.php");
                        $sql = "SELECT * FROM s_content WHERE id = 1 ";
                        $stmt = $connectingDB->query($sql);
                        while ($Data = $stmt->fetch()) {
                           $image = $Data["image"];
                           $about = $Data["about"];
                           $type = $Data["type"];

                        }
               ?>
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-chart-simple fs-2 rounded p-3 bg-warning"></i>
                    <a href="graphics-design-details" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold"><?php echo $type; ?></h4></a>
                    <p>
                    <?php 
                    $more = "<span class='text-danger'>...Fore more click the Services Details Section</span>";
                    echo mb_strimwidth($about, 0, 200, $more);
                    ?>
                    </p>
                    <a href="graphics-design-details" class="btn btn-outline-dark p-3 rounded-0">Get More Details</a>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
            <?php
                        $sql = "SELECT * FROM s_content WHERE id = 2 ";
                        $stmt = $connectingDB->query($sql);
                        while ($Data = $stmt->fetch()) {
                           $image2 = $Data["image"];
                           $about2 = $Data["about"];
                           $type2 = $Data["type"];

                        }
               ?>
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-camera-rotate fs-2 rounded p-3 bg-warning"></i>
                    <a href="webdev-details" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold"><?php echo $type2; ?></h4></a>
                    <p>
                    <?php 
                    $more = "<span class='text-danger'>...Fore more click the Services Details Section</span>";
                    echo mb_strimwidth($about2, 0, 200, $more);
                    ?>
                    </p>
                    <a href="webdev-details" class="btn btn-outline-dark p-3 rounded-0">Get More Details</a>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
            <?php
                        $sql = "SELECT * FROM s_content WHERE id = 3 ";
                        $stmt = $connectingDB->query($sql);
                        while ($Data = $stmt->fetch()) {
                           $image3 = $Data["image"];
                           $about3 = $Data["about"];
                           $type3 = $Data["type"];

                        }
               ?>
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-wand-magic-sparkles fs-2 rounded p-3 bg-warning"></i>
                    <a href="digital-markeeting-details" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold"><?php echo $type3; ?></h4></a>
                    <p>
                    <?php 
                    $more = "<span class='text-danger'>...Fore more click the Services Details Section</span>";
                    echo mb_strimwidth($about3, 0, 200, $more);
                    ?>
                    </p>
                    <a href="digital-markeeting-details" class="btn btn-outline-dark p-3 rounded-0">Get More Details</a>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
            <?php
                        $sql = "SELECT * FROM s_content WHERE id = 4 ";
                        $stmt = $connectingDB->query($sql);
                        while ($Data = $stmt->fetch()) {
                           $image4 = $Data["image"];
                           $about4 = $Data["about"];
                           $type4 = $Data["type"];

                        }
               ?>
                 <div class="bg-white rounded border border-1 p-5 text-center box pop">
                    <i class="fa-solid fa-earth-oceania fs-2 rounded p-3 bg-warning"></i>
                    <a href="wedding-photography-details" class="text-decoration-none text-outline-danger text-dark"><h4 class="mt-3 fw-bold"><?php echo $type4; ?></h4></a>
                    <p>
                    <?php 
                    $more = "<span class='text-danger'>...Fore more click the Services Details Section</span>";
                    echo mb_strimwidth($about4, 0, 200, $more);
                    ?>
                    </p>
                    <a href="wedding-photography-details" class="btn btn-outline-dark p-3 rounded-0">Get More Details</a>
                 </div>
            </div>
        </div>
    </div>
  <!-- //===== OUR SERVICES SERVICES SECTION END =====//  -->





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