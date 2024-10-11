<!DOCTYPE html>
<html lang="en">

<head>
   <!-- ===============================================================================================================  -->
   <?php
   // <-- common upper links -->
   require_once("common_content/upper_links.php");
   ?>
   <!-- ===============================================================================================================  -->

   <title>Graphical World (Contact us)</title>
</head>




<body class="bg-light">

   <!-- ===============================================================================================================  -->
   <?php

   // <-- Second navbar -->
   require_once("common_content/second_navbar.php");
   ?>
   <!-- ===============================================================================================================  -->



   <!--//===== MARQUEE HEADING PART START ===== //-->
   <div class="p-2 shadow-sm fst-italic" style="background-color: #198754;">
      <marquee behavior="" direction="">
         <h5 class="text-white p-1">
            <i class="fa-solid fa-star text-warning"></i>
            Walk into the digital market with graphical world
            <i class="fa-solid fa-star text-warning"></i>
            বিয়েতে অ্যালবাম বানান। আপনার সুন্দর মুহূর্তের ছবিগুলো সারা জীবন সাথে রাখুন। অল্প খরচে আমাদের সঙ্গে
            <i class="fa-solid fa-star text-warning"></i>
            <!-- 7029979185 or submit the contact us form or visit our campus. Address: NH-60, Sagar, Bandhersole Bus
          Stop, West
          Bengal 731124 -->
         </h5>
      </marquee>
   </div>
   <!-- //===== MARQUEE HEADING PART END =====//  -->




   <?php
    require_once("dashboard/partials/DBconnect.php");
    $sql = "SELECT * FROM contact_us";
    $stmt = $connectingDB->query($sql);
    while ($Data = $stmt->fetch()) {
        $address = $Data["address"];
        $heading_title = $Data["heading"];
        $ph1 = $Data["ph1"];
        $ph2 = $Data["ph2"];
        $email = $Data["email"];
        $g_map = $Data["g_map"];
    }

    ?>


   <!-- //===== GOOGLE MAP SECTION START =====//  -->
   <div class="mb-5">
      <iframe
         src="<?php echo $g_map; ?>"
         width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
         referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>
   <!-- //===== GOOGLE MAP SECTION END =====//  -->



   <!-- =====// Form and address start //===== -->
   <h2 class="pt-4 text-center fw-bold h-font">Contact us to Book Appointment</h2>
   <p class="text-center"><?php echo $heading_title; ?></p>
   <div class="h-line bg-dark mb-5"></div>


   <div class="container" style="margin-top:85px">
      <div class="row">
         <div class="col-lg-6 col-md-5 px-4 mb-5">
            <div class="bg-white rounded shadow p-4">
                  <div class="text-center">
                  <img src="image/Contact-us.jpg" class="img-fluid" alt=""  width = "350" height = "350">
                  </div>
               <h5>Address</h5>
               <a href="https://goo.gl/maps/oXbNsKT1GijNNqma7" target="_blank"
                  class="d-inline-block text-decoration-none text-dark mb-3">
                  <i class="fas fa-map-marker-alt"></i>
                  <?php echo $address; ?>
               </a>
               <div class="row">
                  <div class="col-lg-4 border-end">
                     <h5 class="mt-4">Call Us</h5>
                     <a href="tel: +917029979185" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="fas fa-phone"></i> +91  <?php echo $ph1; ?></a><br />
                     <a href="tel: +917029979185" class="d-inline-block text-decoration-none text-dark">
                        <i class="fas fa-phone"></i> +91 <?php echo $ph2; ?>
                     </a>
                  </div>
                  <div class="col-lg-6">
                     <h5 class="mt-4">Email</h5>
                     <a href="mailto: ayanrahaman041@gmail.com" class="d-inline-block text-decoration-none text-dark">
                        <i class="fas fa-envelope"></i> <?php echo $email; ?>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-5 px-4">
            <div class="bg-white rounded shadow p-4">
            <?php
                $emt_name = "";
                $emt_email = "";
                $emt_phone = "";
                $emt_message = "";
                $success = "";
                $fail = "";
                if (isset($_POST["submit"])) {
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $message = $_POST["message"];

                    if (empty($_POST["name"])) {
                        $emt_name = "Please fill this input";
                    }
                    if (empty($_POST["email"])) {
                        $emt_email = "Please fill this input";
                    }
                    if (empty($_POST["phone"])) {
                        $emt_phone = "Please fill this input";
                    }
                    if (empty($_POST["message"])) {
                        $emt_message = "Please fill this input";
                    }

                    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["message"])) {
                        $sql = "INSERT INTO client_message (name,email,phone,message,status)
                    VALUES('$name','$email','$phone','$message',0)";

                        $stmt = $connectingDB->prepare($sql);
                        $result = $stmt->execute();

                        if ($result) {

                            $success = "Message succesfully sent.. We will contact With you via Phone number or email within 48 Hours";
                        } else {
                            $fail = "message Does not send!!! something went wrong";
                        }
                    }
                }
                ?>
               <form  action="" method="post">
               <?php
                    if (isset($_POST["submit"])) {
                        echo "<span class='text-primary fw-bold'>" . $success . "</span>";
                    } else {
                        echo "<span class='text-danger'>" . $fail . "</span>";

                    }
                    ?>
                  <h5 class="text-center">Send a Message</h5>
                  <hr style="margin-left: 160px; margin-right: 160px; height: 1.7px" />
                  <div class="mt-3">
                     <label class="form-label" style="font-weight: 500">Name</label>
                     <input type="text" name="name" class="form-control shadow-none" placeholder="Enter Your Name" />
                  </div>
                  <div class="mt-3">
                     <label class="form-label" style="font-weight: 500">Email</label>
                     <input type="email" name="email" class="form-control shadow-none" placeholder="Enter Valid Email Address" />
                  </div>
                  <div class="mt-3">
                     <label class="form-label" style="font-weight: 500">Phone Number</label>
                     <input type="text" name="phone" class="form-control shadow-none" placeholder="Enter Your Phone Number" />
                  </div>
                  <div class="mt-3">
                     <label class="form-label" style="font-weight: 500">Message</label>
                     <textarea class="form-control shadow-none" rows="5" style="resize: none"
                        placeholder="Enter Your Message to Us" name="message"></textarea>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary text-white mt-3 shadow-none">
                     Send
                  </button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <br />
   <br />
   <!-- =====// Form and address end //===== -->





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