 <?php
require_once("upper_links.php");
 ?>
 <!-- //===== SECOND NAVBAR START =====// -->
 <nav class="navbar navbar-expand-lg navbar-dark shadow sticky-top" style="background-color: black">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">
        <img src="image/logo.png" alt="logo" class="img-fluid mx-auto rounder">
      </a>
      <button class="navbar-toggler shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-warning fw-bold" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-bold" href="about_us">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-bold" href="services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-bold" href="portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-bold" href="contact_us">Contact us</a>
          </li>
        </ul>
        <span class="navbar-text">
          <button type="button" class=" border border-warning border-2 shadow-none  mx-1 btn btn-outline-warning">
            <a href="" class="text-decoration-none">Register</a>
          </button>
          <button type="button" class="btn border border-warning border-2 shadow-none  mx-1 btn btn-outline-warning">
            <a href="" class="text-decoration-none">Login</a>
          </button>
        </span>
      </div>
    </div>
  </nav>
  <!-- //===== SECOND NAVBAR END =====// -->
<?php
require_once("lower_links.php");
 ?>   