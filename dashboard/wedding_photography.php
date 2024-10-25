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
                                       
                                       $sql = "SELECT * FROM s_content WHERE id = 4";
                                       $stmt = $connectingDB->query($sql);
                                       while ($Data = $stmt->fetch()) {
                                           $about = $Data["about"];
                                           $h1 = $Data["h1"];
                                           $h2 = $Data["h2"];
                                       }
                                       ?>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4 class="card-title m-0 fw-bold fst-italic text-success">Wedding Photography</h4>
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

                              if (isset($_POST["wedding_photography"])) {
                                
                                  $about = $_POST["about"];
                                  $h1 = $_POST["h1"];
                                  $h2 = $_POST["h2"];

                                 


                                  if(!empty($_POST["about"]) && !empty($_POST["h1"]) && !empty($_POST["h2"])){

                                    $query3 = "UPDATE s_content SET about = '$about', h1 = '$h1', h2 = '$h2'  WHERE id=4";
                              
                                    $result3 = $connectingDB->query($query3);
                              
                                    if($result3){
                                echo "<script>alert('Data succesfully updated!!');document.location='wedding_photography.php'</script>";
                                  }
                                  else{
                                    echo "<script>alert('Data not updated!! Something went wrong');document.location='wedding_photography.php'</script>";

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
                                <h5 class="modal-title">Wedding Photography</h5>
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
                                <button type="submit" name="wedding_photography" class="btn btn-dark text-white shadow-none">
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
           




    
<!-- === //WEDDING PHOTOGRAPHY IMAGE START// === -->
<div class="col-md-12 col-lg-12 p-4">
                        <div class="p-3 border border-dark bg-white shadow-sm justify-content-around align-items-center rounded">   
                    <h4 class="card-title mb-3 mt-3 fw-bold fst-italic text-success">Image</h4><hr>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                                <?php
                                require_once("partials/DBconnect.php");
                                $sql3 = "SELECT * FROM s_content WHERE id = 4";
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
                                    <a href=" W_p_image.php?id=<?php echo $id; ?>">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fas fa-edit"></i> change image
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
<!-- === //WEDDING PHOTOGRAPHY IMAGE END// === -->       




<!-- ===== //SERVICES SECTION START// ===== -->
<div class="col-md-12 col-lg-12 p-4">
                <div
                    class="p-3 border border-dark bg-white shadow d-flex justify-content-around align-items-center rounded">

                    <!-- ===general settings section start===  -->

                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title m-0 fw-bold fst-italic text-success">Services (Wedding Photography)</h4>
                            <!-- ==Button trigger modal== -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-s">
                                <i class="fas fa-edit"></i> Add Services
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Services</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // require_once("partials/DBconnect.php");
                                    $sql5 = "SELECT * FROM s_services WHERE type = 'Wedding Photogrpahy' ORDER BY id DESC";

                                    $stmt5 = $connectingDB->query($sql5);
                                    while ($Data5 = $stmt5->fetch()) {
                                        $id = $Data5["id"];
                                        $s_s_name = $Data5["s_s_name"];
                                        $type = $Data5["type"];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td class=""><?php echo $s_s_name; ?></td>
                                            <td><?php echo $type; ?></td>
                                            <td><a
                                                    href="wedding_p__services_delete.php?id=<?php echo $id; ?>"><button
                                                        class="btn btn-danger shadow-none">Delete</button></a></td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ===general settings section end===  -->
                    <!--===general setting Modal start===-->
                    <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="general_s_form" action="" method="post">
                                <?php


                                if (isset($_POST["s_services"])) {

                                    $s_s_name = $_POST["s_s_name"];
                                    $type = $_POST["type"];



                                    if (!empty($_POST["s_s_name"]) && !empty($_POST["type"])) {

                                        $sql6 = "INSERT INTO s_services (s_s_name,type)
                                        VALUES('$s_s_name','$type')";

                                        global $connectingDB;

                                        $stmt6 = $connectingDB->prepare($sql6);
                                        $stmt6->bindValue(':Xs_s_name', $s_s_name);
                                        $stmt6->bindValue(':Xtype', $type);

                                        $result6 = $stmt6->execute();

                                        if ($result6) {
                                            echo "<script>alert('Data succesfully inserted!');document.location='wedding_photography.php'</script>";
                                        } else {
                                            echo "<script>alert('Data not inserted!!');document.location='wedding_photography.php'</script>";
                                        }

                                    } else {
                                        echo "<script>alert('please fill up the full form');</script>";
                                    }
                                }
                                ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Services (Wedding Photography)</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input type="text" name="s_s_name" id="site_title_inp"
                                                class="form-control shadow-none" placeholder="Services Name"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Type</label>
                                            <select class="form-select shadow-none" id="inputGroupSelect01"
                                                name="type" required>
                                
                                                <option value="Wedding Photogrpahy">Wedding Photogrpahy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn text-secondary shadow-none"
                                            data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" name="s_services" class="btn btn-dark text-white shadow-none">
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
<!-- ===== //SERVICES SECTION END// ===== -->






<!-- ===== //PROJECT SECTION START// ===== -->
<div class="col-md-12 col-lg-12 p-4">
                <div
                    class="p-3 border border-dark bg-white shadow d-flex justify-content-around align-items-center rounded">

                    <!-- ===general settings section start===  -->

                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title m-0 fw-bold fst-italic text-success">Project (Wedding Photography)</h4>
                            <!-- ==Button trigger modal== -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-p">
                                <i class="fas fa-edit"></i> Add Services
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Services</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // require_once("partials/DBconnect.php");
                                    $sql7 = "SELECT * FROM s_s_c_project WHERE type = 'Wedding Photogrpahy' ORDER BY id DESC";

                                    $stmt7 = $connectingDB->query($sql7);
                                    while ($Data7 = $stmt7->fetch()) {
                                        $id = $Data7["id"];
                                        $ssc_name = $Data7["ssc_name"];
                                        $type2 = $Data7["type"];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td class=""><?php echo $ssc_name; ?></td>
                                            <td><?php echo $type2; ?></td>
                                            <td><a
                                                    href="wedding_p_project_delete.php?id=<?php echo $id; ?>"><button
                                                        class="btn btn-danger shadow-none">Delete</button></a></td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ===general settings section end===  -->
                    <!--===general setting Modal start===-->
                    <div class="modal fade" id="general-p" data-bs-backdrop="static" data-bs-keyboard="true"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="general_s_form" action="" method="post">
                                <?php


                                if (isset($_POST["s_project"])) {

                                    $ssc_name = $_POST["ssc_name"];
                                    $type2 = $_POST["type2"];



                                    if (!empty($_POST["ssc_name"]) && !empty($_POST["type2"])) {

                                        $sql8 = "INSERT INTO s_s_c_project(ssc_name,type)
                                        VALUES('$ssc_name','$type2')";

                                        global $connectingDB;

                                        $stmt8 = $connectingDB->prepare($sql8);
                                        $stmt8->bindValue(':Xssc_name', $ssc_name);
                                        $stmt8->bindValue(':Xtype', $type2);

                                        $result8 = $stmt8->execute();

                                        if ($result8) {
                                            echo "<script>alert('Data succesfully inserted!');document.location='wedding_photography.php'</script>";
                                        } else {
                                            echo "<script>alert('Data not inserted!!');document.location='wedding_photography.php'</script>";
                                        }

                                    } else {
                                        echo "<script>alert('please fill up the full form');</script>";
                                    }
                                }
                                ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Project (Wedding Photography)</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input type="text" name="ssc_name" id="site_title_inp"
                                                class="form-control shadow-none" placeholder="Services Name"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Type</label>
                                            <select class="form-select shadow-none" id="inputGroupSelect01"
                                                name="type2" required>
                                
                                                <option value="Wedding Photogrpahy">Wedding Photogrpahy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn text-secondary shadow-none"
                                            data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" name="s_project" class="btn btn-dark text-white shadow-none">
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
<!-- ===== //PROJECT SECTION END// ===== -->







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
