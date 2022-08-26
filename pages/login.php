<?php
$title="tender";
 $page_name="login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $title;?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="../assets/css/login.css" rel="stylesheet">
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <a href="index.php/MyController/index" class="logo mr-auto">
                <img src="../assets/img/logonew final-2.gif" alt="" class="img-fluid">
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
                <ul> 
                    
                    <li><a href="tender_reg.php"  class="text-warning"><b>Registation</b></a></li>  
                </ul>
            </nav> 
        </div>
    </header> 
<main id="main">
<section class="inner-page">
    <div class="container login-container">
        <div class="row">
            <div class="col-md-12 login-form-1 mx-auto">
                <h2 class="text-center">Log in</h2>
                 
                <form id="loginid" action="login_process.php" method="POST" enctype="multipart/form-data">
                    <div class="reg-section">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input  name="emailid" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password"  name="pasw" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            <!-- name==>1st 4 letter , phone=last 4 number -->
                        </div>
                        <!-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">  
                                <a href="#forgot_psw.php" class="btn btn-link">   Forgot Your Password? </a>      
                            </div>
                            <div class="col-md-6 text-left"> 
                                <button name="submit" type="submit" class="btn btn-primary btn-lg ">Login</button>   &nbsp&nbsp       
                            </div>
                        </div>
                         <br>
                        <div class="text-center">
                            <P class="text-center"><strong>new user</strong><a href="tender_reg.php" target="_self" class="text-primary btn btn-link">Register</a></li>
                        </div>
                    </div> 
                </form>  
            </div>
        </div>
    </div>    
</section>
</main>      
<?php include ("../include/footer.php");?>
<script type="text/javascript">
$(document).ready(function(){
    $('#loginid').submit(function(e){
        e.preventDefault();
        var exampleInputEmail1=$('#exampleInputEmail1').val().trim();
    
        if(exampleInputEmail1=="" && exampleInputEmail1.length==0){
            $('#exampleInputEmail1').focus();
            Swal.fire('enter your  email.','','warning');
			return false; 
        } 
        var  Password1=$('#exampleInputPassword1').val().trim();
         if(Password1=="" && Password1.length==0){ 
            $('#exampleInputPassword1').focus(); 
             
            Swal.fire('enter your password','','warning');
			return false; 
        }
    $('#loginid').unbind('submit').submit(); 
    });
}); 
</script>