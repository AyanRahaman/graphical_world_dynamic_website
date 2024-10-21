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



            <!-- ==========// MAIN CONTENT START//========== -->
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border border-dark illustration shadow ">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, Admin</h4>
                                                <p class="mb-0">Admin Dashboard, CodzSword</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="image/customer-support.jpg" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                $ 78.00
                                            </h4>
                                            <p class="mb-2">
                                                Total Earnings
                                            </p>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                    +9.0%
                                                </span>
                                                <span class="text-muted">
                                                    Since Last Month
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header bg-white shadow">
                        <form class="d-flex mb-2" action="search.php" method="GET">
                            <input class="form-control rounded-0 shadow-none border border-dark" name="search_text"  placeholder="Search by Name,Email,Phone Number" aria-label="Search">
                            <button class="btn btn-outline-dark rounded-0 border border-dark shadow-none"name="submit" type="submit">Search</button>
                        </form>
                        </div>
                        <div class="card-body shadow bg-white">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         require_once("partials/DBconnect.php");

                                         /*Pagination part start*/
                                  $sqql="SELECT * FROM client_message";
                                  $querry = $connectingDB->query($sqql);
                                  $Data=$querry->rowCount();
                              
                                  $devided_num = ($Data/10)+1;
                              
                                  if(isset($_GET["pageno"])){
                                      $get_pageno = $_GET["pageno"];
                                      $offset = ($get_pageno-1)*10;
                              
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


                                         $sql="SELECT * FROM client_message ORDER BY id DESC LIMIT 10 OFFSET $offset";
                                         $stmt = $connectingDB->query($sql);
                                         while($Data = $stmt->fetch()){
                                             $id = $Data["id"];
                                             $name = $Data["name"];
                                             $email = $Data["email"];
                                             $phone = $Data["phone"];
                                             $message = $Data["message"];
                                             $status = $Data["status"];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <td><a href="status_change.php?id=<?php echo $id; ?>">
                                        <?php
                                                    if($status == 0){
                                                    
                                                    ?>
                                                <button class="btn btn-danger shadow-none">Incomplete</button>
                                                <?php
                                                    }
                                                    else{
                                                    ?>
                                                <button class="btn btn-success shadow-none">Complate</button>
                                                <?php
                                                    }
                                        ?>
                                        <td><a href="delete_query.php?id=<?php echo $id; ?>"><button class="btn btn-danger shadow-none">delete</button></a></td>
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
                            echo "<a class='text-decoration-none' href='dashboard.php?pageno=$get_pageno_dec'>
                        <span class='bg-dark text-white py-2 px-3'><i class='fas fa-arrow-left'></i></span>
                        </a>";
                        }
                        
                        for($x=1; $x<$devided_num; $x++){
                            if($x == $get_pageno){
                                echo "<span class='bg-dark text-white py-2 px-3 m-1'>$x</span>";
                            }
                            else{
                                echo "<span class='bg-dark py-2 px-3 m-1'>
                                <a class='text-decoration-none  text-white' href='dashboard.php?pageno=$x' class='text-white'> $x </a></span>";
                        
                            }
                        }
                        
                        if($get_pageno_inc > $devided_num){
                            echo "<span class='bg-dark text-white py-2 px-3'><i class='fas fa-arrow-right'></i></span>";
                        }
                        else{
                            echo "<a class='text-decoration-none bg-dark text-white  py-2 px-3' href='dashboard.php?pageno=$get_pageno_inc'>
                        <span '><i class='fas fa-arrow-right'></i></span>
                        </a>";
                        }
                        //  ===== pagination End =====
                        ?>
                     
                        </div>
                    </div>
                </div>
            </main>
            <!-- ==========// MAIN CONTENT END //========== -->
           




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
