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


 




<!-- ===== //WEBSITE DEVELOPMENT DETAILS PART START// ===== -->
<div class="col-md-12 col-lg-12 p-4">
                        <div class="p-3 border border-dark bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                           
                            <!-- ===testimonial image body section start===  -->
                            <?php
                                       require_once("partials/DBconnect.php");
                                       
                                       $sql = "SELECT * FROM s_content WHERE id = 2";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $about = $Data["about"];
                                           $h1 = $Data["h1"];
                                           $h2 = $Data["h2"];
                                       }
                                       ?>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4 class="card-title m-0 fw-bold fst-italic text-success">Website Development</h4>
                                    <!-- ==Button trigger modal== -->
                                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#general-q">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </div>
                                <h6 class="card-subtitle mb-1 fw-bold">About</h6>
                                <p class="card-text" id="site_title"><?php echo $about; ?></p>
                                <h6 class="card-subtitle mb-1 fw-bold">Heading 1</h6>
                                <p class="card-text" id="site_about"><?php echo $h1; ?></p>
                                <h6 class="card-subtitle mb-1 fw-bold">Heading 2</h6>
                                <p class="card-text" id="site_about"><?php echo $h2; ?></p>
                            </div>
                            <!-- ===Testimonisal image body section end===  -->
                            <!--===Testimonisal image body Modal start===-->
                            <?php

                              if (isset($_POST["website_development"])) {
                                
                                  $about = $_POST["about"];
                                  $h1 = $_POST["h1"];
                                  $h2 = $_POST["h2"];

                                 


                                  if(!empty($_POST["about"]) && !empty($_POST["h1"]) && !empty($_POST["h2"])){

                                    $query3 = "UPDATE s_content SET about = '$about', h1 = '$h1', h2 = '$h2'  WHERE id=2";
                              
                                    $result3 = $connectingDB->query($query3);
                              
                                    if($result3){
                                echo "<script>alert('Data succesfully updated!!');document.location='website_development.php'</script>";
                                  }
                                  else{
                                    echo "<script>alert('Data not updated!! Something went wrong');document.location='website_development.php'</script>";

                                  }

                                  }  
                              }
                              ?>
                <div class="modal fade" id="general-q" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="general_s_form" action="" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Website Development</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">About</label>
                                    <textarea class="form-control shadow-none" rows="5" name="about"
                                        id="site_about_inp" required><?php echo $about; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Heading 1</label>
                                    <textarea class="form-control shadow-none" rows="5" name="h1"
                                        id="site_about_inp" required><?php echo $about; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Heading 2</label>
                                    <textarea class="form-control shadow-none" rows="5" name="h2"
                                        id="site_about_inp" required><?php echo $about; ?></textarea>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" name="website_development" class="btn btn-dark text-white shadow-none">
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
    <!-- ===== //WEBSITE_DEVELOPMENT_DETAILS PART END// ===== -->
           








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
