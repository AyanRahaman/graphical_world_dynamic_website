
  <!-- // ===== FIRST FOOTER SECTION START =====// -->
  <div class="container-fluid footer text-white" style="border-top: 1px black solid;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 p-4">
        <?php
         require_once("dashboard/partials/DBconnect.php");
         $sql1 = "SELECT * FROM footer";
         $stmt1 = $connectingDB->query($sql1);
         while ($Data1 = $stmt1->fetch()) {
             $f_heading = $Data1["f_heading"];
             $f_body = $Data1["f_body"];
         }
         ?>
          <h3 class="h-font fw-bold fs-3 text-warning text-uppercase"><?php echo $f_heading; ?></h3>
          <p>
           <?php echo $f_body; ?>
          </p>
        </div>
        <div class="col-lg-3 p-4">
          <h5 class="mb-3 fw-bold text-warning">Important Links</h5>
          <a href="about_us" class="d-inline-block mb-2 text-white text-decoration-none">
            <i class="fa-solid fa-angles-right text-warning"></i><span class="fot"> About</span></a><br>
          <a href="wedding-photography-details" class="d-inline-block mb-2 text-white text-decoration-none">
            <i class="fa-solid fa-angles-right text-warning"></i><span class="fot"> Wedding Photography</span></a><br>
          <a href="graphics-design-details" class="d-inline-block mb-2 text-white text-decoration-none">
            <i class="fa-solid fa-angles-right text-warning"></i><span class="fot"> Graphics Design</span></a><br>
          <a href="digital-markeeting-details" class="d-inline-block mb-2 text-white text-decoration-none">
            <i class="fa-solid fa-angles-right text-warning"></i><span class="fot"> Digital Markeeting</span></a><br>
          <a href="webdev-details" class="d-inline-block mb-2 text-white text-decoration-none">
            <i class="fa-solid fa-angles-right text-warning"></i><span class="fot"> Web Design & development</span></a><br>

        </div>
        <div class="col-lg-2 p-4">
          <h5 class="mb-3 fw-bold text-warning">Follow us</h5>
          <a href="#" class="d-inline-block text-white text-decoration-none mb-2"><i class="fab fa-twitter me-1"></i>
            Twitter</a><br>
          <a href="#" class="d-inline-block text-white text-decoration-none mb-2"><i class="fab fa-instagram me-1"></i>
            Instagram</a><br>
          <a href="#" class="d-inline-block text-white text-decoration-none mb-2"><i class="fab fa-facebook me-1"></i>
            Facebook</a><br>
          <a href="#" class="d-inline-block text-white text-decoration-none mb-2"><i class="fab fa-whatsapp me-1"></i>
            Whatsapp</a><br>
          <a href="#" class="d-inline-block text-white text-decoration-none mb-2"><i class="fab fa-linkedin me-1"></i>
            Linkedin</a><br>
        </div>
        <div class="col-lg-3 p-4">
          <?php
          
          $sql2 = "SELECT * FROM contact_us";
          $stmt2 = $connectingDB->query($sql2);
          while ($Data2 = $stmt2->fetch()) {
              $address = $Data2["address"];
              $email = $Data2["email"];
              $ph1 = $Data2["ph1"];
              $ph2 = $Data2["ph2"];

          }
          ?>
          <h4 class="mb-3 fw-bold text-warning">Address</h4>
          <i class="fa-solid fa-location-dot"></i> <?php echo $address; ?>
          <br>
          <i class="fa-solid fa-envelope"></i> <?php echo $email; ?> <br>
          <i class="fa-solid fa-phone"></i> <?php echo $ph1; ?> <br>
          <i class="fa-solid fa-phone"></i> <?php echo $ph2; ?> <br>
        </div>
      </div>
    </div>
  </div>
  <!-- // ===== FIRST FOOTER SECTION END =====// -->

  <!-- // ===== SECOND FOOTER SECTION START =====// -->
  <div class="second-footer m-0" style="background-color: #222222;">
    <div class="container">
        <div class="copyright">
          © Copyright <strong><span>|Graphicalworld.in|</span></strong> All Rights Reserved
        </div>
        <div class="credits">
          Designed and Developed by <a href="" class="text-decoration-none text-warning">Shahidur Rahaman</a>
        </div>
      </div>
</div>
  <!-- // ===== SECOND FOOTER SECTION END =====// -->