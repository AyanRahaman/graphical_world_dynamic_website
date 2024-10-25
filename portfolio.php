<!DOCTYPE html>
<html lang="en">

<head>
<!-- ===============================================================================================================  -->
<?php
// <-- common upper links -->
require_once("common_content/upper_links.php");
?>
<!-- ===============================================================================================================  -->

<title>Graphical World (Portfolio)</title>
</head>




<body class="bg-light">

<!-- ===============================================================================================================  -->
<?php


// <-- navbar -->
require_once("common_content/navbar.php");
?>
<!-- ===============================================================================================================  -->




 <!-- //===== PORTFOLIO PART START =====// -->
 <h2 class="mt-5 pt-4 text-center fw-bold h-font">Our Portfolio</h2>
    <div class="h-line bg-dark mb-5"></div>

    <section id="team" class="team mb-5">
        <div class="container">
            <div class="row">

            <?php
        require_once("<dashboard/partials/DBconnect.php");

        /*****Pagination part start*****/
        $sql1="SELECT * FROM portfolio";
        $query = $connectingDB->query($sql1);
        $Data=$query->rowCount();
        
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
        /*****Pagination part end*****/


        $sql = "SELECT * FROM portfolio ORDER BY id DESC LIMIT 30 OFFSET $offset";
        $stmt = $connectingDB->query($sql);
        while($Data = $stmt->fetch()){
            $image = $Data["image"];
            $name = $Data["name"];
        ?>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member aos-init aos-animate" data-aos="fade-up">
                        <div class="member-img">
                            <img src="dashboard/images/<?php echo $image; ?>" class="img-fluid" alt="<?php echo $image; ?>">
                            <div class="social">
                                <h4  class="fw-bold text-start ms-3 text-decoration-underline text-white" style="margin-top: 200px;"><?php echo $name; ?></h4>
                                <p class="text-start ms-3 text-white">Graphical World</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
        }
        ?>



            </div>
        </div> 
        
        
         <!--*****pagination start*****-->
  <div style="text-align:center; margin-top:20px;">
  <?php
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
               ?>
    </div>
            <!--*****pagination End*****-->

    </section>


    
    <!-- //===== PORTFOLIO PART END =====// -->



    
    


  


<!-- ===============================================================================================================  -->
<?php
// <-- common lower links -->
require_once("common_content/footer.php");
?>
<!-- ===============================================================================================================  -->




<!-- ===============================================================================================================  -->
<?php
// <-- common lower links -->
require_once("common_content/lower_links.php");
?>
<!-- ===============================================================================================================  -->


 

</body>
</html>