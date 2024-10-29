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
                                        <th scope="col">Date</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("partials/DBconnect.php");
                                    $sql = "SELECT * FROM feedback ORDER BY ID DESC";

                                    $stmt = $connectingDB->query($sql);
                                    while ($Data = $stmt->fetch()) {
                                        $id = $Data["id"];
                                        $name = $Data["name"];
                                        $date = $Data["date"];
                                        $content = $Data["content"];
                                        $status = $Data["status"];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td><?php echo $content; ?></td>
                                            <td><a href="feedback_status_change.php?id=<?php echo $id; ?>">
                                        <?php
                                                    if($status == 0){
                                                    
                                                    ?>
                                                <button class="btn btn-danger shadow-none">Inactive</button>
                                                <?php
                                                    }
                                                    else{
                                                    ?>
                                                <button class="btn btn-success shadow-none">Active</button>
                                                <?php
                                                    }
                                        ?>
                                            <td scope="row" class="text-center"><a
                                                    href="feedback_delete.php?id=<?php echo $id; ?>"><button
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
                                if (isset($_POST["submit"])) {
                                    $name = $_POST["name"];
                                    $date = $_POST["date"];
                                    $content = $_POST["content"];



                                    if (!empty($_POST["name"])  && !empty($_POST["date"]) && !empty($_POST["content"])) {

                                        $sql = "INSERT INTO feedback (name,date,content,status)
                                        VALUES('$name','$date','$content',0)";

                                        global $connectingDB;

                                        $stmt = $connectingDB->prepare($sql);
                                        $stmt->bindValue(':Xname', $name);
                                        $stmt->bindValue(':Xdate', $date);
                                        $stmt->bindValue(':Xcontent', $content);
                                        $result = $stmt->execute();

                                        if ($result) {
                                            echo "<script>alert('Data succesfully inserted!');document.location='feedback.php'</script>";
                                        } else {
                                            echo "<script>alert('Data not inserted!!');document.location='feedback.php'</script>";
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
                                                class="form-control shadow-none" placeholder="Enter Name"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Date</label>
                                            <input type="text" name="date" id="site_title_inp"
                                                class="form-control shadow-none" placeholder="Enter Date"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Content</label>
                                                <textarea name="content" id="" rows="5" class="form-control shadow-none" placeholder="Enter Content"></textarea>
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
