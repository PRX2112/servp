<!DOCTYPE html>
<?php session_start(); 
include 'conn.php'?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- <link href="css/styles.css" rel="stylesheet" /> -->
    <!-- <title>Home</title> -->
    <script>
      function log(){
        document.getElementById("demo").innerHTML = window.location.href(index.php  );
      }
    </script>
</head>
<body>
    <!-- NAV -->
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <!-- <i class="fas fa-bars ms-1"></i> -->
                <!--</button> -->
    <header class="navbar fixed-top navbar-expand-lg bg-dark text-light d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <label class="navbarbrand "><h3><a class="text-light text-decoration-none mx-2" href="index.php"  >EIR</a> </h3></label>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a  class="nav-link px-2 link-light" href="dashboard.php?type=servx">Dashboard</a></li>
        <li><a  class="nav-link px-2 link-light" href="product.php">Manage-Products</a></li>
        <!-- <li><a  class="nav-link px-2 link-light" href="compalloc.php">Complain-Allocation</a></li> -->
        <li><a class="nav-link px-2 link-light" href="compview.php">Complain-Allocation</a></li>
        <!-- <li><a class="nav-link px-2 link-light" href="#">About</a></li> -->
      </ul>
      
<?php
    if(isset($_SESSION['usernames'])){
       echo" <div class='col-md-3 text-end'>
          Hello! <b>$_SESSION[usernames]</b>
          <button type='button' class='btn btn-outline-primary me-2'><a class='text-decoration-none text-light' href='logout.php'>Logout</a></button></div>";
    }else{
?>
   header('location:index.php');
<style>
    body{display:none;}
</style>
      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary mx-1">Sign-up</button>
      </div>
<?php } ?>
    </header>
    <!-- NAV END -->
</body>
</html>