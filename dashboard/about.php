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



           



<!-- ===== //ABOUT US SECTION PART START// ===== -->
            <div class="col-md-12 p-4 col-lg-12">
                        <div class="p-3 border border-dark bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                           
                            <!-- ===About Us Section Start===  -->
                            <?php
                                       require_once("partials/DBconnect.php");
                                       
                                       $sql = "SELECT * FROM about_us";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $title1 = $Data["title1"];
                                           $title2 = $Data["title2"];
                                           $body = $Data["body"];
                                       }
                                       ?>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4 class="card-title m-0 fw-bold fst-italic text-success">About Us</h4>
                                    <!-- ==Button trigger modal== -->
                                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#general-s">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                </div>
                                <h6 class="card-subtitle mb-1 fw-bold">About Us Title - 1</h6>
                                <p class="card-text" id="site_title"><?php echo $title1; ?></p>
                                <h6 class="card-subtitle mb-1 fw-bold">About Us Title - 2</h6>
                                <p class="card-text" id="site_title"><?php echo $title2; ?></p>
                                <h6 class="card-subtitle mb-1 fw-bold">About Us Body</h6>
                                <p class="card-text" id="site_about"><?php echo $body; ?></p>
                            </div>
                            <!-- ===About Us Section End===  -->
                            <!--===About Us Section Modal start===-->
                            <?php
                              $empty_title1 = "";
                              $empty_title2 = "";
                              $empty_body = "";
                              if (isset($_POST["submit"])) {
                                
                                  $title1 = $_POST["title1"];
                                  $title2 = $_POST["title2"];
                                  $body = $_POST["body"];

                                  if(empty($_POST["title1"])){
                                    $empty_title1 = "Please enter this field";
                                  }
                                  if(empty($_POST["title2"])){
                                    $empty_title2 = "Please enter this field";
                                  }
                                  if(empty($_POST["body"])){
                                      $empty_body = "Please enter this field";
                                  }

                                  if(!empty($_POST["title1"]) && !empty($_POST["title2"]) && !empty($_POST["body"])){

                                    $query2 = "UPDATE about_us SET title1 = '$title1', title2 = '$title2', body = '$body' WHERE id=1";
                              
                                    $result2 = $connectingDB->query($query2);
                              
                                    if($result2){
                                echo "<script>alert('Data succesfully updated!!');document.location='about.php'</script>";
                                  }
                                  else{
                                    echo "<script>alert('Data not updated!! Something went wrong');document.location='about.php'</script>";

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
                                <h5 class="modal-title">About Us</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">About Us Title - 1</label>
                                    <input type="text" name="title1" id="site_title_inp"
                                        class="form-control shadow-none" required value="<?php echo $title1; ?>"/>
                                    <?php if(isset($_POST["settings"])){ echo "<span class='text-danger'>".$empty_title1."</span>"; } ?>    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">About Us Title - 2</label>
                                    <input type="text" name="title2" id="site_title_inp"
                                        class="form-control shadow-none" required value="<?php echo $title2; ?>"/>
                                    <?php if(isset($_POST["settings"])){ echo "<span class='text-danger'>".$empty_title2."</span>"; } ?>    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">About Us Body</label>
                                    <textarea class="form-control shadow-none" rows="5" name="body"
                                        id="site_about_inp" required><?php echo $body; ?></textarea>
                                    <?php if(isset($_POST["settings"])){ echo "<span class='text-danger'>".$empty_body."</span>"; } ?>    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" name="submit" class="btn btn-dark text-white shadow-none">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ===About Us Section ModaL End=== -->
                        </div>
                    </div>
<!-- ===== //ABOUT US SECTION END// ===== -->            




           




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
