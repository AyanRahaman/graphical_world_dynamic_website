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
   <body>
      <!-- ===============================================================================================================  -->
      <?php
         // <-- Second navbar -->
         require_once("common_content/second_navbar.php");
         ?><br><br><br><br>
      <!-- ===============================================================================================================  -->
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
      <div class="container">
         <div class="section-title  mb-5">
            <h2>Contact</h2>
            <p>Contact us </p>
         </div>
         <div class="mb-5">
            <iframe
               src="<?php echo $g_map; ?>"
               width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
               referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
      </div>
      <!-- //===== GOOGLE MAP SECTION END =====//  -->
      <!-- =====// FORM AND ADDRESS SECTION START //===== -->
      <div class="container contact">
         <div class="row">
            <div class="col-lg-4" style="margin-top: 100px;">
               <div class="info">
                  <div class="address mb-5">
                     <i class="fa-solid fa-location"></i>
                     <div class="" style="margin-left:70px;">
                        <h4>Location:</h4>
                        <p><?php echo $address; ?></p>
                     </div>
                  </div>
                  <div class="email mb-5">
                     <i class="fa fa-envelope"></i>
                     <div class="" style="margin-left:70px;" >
                        <h4>Email:</h4>
                        <p><?php echo $email; ?></p>
                     </div>
                  </div>
                  <div class="phone mb-5">
                     <i class="fa fa-phone"></i>
                     <div class="" style="margin-left:70px;">
                        <h4>Call:</h4>
                        <p><?php echo $ph1; ?></p>
                        <p><?php echo $ph2; ?></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-8">
               <div class=" p-4">
                  <?php
                     $success = "";
                     $fail = "";
                     if (isset($_POST["submit"])) {
                         $name = $_POST["name"];
                         $email = $_POST["email"];
                         $phone = $_POST["phone"];
                         $message = $_POST["message"];
                     
                     
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
                  <form action="" method="post">
                     <?php
                        if (isset($_POST["submit"])) {
                            echo "<span class='text-primary fw-bold'>" . $success . "</span>";
                        } else {
                            echo "<span class='text-danger'>" . $fail . "</span>";
                        
                        }
                        ?>
                     <h5 class="text-center">Send a Message</h5>
                     <hr style="margin-left: 160px; margin-right: 160px; height: 1.7px;">
                     <div class="row">
                        <div class="mt-3 col-lg-6">
                           <input type="text" name="name" class="form-control shadow-none rounded-0" placeholder="Enter Your Name" required>
                        </div>
                        <div class="mt-3 col-lg-6">
                           <input type="email" name="email" class="form-control shadow-none rounded-0" placeholder="Enter Your Email" required>
                        </div>
                     </div>
                     <div class="mt-3">
                        <input type="text" name="phone" class="form-control shadow-none rounded-0" placeholder="Enter Your Phone Number" required>
                     </div>
                     <div class="mt-3">
                        <textarea class="form-control shadow-none rounded-0" name="message" placeholder="Message" rows="5" style="resize: none;" required></textarea>
                     </div>
                     <button type="submit" name="submit" class="btn btn-dark shadow-none rounded-0 custom-bg mt-3">
                     Send Message
                     </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <br><br>
      <!-- =====// FORM AND ADDDRESS SECTION END //===== -->
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