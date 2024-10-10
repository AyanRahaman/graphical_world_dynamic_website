<?php
session_start();

if (empty($_SESSION['login'])) {
    echo isset($_SESSION['login']);
} else {
    header("location:dashboard.php");
}


// For making connection ot the database
require_once("partials/DBconnect.php");


$empty_email = "";
$empty_password = "";
if(isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (empty($email)) {
        $empty_email = "please fill up this field";
    }
    if (empty($password)) {
        $empty_password = "please fill up this field";
    }


    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $stmt = $connectingDB->query($sql);

        while ($Data = $stmt->fetch()) {
            $id = $Data["id"];
            $email = $Data["email"];
            // $name = $Data["name"];
        }

        if ($stmt->rowCount() > 0) {
            $_SESSION["id"] = $id;
            $_SESSION['email'] = $email;
            // $_SESSION["name"] = $name;

            $_SESSION['login'] = 'login success';
            echo "<script>alert('login succesfully!!');document.location='dashboard.php'</script>";
        } else {
            echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>The emai and passowrd that you have entered is encorrect !!</strong>  Try again.
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
    <style>
        #heading{

        }
    </style>
</head>

<body>
    
<div class="bg-dark text-white p-4 text-center" id="heading">
<h2 class="fw-bold">Graphical World</h2>
</div>


        
<!-- ===== Form creating part start ===== -->
<section>
      <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-12 col-sm-7 col-md-4 m-auto">
          <h3 class="text-center bg-dark text-white p-2">Admin Login</h3>
            <div class="card border-0 shadow">
              <div class="card-body ">
                <form action="" method="post">
                  <!-- <label for="email" class="fw-bold py-2">Email :</label> -->
                  <input type="text" name="email" class="form-control shadow-none py-2" placeholder="Admin Email" />
                  <?php if (isset($_POST["submit"])) {
                                echo "<span class='text-danger'>" . $empty_email . "</span>";
                } ?>
                  <br>
                  <!-- <label for="password" class="fw-bold py-2">password :</label> -->
                  <input type="text" name="password" class="form-control shadow-none py-2" placeholder="Admin Password" />
                  <?php if (isset($_POST["submit"])) {
                                echo "<span class='text-danger'>" . $empty_password . "</span>";
                } ?>
                  <div class="text-center mt-3">
                    <button type="submit" name="submit" class="btn btn-dark">Login</button>
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