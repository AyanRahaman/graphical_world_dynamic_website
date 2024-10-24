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


 




 <!-- ===== //BOOK AN APPOINTMENT SECTION START// ===== -->
 <div class="col-md-12 col-lg-12 p-4">
                        <div class="p-3 border border-dark bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                           
                            <!-- ===testimonial image body section start===  -->
                            <?php
                                       require_once("partials/DBconnect.php");
                                       
                                       $sql = "SELECT * FROM b_an_appointment";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $titttle = $Data["title"];
                                           $Paragraph = $Data["paragraph"];
                                           $phh = $Data["ph"];
                                       }
                                       ?>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4 class="card-title m-0 fw-bold fst-italic text-success">Book an Appointment</h4>
                                    <!-- ==Button trigger modal== -->
                                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#general-q">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </div>
                                <h6 class="card-subtitle mb-1 fw-bold">Title</h6>
                                <p class="card-text" id="site_title"><?php echo $titttle; ?></p>
                                <h6 class="card-subtitle mb-1 fw-bold">Paragraph</h6>
                                <p class="card-text" id="site_about"><?php echo $Paragraph; ?></p>
                                <h6 class="card-subtitle mb-1 fw-bold">Phone Number</h6>
                                    <p class="card-text"><i class="fa fa-phone"></i>&nbsp;
                                        <span id="pn2">+91 <?php echo $phh; ?></span>
                                    </p>
                            </div>
                            <!-- ===Testimonisal image body section end===  -->
                            <!--===Testimonisal image body Modal start===-->
                            <?php

                              if (isset($_POST["b_an_appointment"])) {
                                
                                  $titttle = $_POST["titttle"];
                                  $paragraph = $_POST["paragraph"];
                                  $phh = $_POST["phh"];

                                 


                                  if(!empty($_POST["titttle"]) && !empty($_POST["paragraph"]) && !empty($_POST["phh"])){

                                    $query3 = "UPDATE b_an_appointment SET title = '$titttle', paragraph = '$paragraph', ph = '$phh'  WHERE id=1";
                              
                                    $result3 = $connectingDB->query($query3);
                              
                                    if($result3){
                                echo "<script>alert('Data succesfully updated!!');document.location='settings.php'</script>";
                                  }
                                  else{
                                    echo "<script>alert('Data not updated!! Something went wrong');document.location='settings.php'</script>";

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
                                <h5 class="modal-title">Book an Appointment</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Title</label>
                                    <input type="text" name="titttle" id="site_title_inp"
                                        class="form-control shadow-none" required value="<?php echo $titttle; ?>"/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Paragraph</label>
                                    <input type="text" name="paragraph" id="site_title_inp"
                                        class="form-control shadow-none" required value="<?php echo $Paragraph; ?>"/>
                                </div>
                                <div class="mb-3">
                                <label class="form-label fw-bold">Phone numbers</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    <input type="text" name="phh" id="ph1_inp" class="form-control shadow-none" value="<?php echo $phh; ?>" required>
                                                </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" name="b_an_appointment" class="btn btn-dark text-white shadow-none">
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
