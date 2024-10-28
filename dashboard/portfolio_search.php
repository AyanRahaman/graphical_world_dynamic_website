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



            <!-- ==========// MAIN CONTENT START//========== -->
            <main class="content px-3 py-2 mt-5">
                <div class="container-fluid">
                    
                    <!-- Table Element -->
                    <div class="card border-0">
                        
                        <div class="card-body shadow bg-white">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Delete</th>
                                </thead>
                                <tbody>
                                <?php
                           // for connectiong with the database
                           require_once("partials/DBconnect.php");
                           global $connectingDb;
                           
                                   
                           if(isset($_GET['search_text'])){
                           $search_text =$_GET['search_text'];
                           
                           $sql = "SELECT * FROM portfolio WHERE name LIKE '$search_text'";
                           $query = $connectingDB->query($sql);
                                           
                           echo "<h5 class='text-black'>your search result for :-<span class='text-primary'>$search_text</span></h5>";
                           
                           
                           if($query->rowCount() > 0){
                           
                               while($Data = $query->fetch()){
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
                                        <td><?php echo $name; ?></td>
                                        <td scope="row" class="text-center"><a
                                                    href="portfolio_delete.php?id=<?php echo $id; ?>"><button
                                                        class="btn btn-danger shadow-none">Delete</button></a></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    else{
                                        echo "<h3 class='text-danger text-center fw-bold'>No result found</h3>";
                                     }   
                                     }
                                    ?>
                                </tbody>
                            </table><br>
                    
                     
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
