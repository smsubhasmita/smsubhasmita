<?php
$title="tender";
 $page_name="login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>OBOCWWB-<?= $title;?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="../assets/img/clogo.png" rel="shortcut icon">
    <link href="../assets/img/odisha-logo.png" rel="shortcut icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
    <!-- Sweet alert Plugin -->
    <link href="../assets/sweet-alert/sweetalert.css" rel="stylesheet" />
    <script src="../assets/sweet-alert/sweetalert.min.js"></script>
    <script src="../assets/sweet-alert/sweet-alert.js"></script>
    <script src="../assets/js/aadhaarValidator.js"></script>
    <link href="../assets/css/index.css" rel="stylesheet">
    <style type="text/css">
        .blink_me {
            animation: blinker 1s linear infinite;
        }
        @keyframes blinker {
          50% {
            opacity: 0;
          }
        }
    </style>
</head>
<body>
  <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <a href="index.php/MyController/index" class="logo mr-auto">
                <img src="../assets/img/obocwwb_logo.png" alt="" class="img-fluid">
            </a> 
            <a href="#" class="logo1 ">
                <img src="../assets/img/cm_pic.jpg" alt="" class="img-fluid"><br>
                <img src="../assets/img/cm_name_designation.png" alt="" class="img-fluid cm_name_designation">
            </a> 
        </div>
        <div class="container d-flex align-items-center">
            <nav class="nav-menu d-none d-lg-block mr-auto">
            <ul>    
                <li class="active"><a href="index2.php"><i class="fa fa-home" style="font-size: 20px;"></i> Home</a></li>
                <li class="text-warning"><a href="#one"  class="text-warning">Instructions</a></li>                    
            </ul>
            </nav> 
            <nav class="nav-menu d-none d-lg-block ml-auto">
                <!-- <ul> 
                    <li><a href="#"  class="text-warning "><b>Login</b></a></li>
                    <li><a href="#"  class="text-warning"><b>Logout</b></a></li>  
                </ul> -->
            </nav> 
        </div>
    </header>
    <main id="main">
        <section class="inner-page">
            <?php include("login.php"); ?>
        </section>
    </main>     
    <?php
        $msg = $this->session->flashdata('msg'); 
        $error = $this->session->flashdata('error'); 
        if(isset($error)){
            echo "<script> swal('Error!', '". $error."', 'error');</script>";
        }
        if(isset($msg)){ 
        echo "<script> swal('Success!', '".$msg."', 'success');</script>";
        }
    ?>
    <!-- ======= Footer ======= -->
    <?php include ("../includefooter.php");?>