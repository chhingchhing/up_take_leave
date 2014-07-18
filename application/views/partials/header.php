<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/up.jpg" type="image/x-icon"/>

    <title><?php echo TITLE; ?></title>
    <?php 
    foreach ($assetsObj->get_css_files() as $css_file) {
      ?>
    <link rel="stylesheet" rev="stylesheet" href="<?php echo $css_file['path'].'?';?>" media="<?php echo $css_file['media'];?>" />
      <?php
    }
    ?>
    
  </head>

  <body>
      