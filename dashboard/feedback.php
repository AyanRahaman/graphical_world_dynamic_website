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
