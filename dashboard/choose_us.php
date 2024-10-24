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


 




<!-- ===== //CONTACTS DETAILS PART START// ===== -->
                 <!-- ===Contact details Section start=== -->
                 <div class="col-md-12 col-lg-12 p-4">
                        <div class="p-3 bg-white shadow-sm border border-dark d-flex justify-content-around align-items-center rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title m-0 fw-bold fst-italic text-success">Why Choose Us</h4>
                            <?php


                                    //   for connecting to the database -->
                                       require_once("partials/DBconnect.php");
                                       
                                       $sql = "SELECT * FROM choose_us";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $small_title = $Data["small_title"];
                                           $big_title = $Data["big_title"];
                                           $body = $Data["body"];
                                           $p_completed = $Data["p_completed"];
                                           $e_workers = $Data["e_workers"];
                                           $s_customer = $Data["s_customer"];
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
                                    <h6 class="card-subtitle mb-1 fw-bold">Small Title</h6>
                                    <p class="card-text" id="address"><?php echo $small_title; ?></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Big Title</h6>
                                    <p class="card-text" id="heading"><?php echo $big_title; ?></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Body</h6>
                                    <p class="card-text" id="heading"><?php echo $body; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Project Completed</h6>
                                    <p class="card-text" id="address"><?php echo $p_completed; ?>+</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Expert Workers</h6>
                                    <p class="card-text" id="heading"><?php echo $e_workers; ?>+</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Satisfy Customers</h6>
                                    <p class="card-text" id="heading"><?php echo $s_customer; ?>%</p>
                                </div>
                            </div>
                           
                        </div>
                </div>
                <!-- === contact details section end=== -->
                <!-- ===Conntacts details modal start=== -->
                <?php
                              if (isset($_POST["choose_us"])) {
                                  $small_title = $_POST["small_title"];
                                  $big_title = $_POST["big_title"];
                                  $body = $_POST["body"];
                                  $p_completed = $_POST["p_completed"];
                                  $e_workers = $_POST["e_workers"];
                                  $s_customer = $_POST["s_customer"];


                                  $query = "UPDATE choose_us SET small_title = '$small_title', big_title = '$big_title',
                                   body = '$body', p_completed = '$p_completed', e_workers = '$e_workers', s_customer = '$s_customer'WHERE id=1";
                              
                                    $result = $connectingDB->query($query);
                              
                                    if($result){
                                echo "<script>alert('Data succesfully updated!!');document.location='choose_us.php'</script>";
                                  }
                                  else{
                                    echo "<script>alert('Data not updated!! Something went wrong');document.location='choose_us.php'</script>";

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
                                                <label class="form-label fw-bold">Small Title</label>
                                                <input type="text" name="small_title" id="address_inp"
                                                    class="form-control shadow-none" value="<?php echo $small_title; ?>" required />
                                            </div> 
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Big Title</label>
                                                <input type="text" name="big_title" id="heading_inp"
                                                    class="form-control shadow-none" value="<?php echo $big_title; ?>" required />
                                            </div> 
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Body</label>
                                                    <textarea name="body" class="form-control shadow-none" id="" rows="4" required><?php echo $body; ?></textarea>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Project Completed</label>
                                                <input type="text" name="p_completed" id="address_inp"
                                                    class="form-control shadow-none" value="<?php echo $p_completed; ?>" required />
                                            </div> 
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Expert Workers</label>
                                                <input type="text" name="e_workers" id="heading_inp"
                                                    class="form-control shadow-none" value="<?php echo $e_workers; ?>" required />
                                            </div> 
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Satisfy Customer</label>
                                                <input type="text" name="s_customer" class="form-control shadow-none" value="<?php echo $s_customer; ?>" required> 
                                                    
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
                                <button type="submit" name="choose_us" class="btn btn-dark text-white shadow-none">
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
