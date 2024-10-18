<?php


//for calling the redirect fuction
require_once("extra_content/function.php");

if(!empty($_SESSION['login'])){
    //   echo ($_SESSION['login']);
    }
    else{
        Redirect_to("admin_login.php");
    }


session_start();
//for calling the redirect fuction
require_once("extra_content/function.php");
// for making a connection to the database 
require_once("partials/DBconnect.php");


$empty_password = "";
$empty_new_password = "";
$empty_new_confirm_password = "";

if (isset($_POST["submit"])) {
    $Email = $_SESSION["email"];
    $password = $_POST["password"];
    $new_password = $_POST["new_password"];
    $confirm_new_password = $_POST["confirm_new_password"];

    if (empty($password)) {
        $empty_password = "please fill up this field";
    }
    if (empty($new_password)) {
        $empty_new_password = "please fill up this field";
    }
    if (empty($confirm_new_password)) {
        $empty_new_confirm_password = "please fill up this field";
    }


    if (!empty($password) && !empty($new_password) && !empty($confirm_new_password)) {
        $code = "SELECT * FROM admin WHERE email = '$Email' AND password = '$password'";
        $query = $connectingDB->query($code);


        if ($query->rowCount() > 0) {
            if ($new_password == $confirm_new_password) {
                $sql = "UPDATE admin SET password = '$new_password' WHERE email = '$Email'";

                $result = $connectingDB->query($sql);

                if ($result) {
                echo "<script>alert('password change succesfully!');document.location='dashboard.php'</script>";
                } else {
                    echo "<script>alert('Something went wrong');</script>";
                }
            } else {
                echo '
            <div class="alert col-lg-5 alert-warning alert-dismissible fade show" role="alert">
        <strong>password and confirm password did not match !!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            ';
            }
        } else {
            echo '
            <div class="alert col-lg-5 alert-warning alert-dismissible fade show" role="alert">
        <strong>You have entered an wrong current password !!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            ';
        }
    }
}
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Graphical World (Admin Login)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    



        
<!-- ===== Form creating part start ===== -->
<section>
      <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-12 col-sm-7 col-md-4 m-auto">
          <h3 class="text-center bg-dark text-white p-2">Change Password</h3>
            <div class="card border-0 shadow">
              <div class="card-body ">
                <form action="" method="post">
                  <!-- <label for="email" class="fw-bold py-2">Email :</label> -->
                  <input type="password" name="password" class="form-control shadow-none py-2" placeholder="Enter Current Password" />
                  <?php if (isset($_POST["submit"])) {
                                echo "<span class='text-danger'>" . $empty_password . "</span>";
                } ?>
                  <br>
                  <!-- <label for="password" class="fw-bold py-2">password :</label> -->
                  <input type="password" name="new_password" class="form-control shadow-none py-2" placeholder="Enter New Password" />
                  <?php if (isset($_POST["submit"])) {
                                echo "<span class='text-danger'>" . $empty_new_password . "</span>";
                } ?>
                <br>
                  <input type="password" name="confirm_new_password" class="form-control shadow-none py-2" placeholder="Confirm New Password" />
                  <?php if (isset($_POST["submit"])) {
                                echo "<span class='text-danger'>" . $empty_new_confirm_password . "</span>";
                } ?>
                  <div class="text-center mt-3">
                    <button type="submit" name="submit" class="btn btn-dark">Change Password</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- ===== Form creating part end ===== -->
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>