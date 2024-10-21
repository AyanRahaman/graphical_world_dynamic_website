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
            <!-- ===== //ABOUT GRAPHICAL WORLD SECTION START// ===== -->
            <div class="col-md-12 p-4 col-lg-12">
               <div class="p-3 border border-dark bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                  <?php
                     require_once("partials/DBconnect.php");
                     
                     
                     $searchQueryParameter = $_GET["id"];
                     $sql = "SELECT * FROM about_us WHERE id = '$searchQueryParameter'";
                     $stmt = $connectingDB->query($sql);
                     while ($Data = $stmt->fetch()) {
                         $id = $Data["id"];
                         $title1 = $Data["title1"];
                         $title2 = $Data["title2"];
                         $body = $Data["body"];
                         $image = $Data["image"];
                     }
                     ?>                         
                  <form class="col-lg-12" action="" method="post" enctype="multipart/form-data">
                     <h3 class="text-center fw-bold fst-italic p-2 bg-dark border border-dark text-white">Change image</h3>
                     <div class="mb-3">
                        <label class='fw-bold'>Image Preview</label><br>
                        <img src="images/<?php echo $image;?>" height="250px" width="250px" alt="<?php echo $image;?>">
                        <br><br>
                        <label for="image" class="form-label"><span class="fw-bold">Change Image</span>(image size must be 600x600 px)</label>
                        <input type="file" name="image" class="form-control shadow-none">
                        <input type="hidden" name="old_image" value="<?php echo $image; ?>">
                     </div>
                     <button type="submit" name="submit" class="btn btn-dark rounded-0">Change Image</button>
                     <?php
                        if(isset($_POST["submit"])){
                        
                        if(($_FILES["image"]["name"]) !=""){
                        $title1 = $_POST["title1"];
                        $title2 = $_POST["title2"];
                        $body = $_POST["body"];
                        $image = $_FILES["image"]["name"];
                        $tmp_name = $_FILES["image"]["tmp_name"];
                        move_uploaded_file($tmp_name,"images/". $image);
                        $old_image = $_POST["old_image"];
                        
                        
                        
                        $sql = "UPDATE about_us SET image = '$image'  WHERE id='$searchQueryParameter'";
                        $result=$connectingDB->query($sql);  
                        
                        $path = 'images/'. $old_image;
                        unlink($path);             
                        
                        if($result){
                            echo "<script>alert('Succesfully Updated!!');document.location='about_us.php'</script>";
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
                        
                            $sql = "UPDATE about_us SET  image = '$image'  WHERE id='$searchQueryParameter'";
                            $result=$connectingDB->query($sql);  
                        
                                       
                        
                            if($result){
                                echo "<script>alert('No changes occurred!!');document.location='about_us.php'</script>";
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
                  </form>
               </div>
            </div>
            <!-- ===== //ABOUT GRAPHICAL WORLD SECTION END// ===== -->      
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