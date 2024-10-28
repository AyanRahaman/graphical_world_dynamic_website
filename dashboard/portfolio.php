<?php
session_start();

// Include the redirect function
require_once("extra_content/function.php");

// Check if the user is logged in
if (empty($_SESSION['login'])) {
    Redirect_to("admin_login.php");
}

require_once("partials/DBconnect.php");
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
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

<div class="wrapper">
    <?php require_once("extra_content/sidebar.php"); ?>

    <div class="main">
        <?php require_once("extra_content/navbar.php"); ?>

        <div class="col-md-12 col-lg-12 p-4">
            <div class="p-3 border border-dark bg-white shadow d-flex justify-content-around align-items-center rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4 class="card-title m-0 fw-bold fst-italic text-success">Portfolio</h4>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-s">
                            <i class="fas fa-edit"></i> Add New Portfolio
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="card-header bg-white shadow-sm">
                            <form class="d-flex mb-4 mt-4" action="portfolio_search.php" method="GET">
                                <input class="form-control rounded-0 shadow-none border border-dark p-2" name="search_text"
                                       placeholder="Search by Name" aria-label="Search">
                                <button class="btn btn-dark rounded-0 border border-dark shadow-none" name="submit" type="submit">Search</button>
                            </form>
                        </div>
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
                            // Pagination logic
                            $sqql = "SELECT * FROM portfolio";
                            $querry = $connectingDB->query($sqql);
                            $Data = $querry->rowCount();

                            $devided_num = ceil($Data / 30);
                            $get_pageno = isset($_GET["pageno"]) ? (int)$_GET["pageno"] : 1;
                            $offset = ($get_pageno - 1) * 30;

                            $sql = "SELECT * FROM portfolio ORDER BY id DESC LIMIT 30 OFFSET :offset";
                            $stmt = $connectingDB->prepare($sql);
                            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                            $stmt->execute();

                            while ($Data = $stmt->fetch()) {
                                $id = $Data["id"];
                                $image = $Data["image"];
                                $name = $Data["name"];
                                echo "<tr>
                                        <th scope='row'>$id</th>
                                        <td scope='row'><img src='images/$image' width='150px' height='150px' alt='$image'></td>
                                        <td scope='row'>$name</td>
                                        <td scope='row' class='text-center'><a href='portfolio_delete.php?id=$id'><button class='btn btn-danger shadow-none'>Delete</button></a></td>
                                      </tr>";
                            }
                            ?>
                            </tbody>
                        </table><br>

                        <?php
                        // Pagination links
                        if ($get_pageno > 1) {
                            echo "<a class='text-decoration-none' href='portfolio.php?pageno=" . ($get_pageno - 1) . "'>
                                <span class='bg-dark text-white py-2 px-3'><i class='fas fa-arrow-left'></i></span></a>";
                        } else {
                            echo "<span class='bg-dark text-white py-2 px-3'><i class='fas fa-arrow-left'></i></span>";
                        }

                        for ($x = 1; $x <= $devided_num; $x++) {
                            if ($x == $get_pageno) {
                                echo "<span class='bg-dark text-white py-2 px-3 m-1'>$x</span>";
                            } else {
                                echo "<a class='text-decoration-none text-white bg-dark py-2 px-3 m-1' href='portfolio.php?pageno=$x'>$x</a>";
                            }
                        }

                        if ($get_pageno < $devided_num) {
                            echo "<a class='text-decoration-none bg-dark text-white py-2 px-3' href='portfolio.php?pageno=" . ($get_pageno + 1) . "'>
                                <span><i class='fas fa-arrow-right'></i></span></a>";
                        } else {
                            echo "<span class='bg-dark text-white py-2 px-3'><i class='fas fa-arrow-right'></i></span>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="general-s" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form" action="" method="post" enctype="multipart/form-data">
                            <?php
                            if (isset($_POST["submit"])) {
                                $image = $_FILES["image"]["name"];
                                $tmp_name = $_FILES["image"]["tmp_name"];
                                $name = $_POST["name"];
                                $category = $_POST["category"];

                                if (!empty($image) && !empty($name) && !empty($category)) {
                                    $upload_path = "images/" . basename($image);
                                    $sql = "INSERT INTO portfolio (image, name, category) VALUES (:Ximage, :Xname, :Xcategory)";
                                    $stmt = $connectingDB->prepare($sql);
                                    $stmt->bindValue(':Ximage', $image);
                                    $stmt->bindValue(':Xname', $name);
                                    $stmt->bindValue(':Xcategory', $category);
                                    $result = $stmt->execute();

                                    if ($result && move_uploaded_file($tmp_name, $upload_path)) {
                                        echo "<script>alert('Data successfully inserted!');document.location='portfolio.php'</script>";
                                    } else {
                                        echo "<script>alert('Data not inserted!');document.location='portfolio.php'</script>";
                                    }
                                } else {
                                    echo "<script>alert('Please fill up the full form');</script>";
                                }
                            }
                            ?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Portfolio</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Image (1500x1000px)</label>
                                        <input type="file" name="image" class="form-control shadow-none" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="name" class="form-control shadow-none" placeholder="Portfolio name" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Category</label>
                                        <select class="form-select shadow-none" name="category" required>
                                            <option selected>Choose Category...</option>
                                            <?php
                                            $sql3 = "SELECT * FROM services";
                                            $stmt3 = $connectingDB->query($sql3);
                                            while ($Data3 = $stmt3->fetch()) {
                                                echo "<option value='" . $Data3["s_name"] . "'>" . $Data3["s_name"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="submit" class="btn btn-dark text-white shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once("extra_content/footer.php"); ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>
