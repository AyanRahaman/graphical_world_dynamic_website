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
            <main class="content px-3 py-2 mt-5">
                <div class="container-fluid">
                    
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header bg-white shadow pt-5">
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
                           // for connectiong with the database
                           require_once("partials/DBconnect.php");
                           global $connectingDb;
                           
                                   
                           if(isset($_GET['search_text'])){
                           $search_text =$_GET['search_text'];
                           
                           $sql = "SELECT * FROM client_message WHERE name LIKE '$search_text' OR email LIKE '$search_text' OR phone LIKE '$search_text'";
                           $query = $connectingDB->query($sql);
                                           
                           echo "<h5 class='text-black'>your search result for :-<span class='text-primary'>$search_text</span></h5>";
                           
                           
                           if($query->rowCount() > 0){
                           
                               while($Data = $query->fetch()){
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
