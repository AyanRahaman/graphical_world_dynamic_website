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
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
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







   <!-- ===== //FEEDBACK SECTION START// ===== -->
   <div class="col-md-12 col-lg-12 p-4">
                <div
                    class="p-3 border border-dark bg-white shadow d-flex justify-content-around align-items-center rounded">

                    <!-- ===general settings section start===  -->

                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title m-0 fw-bold fst-italic text-success">Feedback</h4>
                            <!-- ==Button trigger modal== -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-s">
                                <i class="fas fa-edit"></i> Add New Feedback
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Facebook</th>
                                        <th scope="col">Instagram</th>
                                        <th scope="col">Twittter</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("partials/DBconnect.php");
                                    $sql = "SELECT * FROM team";

                                    $stmt = $connectingDB->query($sql);
                                    while ($Data = $stmt->fetch()) {
                                        $id = $Data["id"];
                                        $name = $Data["name"];
                                        $image = $Data["image"];
                                        $designation = $Data["Designation"];
                                        $facebook = $Data["facebook"];
                                        $instagram = $Data["instagram"];
                                        $twitter = $Data["twitter"];

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td class="text-uppercase"><?php echo $name; ?></td>
                                            <td scope="row">
                                                <img src="images/<?php echo $image; ?>" width="150px" height="150px"
                                                    alt="<?php echo $image; ?>">
                                            </td>
                                            <td><?php echo $designation; ?></td>
                                            <td><?php echo $facebook; ?></td>
                                            <td><?php echo $instagram; ?></td>
                                            <td><?php echo $twitter; ?></td>
                                            <td scope="row" class="text-center"><a
                                                    href="team_member_delete.php?id=<?php echo $id; ?>"><button
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
                            <form id="general_s_form" action="" method="post" enctype="multipart/form-data">
                                <?php
                                if (isset($_POST["submit"])) {
                                    $name = $_POST["name"];
                                    $image = $_FILES["image"]["name"];
                                    $tmp_name = $_FILES["image"]["tmp_name"];
                                    move_uploaded_file($tmp_name, "images/" . $image);
                                    $designation = $_POST["designation"];
                                    $facebook = $_POST["facebook"];
                                    $instagram = $_POST["instagram"];
                                    $twitter = $_POST["twitter"];



                                    if (!empty($_POST["name"]) && !empty($_FILES["image"]["name"]) && !empty($_POST["designation"]) && !empty($_POST["facebook"]) && !empty($_POST["instagram"]) && !empty($_POST["twitter"])) {

                                        $sql = "INSERT INTO team (name,image,designation,facebook,instagram,twitter)
                                        VALUES('$name','$image','$designation','$facebook','$instagram','$twitter')";

                                        global $connectingDB;

                                        $stmt = $connectingDB->prepare($sql);
                                        $stmt->bindValue(':Xname', $name);
                                        $stmt->bindValue(':Ximage', $image);
                                        $stmt->bindValue(':Xdesignation', $designation);
                                        $stmt->bindValue(':Xfacebook', $facebook);
                                        $stmt->bindValue(':Xinstagram', $instagram);
                                        $stmt->bindValue(':Xtwitter', $twitter);
                                        $result = $stmt->execute();

                                        if ($result) {
                                            move_uploaded_file($tmp_name, $upload);
                                            echo "<script>alert('Data succesfully inserted!');document.location='about_us.php'</script>";
                                        } else {
                                            echo "<script>alert('Data not inserted!!');document.location='about_us.php'</script>";
                                        }

                                    } else {
                                        echo "<script>alert('please fill up the full form');</script>";
                                    }
                                }
                                ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Feedback</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input type="text" name="name" id="site_title_inp"
                                                class="form-control shadow-none" placeholder="Team member name"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Image (Image size must be in 600x600px)</label>
                                            <input type="file" name="image" id="site_title_inp"
                                                class="form-control shadow-none" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Designation</label>
                                            <select class="form-select shadow-none" id="inputGroupSelect01"
                                                name="designation" required>
                                                <option selected>Choose Designation ...</option>
                                                <?php
                                                    $sql3 = "SELECT * FROM services";
                                                    $stmt3 = $connectingDB->query($sql3);
                                                    while($Data3 = $stmt3->fetch()){
                                                        $s_name = $Data3["s_name"];
                                                    
                                                    ?>
                                                <option value="<?php echo $s_name; ?>"><?php echo $s_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Facebook Links</label>
                                            <input type="text" name="facebook" id="site_title_inp"
                                                class="form-control shadow-none" placeholder="Facebook Link" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Instagram Links</label>
                                            <input type="text" name="instagram" id="site_title_inp"
                                                class="form-control shadow-none" placeholder="Instagram Link"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Twitter Links</label>
                                            <input type="text" name="twitter" id="site_title_inp"
                                                class="form-control shadow-none" placeholder="Twitter Link" required />
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn text-secondary shadow-none"
                                            data-bs-dismiss="modal">
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
                    <!-- ===general section modaL end=== -->
                </div>
            </div>
            <!-- ===== //FEEDBACK SECTION END// ===== -->            

 






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
