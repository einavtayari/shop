<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Shop Homepage - Start Bootstrap Template</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/shop-homepage.css" rel="stylesheet">

<script src="vendor/jquery/jquery.min.js"></script>

<?php require 'dbcon.php'; ?>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
<div class="logo d-flex">
    <a class="navbar-brand" href="index.php"><img src="images/logo.png" style="width: 70px; height: 50px;" alt="logo"></a>
    <h1 class="display-5 my-2" style="color: white;">COCONUT</h1>
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto">
    <li class="nav-item active">
    <a class="nav-link" href="index.php">Home
        <span class="sr-only">(current)</span>
    </a>
    </li>
   
    <li class="nav-item">
    <a class="nav-link" href="#">Services</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">Contact</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="checkout.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg></a>
    </li>
</ul>
</div>
</div>
</nav>

<!-- Page Content -->
<div class="container my-4">

<div class="row">

<div class="col-lg-3">

<div class="list-group py-4">
    <a class="list-group-item" href="index.php">All Products</a>
    <?php
        //רשימת קטגוריות בצד העמוד
        $categories = mysqli_query($conn, 'SELECT ID, Title FROM categories');


        foreach ($categories as $category) {
    ?>
            <a href="index.php?cat=<?php echo $category['ID']; ?>" class="list-group-item"><?php echo $category['Title']; ?></a>
    <?php
        }
    ?>
</div>

</div>
<!-- /.col-lg-3 -->