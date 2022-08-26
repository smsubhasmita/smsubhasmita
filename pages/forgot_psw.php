<?php
$title="tender";
 $page_name="login.php";
 include_once '../config/settings.php'; 
 include_once '../config/DBConfig.php';
$db=new DBConfig();
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

        /* Base CSS */
.alignleft {
    float: left;
    margin-right: 15px;
}
.alignright {
    float: right;
    margin-left: 15px;
}
.aligncenter {
    display: block;
    margin: 0 auto 15px;
}
a:focus { outline: 0 solid }
img {
    max-width: 100%;
    height: auto;
}
.fix { overflow: hidden }
h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 0 0 15px;
    font-weight: 700;
}
html,
body { height: 100% }

a {
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    color: #333;
}
a:hover { text-decoration: none }



.search-box{margin:80px auto;position:absolute;}
.caption{margin-bottom:50px;}
.loginForm input[type=text], .loginForm input[type=password]{
	margin-bottom:10px;
}
.loginForm input[type=submit]{
	background:#fb044a;
	color:#fff;
	font-weight:700;
	
}


#pswd_info {
	background: #dfdfdf none repeat scroll 0 0;
	color: #fff;
	left: 20px;
	position: absolute;
	top: 115px;
}
#pswd_info h4{
    background: black none repeat scroll 0 0;
    display: block;
    font-size: 14px;
    letter-spacing: 0;
    padding: 17px 0;
    text-align: center;
    text-transform: uppercase;
}
#pswd_info ul {
    list-style: outside none none;
}
#pswd_info ul li {
   padding: 10px 45px;
}



.valid {
	background: rgba(0, 0, 0, 0) url("https://s19.postimg.org/vq43s2wib/valid.png") no-repeat scroll 2px 6px;
	color: green;
	line-height: 21px;
	padding-left: 22px;
}

.invalid {
	background: rgba(0, 0, 0, 0) url("https://s19.postimg.org/olmaj1p8z/invalid.png") no-repeat scroll 2px 6px;
	color: red;
	line-height: 21px;
	padding-left: 22px;
}


#pswd_info::before {
    background: #dfdfdf none repeat scroll 0 0;
    content: "";
    height: 25px;
    left: -13px;
    margin-top: -12.5px;
    position: absolute;
    top: 50%;
    transform: rotate(45deg);
    width: 25px;
}
#pswd_info {
    display:none;
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
                    <li><a href="login.php"  class="text-warning "><b>Login</b></a></li>
                    <!-- <li><a href="#"  class="text-warning"><b>Logout</b></a></li>   -->
                </ul>
            </nav> 
        </div>
    </header> 
    <main id="main">
    <section class="inner-page">
        <div class="container login-container">
            <div class="row">
            <div class="col-md-12 login-form-1 mx-auto">
                    <h2 class="text-center">Create Account</h2> 
                    <form id="creataccount" action="tender_reg_process.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group res-mg-t-15">
                            <label for="type">Name of the Organization</label>
                            <input name="name" type="text" class="form-control name" id="orgname" placeholder="Organization  Name"  >
                        </div> 
                        <div class="form-group res-mg-t-15">
                            <label for="type">Name of the Organization</label>
                            <input name="name" type="text" class="form-control name" id="orgname" placeholder="Organization  Name"  >
                        </div> 
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg ">Registration</button> 
                            <p class="text-center">Have an account? <a href="login.php" class="text-center">Log In</a> </p>    
                        </div>
                        </div>
                                     					 
                    </form>  
                </div>
            </div>
        </div>
    </section>
    <div class="col-md-4">
			<div class="aro-pswd_info">
				<div id="pswd_info">
					<h4>Password must be requirements</h4>
					<ul>
						<li id="letter" class="invalid">At least <strong>one letter</strong></li>
						<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
						<li id="number" class="invalid">At least <strong>one number</strong></li>
						<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
						<li id="space" class="invalid">be<strong> use [~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong></li>
					</ul>
				</div>
			</div>
		</div>
</main>      
<?php include ("../include/footer.php");?> 
<script type="text/javascript">
  
</script>