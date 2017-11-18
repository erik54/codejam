<!DOCTYPE html>
<html lang="en">
<!-- HAYO MAU NGAPAIN NGINTIP-NGINTIP ?? ^^, -->
<!-- BELAJAR YANG RAJIN YA !! -->
<!-- #MayTheCodeBuiltinYou -->
<!-- __  __  __  _          ___
    |  \|__ |__ /_\ |  | |   |
  © |__/|__ |  /   \|__| |__ |
 -->
<!-- <> with ❤ by Default -->
<!-- ga usah bilang-bilang abis liat ini ^^, -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/mykaramel.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/mykaramel.css')?>" rel="stylesheet">

    <?php
      if(isset($nav_active) && $nav_active == "beranda"){
        echo "<link href='".base_url('assets/css/mykaramelx.css')."' rel='stylesheet'>";
      }
      if (((isset($siswa) && $siswa == false) || (isset($news) && $news == false)) && $nav_active != 'beranda') {
        echo "<script src='".base_url('assets/js/typed.js')."'></script>\n\t";
        echo "<script src='".base_url('assets/js/demos.js')."'></script>\n\t";
        echo "<script src='".base_url('assets/js/defaults.js')."'></script>\n";
      }
    ?>
    <link href="<?php echo base_url('assets/css/karamel.css')."?v=".date("Ymd") ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/datatables.min.css')?>" rel="stylesheet">

    <!-- Datatable Script -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/choosen.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/datatables.min.js')?>"></script>
   	<style type="text/css">
        .active_nav{
            background: #dc3545;
            color: white !important;
        }
    </style>
</head>