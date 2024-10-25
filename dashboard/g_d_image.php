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
     

           



<!-- ===== CHANGE IMAGE SECTION START ====== -->
<div class="container mt-5 col-lg-4 border border-dark p-3">
    <h5 class="fw-bold text-center text-primary">Graphics Design Service Image</h5><hr>
<form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
  <?php
              //For connecting with the database            
              require_once("partials/DBconnect.php");
              $searchQueryParameter = $_GET["id"];
              global $connectingDB;

               $sql="SELECT * FROM s_content WHERE id='$searchQueryParameter'";

            $stmt=$connectingDB->query($sql);


        while($Data=$stmt->fetch()){
               
            $id = $Data["id"];      
            $image = $Data["image"];
        }
        ?>
    <label>Image Preview</label><br>
    <img src="images/<?php echo $image;?>" height="100" alt="<?php echo $image;?>"><br><br><br>
    <label for="image" class="form-label"><span class="fw-bold">Change Image</span>(image size must be 380x250 px)</label>
    <input type="file" name="image" class="form-control shadow-none" required>
    <input type="hidden" name="old_image" value="<?php echo $image; ?>">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">change image</button>
</form>
</div>     
<?php
                    if(isset($_POST["submit"])){

                    if(($_FILES["image"]["name"]) !=""){

                    $image = $_FILES["image"]["name"];
                    $tmp_name = $_FILES["image"]["tmp_name"];
                    move_uploaded_file($tmp_name,"images/". $image);
                    $old_image = $_POST["old_image"];

                    
                    $sql = "UPDATE s_content SET image = '$image' WHERE id='$searchQueryParameter'";
                    $result=$connectingDB->query($sql);  
                    
                    $path = 'images/'. $old_image;
                    unlink($path);             

                    if($result){
                        echo "<script>alert('Succesfully Updated!!');document.location='graphics_design.php'</script>";
                    }
                    else{
                        echo"
                        <script>
                        alert('record not updated')
                    </script>";
                    }
                }
                    else{
                        $image = $_POST["old_image"];

                        $sql = "UPDATE s_content SET image = '$image' WHERE id='$searchQueryParameter'";
                        $result=$connectingDB->query($sql);  
    
                                   
    
                        if($result){
                            echo "<script>alert('Succesfully Updated!!');document.location='graphics_design.php'</script>";
                        }
                        else{
                            echo"
                            <script>
                            alert('record not updated')
                        </script>";
                        }
                        }
                    }
                  
            ?> 
<!-- ====== CHNAGE IMAGE SECTION END ======= -->        




           




            
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
