<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <base href="<?php echo base_url(); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BackEnd</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="template/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="template/admin/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="template/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="template/admin/assets/vendors/jvectormap/jquery-jvectormap.css">
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="template/admin/assets/css/demo/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="template/admin/assets/images/favicon.png" />
</head>
<body>
<script src="template/admin/assets/js/preloader.js"></script>
<header class="header-fixed">
  <link rel="stylesheet" href="assets/style.css">
    <div class="logo">
        <a href="#">nampally</a>
    </div>
    <nav>
    <div class="dropdown">
    <button class="dropbtn">Profile</button>
    <div class="dropdown-content">
        <a href="<?= base_url('profile/view') ?>">View Profile</a>
    </div>
</div>
</nav>
</header>





