<?php
session_start();

//for calling the redirect fuction
require_once("extra_content/function.php");

if(!empty($_SESSION['login'])){
    //   echo ($_SESSION['login']);
    }
    else{
        Redirect_to("admin_login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="">


    <div class="wrapper">
        <!-- -----------------------------------------------------------------------------------------------------------------------------         -->
                <?php
                    // Sidebar-->
                    require_once("extra_content/sidebar.php");
                ?>
        <!-- -----------------------------------------------------------------------------------------------------------------------------         -->

        <div class="main">
            <!-- -----------------------------------------------------------------------------------------------------------------------------         -->
                <?php
                    // Navbar-->
                    require_once("extra_content/navbar.php");
                ?>
            <!-- -----------------------------------------------------------------------------------------------------------------------------         -->




 
            
  <!-- ===== //GENERAL SECTION PART START// ===== -->
  <div class="col-md-12 col-lg-12 p-4">
                        <div class="p-3 border border-dark bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                           
                            <!-- ===general settings section start===  -->
                            <?php
                                       require_once("partials/DBconnect.php");
                                       
                                       $sql = "SELECT * FROM general_settings";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $site_title = $Data["site_title"];
                                           $site_about = $Data["site_about"];
                                           $marquee_heading	= $Data["marquee_heading"];
                                       }
                                       ?>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4 class="card-title m-0 fw-bold fst-italic text-success">General Settings</h4>
                                    <!-- ==Button trigger modal== -->
                                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#general-s">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                </div>
                                <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                                <p class="card-text" id="site_title"><?php echo $site_title; ?></p>
                                <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                                <p class="card-text" id="site_about"><?php echo $site_about; ?></p>
                                <h6 class="card-subtitle mb-1 fw-bold">Marquee Heading</h6>
                                <p class="card-text" id="site_about"><?php echo $marquee_heading; ?></p>
                            </div>
                            <!-- ===general settings section end===  -->
                            <!--===general setting Modal start===-->
                            <?php
                              $empty_title = "";
                              $empty_about = "";
                              $empty_heading = "";
                              if (isset($_POST["general_settings"])) {
                                
                                  $site_title = $_POST["site_title"];
                                  $site_about = $_POST["site_about"];
                                  $marquee_heading = $_POST["marquee_heading"];

                                  if(empty($_POST["site_title"])){
                                    $empty_title = "Please enter this field";
                                  }
                                  if(empty($_POST["site_title"])){
                                      $empty_about = "Please enter this field";
                                  }
                                  if(empty($_POST["marquee_heading"])){
                                    $empty_heading = "Please fill up this field";
                                  }

                                  if(!empty($_POST["site_title"]) && !empty($_POST["site_about"]) && !empty($_POST["marquee_heading"])){

                                    $query2 = "UPDATE general_settings SET site_title = '$site_title', site_about = '$site_about', marquee_heading = '$marquee_heading'  WHERE id=1";
                              
                                    $result2 = $connectingDB->query($query2);
                              
                                    if($result2){
                                echo "<script>alert('Data succesfully updated!!');document.location='settings.php'</script>";
                                  }
                                  else{
                                    echo "<script>alert('Data not updated!! Something went wrong');document.location='settings.php'</script>";

                                  }

                                  }  
                              }
                              ?>
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="general_s_form" action="" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">General Settings</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Site Title</label>
                                    <input type="text" name="site_title" id="site_title_inp"
                                        class="form-control shadow-none" required value="<?php echo $site_title; ?>"/>
                                    <?php if(isset($_POST["general_settings"])){ echo "<span class='text-danger'>".$empty_title."</span>"; } ?>    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Site About</label>
                                    <textarea class="form-control shadow-none" rows="4" name="site_about"
                                        id="site_about_inp" required><?php echo $site_about; ?></textarea>
                                    <?php if(isset($_POST["general_settings"])){ echo "<span class='text-danger'>".$empty_about."</span>"; } ?>    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Marquee Heading</label>
                                    <textarea class="form-control shadow-none" rows="6" name="marquee_heading"
                                        id="marquee_heading_inp" required><?php echo $marquee_heading; ?></textarea>
                                    <?php if(isset($_POST["general_settings"])){ echo "<span class='text-danger'>".$empty_heading."</span>"; } ?>    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" name="general_settings" class="btn btn-dark text-white shadow-none">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ===general section modaL end=== -->
                        </div>
                    </div>
<!-- ===== //GENERAL SECTION PART END// ===== -->    
 




<!-- ===== //CONTACTS DETAILS PART START// ===== -->
                 <!-- ===Contact details Section start=== -->
                 <div class="col-md-12 col-lg-12 p-4">
                        <div class="p-3 bg-white shadow-sm border border-dark d-flex justify-content-around align-items-center rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title m-0 fw-bold fst-italic text-success">Contacts Settings</h4>
                            <?php


                                    //   for connecting to the database -->
                                       require_once("partials/DBconnect.php");
                                       
                                       $sql = "SELECT * FROM contact_us";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $address = $Data["address"];
                                           $heading = $Data["heading"];
                                           $ph1 = $Data["ph1"];
                                           $ph2 = $Data["ph2"];
                                           $email = $Data["email"];
                                           $fb = $Data["fb"];
                                           $insta = $Data["insta"];
                                           $tw = $Data["tw"];
                                           $whatp = $Data["whatp"];
                                           $g_map = $Data["g_map"];
                                       }
                                       ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"><?php echo $address; ?></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Heading Title</h6>
                                    <p class="card-text" id="heading"><?php echo $heading; ?></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text mb-1"><i class="fa fa-phone"></i>&nbsp;
                                    <span id="pn1">+91 <?php echo $ph1; ?></span>
                                    </p>
                                    <p class="card-text"><i class="fa fa-phone"></i>&nbsp;
                                        <span id="pn2">+91 <?php echo $ph2; ?></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Emails</h6>
                                    <p class="card-text mb-1"><i class="fa fa-envelope"></i>&nbsp;
                                    <span id="email1"><?php echo $email; ?></span>
                                    </p>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Socials Links</h6>
                                    <p class="card-text mb-1">
                                        <i class="fa fa-facebook"></i>&nbsp;
                                        <span id="fb"><?php echo $fb; ?></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="fa fa-instagram"></i>&nbsp;
                                        <span id="insta"><?php echo $insta; ?></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="fa fa-twitter"></i>&nbsp;
                                        <span id="tw"><?php echo $tw; ?></span>
                                    </p> 
                                    <p class="card-text mb-1">
                                        <i class="fa fa-whatsapp"></i>&nbsp;
                                        <span id="tw"><?php echo $whatp; ?></span>
                                    </p>  
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                  <iframe id="iframe" class="border p-2 w-100" loading="lazy" src="<?php echo $g_map; ?>"></iframe> 
                                </div>
                            </div>
                        </div>
                </div>
                <!-- === contact details section end=== -->
                <!-- ===Conntacts details modal start=== -->
                <?php
                              if (isset($_POST["contact_us"])) {
                                  $address = $_POST["address"];
                                  $heading = $_POST["heading"];
                                  $ph1 = $_POST["ph1"];
                                  $ph2 = $_POST["ph2"];
                                  $email = $_POST["email"];
                                  $fb = $_POST["fb"];
                                  $insta = $_POST["insta"];
                                  $tw = $_POST["tw"];
                                  $whatp = $_POST["whatp"];
                                  $g_map = $_POST["g_map"];
                              
                                  $query = "UPDATE contact_us SET address = '$address', heading = '$heading',
                                   ph1 = '$ph1', ph2 = '$ph2', email = '$email', fb = '$fb', insta = '$insta',
                                    tw = '$tw', whatp = '$whatp', g_map = '$g_map' WHERE id=1";
                              
                                    $result = $connectingDB->query($query);
                              
                                    if($result){
                                echo "<script>alert('Data succesfully updated!!');document.location='settings.php'</script>";
                                  }
                                  else{
                                    echo "<script>alert('Data not updated!! Something went wrong');document.location='settings.php'</script>";

                                  }
                              }
                              ?>
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form id="contacts_s_form" action="" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Contacts Settings</h5>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid p-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Address</label>
                                                <input type="text" name="address" id="address_inp"
                                                    class="form-control shadow-none" value="<?php echo $address; ?>" required />
                                            </div> 
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Heading Title</label>
                                                <input type="text" name="heading" id="heading_inp"
                                                    class="form-control shadow-none" value="<?php echo $heading; ?>" required />
                                            </div> 
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Phone numbers</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    <input type="text" name="ph1" id="ph1_inp" class="form-control shadow-none" value="<?php echo $ph1; ?>" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    <input type="text" name="ph2" id="ph2_inp" class="form-control shadow-none" value="<?php echo $ph2; ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Email</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                    <input type="email" name="email" id="email1_inp" class="form-control shadow-none" value="<?php echo $email; ?>" required>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Social Links</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                                                    <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" value="<?php echo $fb; ?>" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                                    <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" value="<?php echo $insta; ?>" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                                                    <input type="text" name="tw" id="tw_inp" class="form-control shadow-none" value="<?php echo $tw; ?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-whatsapp"></i></span>
                                                    <input type="text" name="whatp" id="tw_inp" class="form-control shadow-none" value="<?php echo $whatp; ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">iFrame Src</label>
                                               
                                                <textarea name="g_map"
                                                    class="form-control shadow-none" id=""
                                                    rows="7"><?php echo $g_map; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    onclick="contacts_inp(contacts_data)"
                                    class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" name="contact_us" class="btn btn-dark text-white shadow-none">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ===contacts details modal end=== -->
                        </div>
                    </div>
    <!-- ===== //CONTACTS DETAILS PART END// ===== -->
           





  <!-- === //IMAGE SLIDER SECTION START// === -->
  <div class="col-md-12 col-lg-12 p-4">
                        <div class="p-3 border border-dark bg-white shadow-sm justify-content-around align-items-center rounded">   
                    <h4 class="card-title mb-3 mt-3 fw-bold fst-italic text-success">Home Page Image slider</h4><hr>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                                <?php

                                $sql3 = "SELECT * FROM image_slider";
                                $stmt3 = $connectingDB->query($sql3);
                                while($Data3 = $stmt3->fetch()) {
                                  $id = $Data3["id"];
                                  $image = $Data3["image"];
                                
                                ?>
                                <!-- ===image card start=== -->
                                <div class="col-lg-4">
                                  <div class="card h-100">
                                    <img src="images/<?php echo $image; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <a href="image_slider.php?id=<?php echo $id; ?>">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        change image
                                        </button>
                                    </a>
                                    </div>
                                  </div>
                                </div>
                                <!-- ===image card end=== -->

                                
                                <?php
                             }
                              ?>
                              </div>   
                    </div>
                    </div>
<!-- === //IMAGE SLIDER SECTION END// === -->  
 




 <!-- ===== //LANDING PAGE START// ===== -->
 <div class="col-md-12 col-lg-12 p-4">
                        <div class="p-3 border border-dark bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                           
                            <!-- ===testimonial image body section start===  -->
                            <?php
                                       require_once("partials/DBconnect.php");
                                       
                                       $sql = "SELECT * FROM landing_page";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $title = $Data["title"];
                                           $body = $Data["body"];
                                       }
                                       ?>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4 class="card-title m-0 fw-bold fst-italic text-success">Home Image Slider Body</h4>
                                    <!-- ==Button trigger modal== -->
                                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#general-d">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                </div>
                                <h6 class="card-subtitle mb-1 fw-bold">Title</h6>
                                <p class="card-text" id="site_title"><?php echo $title; ?></p>
                                <h6 class="card-subtitle mb-1 fw-bold">Body</h6>
                                <p class="card-text" id="site_about"><?php echo $body; ?></p>
                            </div>
                            <!-- ===Testimonisal image body section end===  -->
                            <!--===Testimonisal image body Modal start===-->
                            <?php
                              $empty_title = "";
                              $empty_body = "";
                              if (isset($_POST["landing_page_submit"])) {
                                
                                  $title = $_POST["title"];
                                  $body = $_POST["body"];

                                  if(empty($_POST["title"])){
                                    $empty_title = "Please enter this field";
                                  }
                                  if(empty($_POST["body"])){
                                      $empty_body = "Please enter this field";
                                  }


                                  if(!empty($_POST["title"]) && !empty($_POST["body"])){

                                    $query2 = "UPDATE landing_page SET title = '$title', body = '$body'  WHERE id=1";
                              
                                    $result2 = $connectingDB->query($query2);
                              
                                    if($result2){
                                echo "<script>alert('Data succesfully updated!!');document.location='settings.php'</script>";
                                  }
                                  else{
                                    echo "<script>alert('Data not updated!! Something went wrong');document.location='settings.php'</script>";

                                  }

                                  }  
                              }
                              ?>
                <div class="modal fade" id="general-d" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="general_s_form" action="" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Testimonial Body</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Title</label>
                                    <input type="text" name="title" id="site_title_inp"
                                        class="form-control shadow-none" required value="<?php echo $title; ?>"/>
                                    <?php if(isset($_POST["landing_page_submit"])){ echo "<span class='text-danger'>".$empty_title."</span>"; } ?>    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Body</label>
                                    <textarea class="form-control shadow-none" rows="4" name="body"
                                        id="site_about_inp" required><?php echo $body; ?></textarea>
                                    <?php if(isset($_POST["landing_page_submit"])){ echo "<span class='text-danger'>".$empty_body."</span>"; } ?>    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" name="landing_page_submit" class="btn btn-dark text-white shadow-none">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ===Testimonial image body modaL end=== -->
                        </div>
                    </div>
    <!-- ===== //LANDING PAGE END// ===== -->




             <!-- -----------------------------------------------------------------------------------------------------------------------------         -->
             <?php
                    // Footer-->
                    require_once("extra_content/footer.php");
                ?>
            <!-- -----------------------------------------------------------------------------------------------------------------------------         -->

            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
