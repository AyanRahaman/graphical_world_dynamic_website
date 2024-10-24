<?php
session_start();

//for calling the redirect fuction
require_once("extra_content/function.php");

if (!empty($_SESSION['login'])) {
    //   echo ($_SESSION['login']);
} else {
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







            <!-- ===== //PORTFOLIO SECTION START// ===== -->
            <div class="col-md-12 col-lg-12 p-4">
                <div
                    class="p-3 border border-dark bg-white shadow d-flex justify-content-around align-items-center rounded">

                    <!-- ===general settings section start===  -->

                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title m-0 fw-bold fst-italic text-success">Our Team</h4>
                            <!-- ==Button trigger modal== -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-s">
                                <i class="fas fa-edit"></i> Add New Portfolio
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   require_once("partials/DBconnect.php");

                                   /*Pagination part start*/
                            $sqql="SELECT * FROM portfolio";
                            $querry = $connectingDB->query($sqql);
                            $Data=$querry->rowCount();
                        
                            $devided_num = ($Data/30)+1;
                        
                            if(isset($_GET["pageno"])){
                                $get_pageno = $_GET["pageno"];
                                $offset = ($get_pageno-1)*30;
                        
                                $get_pageno_dec = $get_pageno - 1;
                                $get_pageno_inc = $get_pageno + 1;
                            
                            }
                            else{
                                $offset = 0;
                                $get_pageno = 0;
                                $get_pageno_dec = 0;
                                $get_pageno_inc = 2;
                            }
                        /*Pagination part end*/


                                   $sql="SELECT * FROM portfolio ORDER BY id DESC LIMIT 30 OFFSET $offset";
                                   $stmt = $connectingDB->query($sql);
                                   while($Data = $stmt->fetch()){
                                       $id = $Data["id"];
                                       $image = $Data["image"];
                                       $name = $Data["name"];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td scope="row">
                                                <img src="images/<?php echo $image; ?>" width="150px" height="150px"
                                                    alt="<?php echo $image; ?>">
                                            </td>
                                            <td class="text-uppercase"><?php echo $name; ?></td>
                                            <td scope="row" class="text-center"><a
                                                    href="portfolio_delete.php?id=<?php echo $id; ?>"><button
                                                        class="btn btn-danger shadow-none">Delete</button></a></td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table><br>

                            <?php
                    //  ===== pagination start =====
                        if($get_pageno_dec < 1){
                            echo "<span class='bg-dark text-white py-2 px-3'><i class='fas fa-arrow-left'></i></span>";
                        }
                        else{
                            echo "<a class='text-decoration-none' href='portfolio.php?pageno=$get_pageno_dec'>
                        <span class='bg-dark text-white py-2 px-3'><i class='fas fa-arrow-left'></i></span>
                        </a>";
                        }
                        
                        for($x=1; $x<$devided_num; $x++){
                            if($x == $get_pageno){
                                echo "<span class='bg-dark text-white py-2 px-3 m-1'>$x</span>";
                            }
                            else{
                                echo "<span class='bg-dark py-2 px-3 m-1'>
                                <a class='text-decoration-none  text-white' href='portfolio.php?pageno=$x' class='text-white'> $x </a></span>";
                        
                            }
                        }
                        
                        if($get_pageno_inc > $devided_num){
                            echo "<span class='bg-dark text-white py-2 px-3'><i class='fas fa-arrow-right'></i></span>";
                        }
                        else{
                            echo "<a class='text-decoration-none bg-dark text-white  py-2 px-3' href='portfolio.php?pageno=$get_pageno_inc'>
                        <span '><i class='fas fa-arrow-right'></i></span>
                        </a>";
                        }
                        //  ===== pagination End =====
                        ?>
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
                                    $image = $_FILES["image"]["name"];
                                    $tmp_name = $_FILES["image"]["tmp_name"];
                                    move_uploaded_file($tmp_name, "images/" . $image);
                                    $name = $_POST["name"];
                                    $category = $_POST["category"];



                                    if (!empty($_FILES["image"]["name"]) && !empty($_POST["name"]) && !empty($_POST["category"])) {

                                        $sql = "INSERT INTO portfolio (image,name,category)
                                        VALUES('$image','$name','$category')";

                                        global $connectingDB;

                                        $stmt = $connectingDB->prepare($sql);
                                        $stmt->bindValue(':Ximage', $image);
                                        $stmt->bindValue(':Xname', $name);
                                        $stmt->bindValue(':Xcategory', $category);
                                        $result = $stmt->execute();

                                        if ($result) {
                                            move_uploaded_file($tmp_name, $upload);
                                            echo "<script>alert('Data succesfully inserted!');document.location='portfolio.php'</script>";
                                        } else {
                                            echo "<script>alert('Data not inserted!!');document.location='portfolio.php'</script>";
                                        }

                                    } else {
                                        echo "<script>alert('please fill up the full form');</script>";
                                    }
                                }
                                ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Portfolio</h5>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                            <label class="form-label fw-bold">Image (Image size must be in 1500x1000px)</label>
                                            <input type="file" name="image" id="site_title_inp"
                                                class="form-control shadow-none" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input type="text" name="name" id="site_title_inp"
                                                class="form-control shadow-none" placeholder="Portfolio name"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Category</label>
                                            <select class="form-select shadow-none" id="inputGroupSelect01"
                                                name="category" required>
                                                <option selected>Choose Category ...</option>
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
            <!-- ===== //PORTFOLIO SECTION END// ===== -->






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