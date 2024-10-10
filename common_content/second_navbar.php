 <?php
require_once("upper_links.php");
 ?>
 <!-- //===== SECOND NAVBAR START =====// -->
 <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top" style="background-color: white">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.html">
        <img src="image/logo.jpg" alt="logo" class="img-fluid mx-auto rounder">
      </a>
      <button class="navbar-toggler shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-success fw-bold" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-bold" href="about_us.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-bold" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-bold" href="portfolio.php">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-bold" href="contact_us.php">Contact us</a>
          </li>
        </ul>
        <span class="navbar-text">
          <button type="button" class="btn btn-warning rounded-pill mx-1">
            <a href="contact_us.html" class="text-decoration-none">Graphical World</a>
          </button>
          <!-- <button type="button" class="btn btn-warning rounded-pill mx-1">
            <a href="" class="text-decoration-none">SignUp</a>
          </button> -->
        </span>
      </div>
    </div>
  </nav>
  <!-- //===== SECOND NAVBAR END =====// -->
<?php
require_once("lower_links.php");
 ?>   