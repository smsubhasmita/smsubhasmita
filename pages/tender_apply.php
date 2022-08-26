<?php
$title="tender";
$page_name="login.php";
include_once '../config/access.php'; 
include_once '../config/settings.php'; 
include_once '../config/DBConfig.php';
$db=new DBConfig();
$table_name='tender_mst01';
$login_id=$_SESSION['login_id'];
$result=$db->getdata($table_name,'id',$login_id);
$login_result=$db->getdata($table_name,'id',$login_id);
$localIp = gethostbyname(gethostname());
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
                <li class="text-warning"><a href="#one"  class="text-warning">Instructions</a></li>               
            </ul>
            </nav> 
            <nav class="nav-menu d-none d-lg-block ml-auto">
                <ul> 
                    <!-- <li><a href="#"  class="text-warning "><b>Login</b></a></li> -->
                    <li><a href="#"  class="text-warning"><b>Logout</b></a></li>  
                </ul>
            </nav> 
        </div>
    </header> 
    <main id="main">
    <section class="inner-page">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-12 login-form-1 mx-auto">
                    <h2 class="text-center">Apply</h2> 
                    <form id="creataccount" action="tender_reg_process.php" method="POST" enctype="multipart/form-data">
                         
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 		 
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Name of the Organization</label>
                                    <input name="name" type="text" class="form-control name" id="orgname" placeholder="Organization  Name" value="<?= ($result[0]->org_name)?$result[0]->org_name:'';?>" readonly>
                                </div>
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Phone  Number</label>
                                    <input name="phone" type="text" class="form-control  phone" id="phone" placeholder="999****999" value="<?= ($result[0]->phone)?$result[0]->phone:'';?>" readonly>
                                    <span id="checkphone"></span>
                                </div>
                                <div class="form-group res-mg-t-15">
                                    <label for="type">District</label>
                                    <select name="distict_id"   id="distict_id" class="form-control subject_type">
                                    <option value="">Select distict </option>
                                        <?php  
                                        $subject_results=$db->getalldata('dst_mst01','DSM_DSCD,DSM_DSNM','DSM_CANC=0'); 
                                        foreach($subject_results  as $cdata){ 
                                        ?>
                                    <option value="<?= $cdata->DSM_DSCD ?>" <?= ($result[0]->distric_id ==$cdata->DSM_DSCD)? 'selected':'';?>> <?= $cdata->DSM_DSNM?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15">
                                <label for="type">Gramapachayat</label>
                                    <select class="form-control" id="gp_id" name="gp_id"> 
                                    <option value="" >Select GP</option>
                                        <?php  
                                            $gp_results=$db->getalldata('gp_mst01','GPM_GPCD ,GPM_GPNM','GPM_CANC=0 and GPM_BLCD='.$result[0]->block_id); 
                                            foreach($gp_results  as $gdata){ 
                                        ?>
                                        <option value="<?= $gdata->GPM_GPCD ?>" <?= ($result[0]->gp_id ==$gdata->GPM_GPCD)? 'selected':'';?>> <?= $gdata->GPM_GPNM?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Address</label>
                                    <input name="address" type="text" id="address" class="form-control username" placeholder="Address" value="<?= ($result[0]->address)?$result[0]->address:'';?>" readonly>
                                </div>
                            
                            </div>
                            <!-- -->    
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Registered Office  Number</label>
                                    <input name="reg_num" type="text" class="form-control reg_num" placeholder="User  Name"  value="<?= ($result[0]->reg_number)?$result[0]->reg_number:'';?>" readonly>
                                    <span id="reg_num"></span>
                                </div>
                            
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Email</label>
                                    <input name="email" type="email"id="email" class="form-control username" placeholder="example@gmail.com" value="<?= ($result[0]->email)?$result[0]->email:'';?>" readonly>
                                    <span id="email_id"></span> 
                                </div>
                       
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Block</label>
                                    <select name="block_id"   id="block_id" class="form-control subject_type">
                                    <option value="">Select Block</option>
                                        <?php  
                                        $block_results=$db->getalldata('blk_mst01','BLM_BLCD ,BLM_BLNM','BLM_CANC=0 and BLM_DSCD='.$result[0]->distric_id); 
                                        foreach($block_results  as $bdata){ 
                                        ?>
                                    <option value="<?= $bdata->BLM_BLCD ?>" <?= ($result[0]->block_id ==$bdata->BLM_BLCD)? 'selected':'';?>> <?= $bdata->BLM_BLNM?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15"> 
                                    <label for="type">Village</label>
                                    <select class="form-control" id="vlg_id" name="vlg_id"> 
                                    <option value="">Select Village</option>
                                            <?php  
                                            $vl_results=$db->getalldata('vlg_mst01','VLM_VLCD ,VLM_VLNM','VLM_CANC=0 and VLM_GPCD='.$result[0]->gp_id); 
                                            foreach($vl_results  as $vdata){ 
                                            ?>
                                            <option value="<?= $vdata->VLM_VLCD ?>" <?= ($result[0]->vlg_id ==$vdata->VLM_VLCD)? 'selected':'';?>> <?= $vdata->VLM_VLNM?></option>
                                            <?php } ?>
                                           
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Pin</label>
                                    <input name="pin" type="text" class="form-control username" id="pin" placeholder="Pincode"  value="<?= ($result[0]->pin)?$result[0]->pin:'';?>" readonly>
                                 </div> 
                                 
                            </div>  
                            

                        </div>         					 
                    </form>  
                </div>
            </div>
        </div>
    </section>
    </main>      
<hr>
    <main id="main">
    <section class="inner-page">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-12 login-form-1 mx-auto">
                    <h2 class="text-center">Apply</h2> 
                    <form id="creataccount" action="tender_reg_process.php" method="POST" enctype="multipart/form-data">
                         
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 		 
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Name of the Organization</label>
                                    <input name="name" type="text" class="form-control name" id="orgname" placeholder="Organization  Name" value="<?= ($result[0]->org_name)?$result[0]->org_name:'';?>" readonly>
                                </div>
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Phone  Number</label>
                                    <input name="phone" type="text" class="form-control  phone" id="phone" placeholder="999****999" value="<?= ($result[0]->phone)?$result[0]->phone:'';?>" readonly>
                                    <span id="checkphone"></span>
                                </div>
                                <div class="form-group res-mg-t-15">
                                    <label for="type">District</label>
                                    <select name="distict_id"   id="distict_id" class="form-control subject_type">
                                    <option value="">Select distict </option>
                                        <?php  
                                        $subject_results=$db->getalldata('dst_mst01','DSM_DSCD,DSM_DSNM','DSM_CANC=0'); 
                                        foreach($subject_results  as $cdata){ 
                                        ?>
                                    <option value="<?= $cdata->DSM_DSCD ?>" <?= ($result[0]->distric_id ==$cdata->DSM_DSCD)? 'selected':'';?>> <?= $cdata->DSM_DSNM?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15">
                                <label for="type">Gramapachayat</label>
                                    <select class="form-control" id="gp_id" name="gp_id"> 
                                    <option value="" >Select GP</option>
                                        <?php  
                                            $gp_results=$db->getalldata('gp_mst01','GPM_GPCD ,GPM_GPNM','GPM_CANC=0 and GPM_BLCD='.$result[0]->block_id); 
                                            foreach($gp_results  as $gdata){ 
                                        ?>
                                        <option value="<?= $gdata->GPM_GPCD ?>" <?= ($result[0]->gp_id ==$gdata->GPM_GPCD)? 'selected':'';?>> <?= $gdata->GPM_GPNM?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Address</label>
                                    <input name="address" type="text" id="address" class="form-control username" placeholder="Address" value="<?= ($result[0]->address)?$result[0]->address:'';?>" readonly>
                                </div>
                            
                            </div>
                            <!-- -->    
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Registered Office  Number</label>
                                    <input name="reg_num" type="text" class="form-control reg_num" placeholder="User  Name"  value="<?= ($result[0]->reg_number)?$result[0]->reg_number:'';?>" readonly>
                                    <span id="reg_num"></span>
                                </div>
                            
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Email</label>
                                    <input name="email" type="email"id="email" class="form-control username" placeholder="example@gmail.com" value="<?= ($result[0]->email)?$result[0]->email:'';?>" readonly>
                                    <span id="email_id"></span> 
                                </div>
                       
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Block</label>
                                    <select name="block_id"   id="block_id" class="form-control subject_type">
                                    <option value="">Select Block</option>
                                        <?php  
                                        $block_results=$db->getalldata('blk_mst01','BLM_BLCD ,BLM_BLNM','BLM_CANC=0 and BLM_DSCD='.$result[0]->distric_id); 
                                        foreach($block_results  as $bdata){ 
                                        ?>
                                    <option value="<?= $bdata->BLM_BLCD ?>" <?= ($result[0]->block_id ==$bdata->BLM_BLCD)? 'selected':'';?>> <?= $bdata->BLM_BLNM?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15"> 
                                    <label for="type">Village</label>
                                    <select class="form-control" id="vlg_id" name="vlg_id"> 
                                    <option value="">Select Village</option>
                                            <?php  
                                            $vl_results=$db->getalldata('vlg_mst01','VLM_VLCD ,VLM_VLNM','VLM_CANC=0 and VLM_GPCD='.$result[0]->gp_id); 
                                            foreach($vl_results  as $vdata){ 
                                            ?>
                                            <option value="<?= $vdata->VLM_VLCD ?>" <?= ($result[0]->vlg_id ==$vdata->VLM_VLCD)? 'selected':'';?>> <?= $vdata->VLM_VLNM?></option>
                                            <?php } ?>
                                           
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Pin</label>
                                    <input name="pin" type="text" class="form-control username" id="pin" placeholder="Pincode"  value="<?= ($result[0]->pin)?$result[0]->pin:'';?>" readonly>
                                 </div> 
                                 
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
    $('#creataccount').submit(function(e){
        e.preventDefault();

        var orgname=$('#orgname').val().trim(); 
        if(orgname=="" && orgname.length==0){
            $('#orgname').focus();
            Swal.fire('enter your organization name.','','warning');
			return false; 
        } 

        var regnum=$('.reg_num').val();
        if(regnum=="" && regnum.length==0){ 
            $('.reg_num').focus();  
            Swal.fire('enter your organization  registered number','','warning');
			return false; 
        }else{
            $.ajax({
                type:'POST',
                url:'ajax_process.php',
                cache: false,
                data:{
                    regnumber:regnum,  
                    type:3
                },
                success:function(result){
                console.log(result);
                    if(result == 401){
                      //  alert('registered numbe already exists ! try anathor one.');
                        $("#reg_num").text(" registered numbe already exists ! try anathor one. ");
                        $("#reg_num").css("color", "red"); 
                     
                        $('.reg_num').focus();
                        return false;
                    }
                },
                error:function(jqXHR, reason, ex){
                    console.log(jqXHR);
                }
            });
        } 		

        var  phone=$('#phone').val().trim();
        if(phone=="" && phone.length==0){ 
            $('#phone').focus();    
            Swal.fire('enter your phone number','','warning');
			return false;
        }else if(phone.length < 10 || phone.length > 10){
			//alert('please enter a valid 10 digits phone number');
            $("#checkphone").text(" please enter a valid 10 digits phone number");
            $("#checkphone").css("color", "red");
			$('#phone').focus();
			return false;  
        }else{
            if(phone !=''){
                $.ajax({
                    type:'POST',
                    url:'ajax_process.php',
                    cache: false,
                    data:{
                         phone_num:phone,  
                         type:2
                    },
                    success:function(result){
                    console.log(result);
                        if(result ==401){
                            //alert('phone numbe already exists ! try anathor one.');checkphone
                            $("#checkphone").text(" phone numbe already exists ! try anathor one");
                            $("#checkphone").css("color", "red");
                            $('#phone').focus();
                            return false;
                        }
                    },
                    error:function(jqXHR, reason, ex){
                        console.log(jqXHR);
                    }
                });
            } 		
        }  

        var  email=$('#email').val().trim();
         if(email=="" && email.length==0){ 
            $('#email').focus();    
            Swal.fire('enter your email ','','warning');
			return false; 
            }else{
                if(email !=''){
                    $.ajax({
                        type:'POST',
                        url:'ajax_process.php',
                        cache: false,
                        data:{
                            emil_id:email,  
                            type:1
                        },
                        success:function(result){
                           console.log(result);
                            if(result ==401){
                               // alert('email already exists ! try anathor one.');
                               $("#email_id").text(" email already exists ! try anathor one.");
                               $("#email_id").css("color", "red");
                                $('#email').focus();
                                return false;
                            }
                        },
                        error:function(jqXHR, reason, ex){
                            console.log(jqXHR);
                        }
                    });
                } 		
            }  
       
        var  distict_id=$('#distict_id').val().trim();
        if(distict_id=="" && distict_id.length==0){ 
            $('#distict_id').focus();    
            Swal.fire('select your district name','','warning');
			return false;
        }
        var  block_id=$('#block_id').val().trim();
        if(block_id=="" && block_id.length==0){ 
            $('#block_id').focus();    
            Swal.fire('select your block name','','warning');
			return false;
        }
        var  gp_id=$('#gp_id').val().trim();
        if(gp_id=="" && gp_id.length==0){ 
            $('#gp_id').focus();    
            Swal.fire('enter your  grampachayata ','','warning');
			return false;
        }
        var   vlg_id=$('#vlg_id').val().trim();
        if(vlg_id=="" && vlg_id.length==0){ 
            $('#vlg_id').focus();    
            Swal.fire('enter your  village','','warning');
			return false;
        }
        var   address=$('#address').val().trim();
        if(address=="" && address.length==0){ 
            $('#address').focus();    
            Swal.fire('enter your address details','','warning');
			return false;
        }
        var   pin=$('#pin').val().trim();
        if(pin=="" && pin.length==0){ 
            $('#pin').focus();    
            Swal.fire('enter your pin code','','warning');
			return false;
        } 
        
       
        $('#creataccount').unbind('submit').submit(); 
    });
}); 
 

$("#distict_id").change(function() {
    var distict_id = $(this).children("option:selected").val();
    if (distict_id != '') {
        $.ajax({
            type: 'POST',
            url: 'get_block.php',
            data: {
                districtid:distict_id 
            },
            cache: false,
            success: function(data) {
                //console.log(data);
                $("#block_id").html(data);
            },
            error: function(jqXHR, reason, ex) {
                $('.error').text(reason + "-" + jqXHR.status + " ie " + jqXHR.statusText);
                console.log(jqXHR.responseText);
            }
        });
    }
}); 

$("#block_id").change(function(){
	var  block_id=$(this).children("option:selected").val(); 
	if(block_id !=''){
		$.ajax({
			type:'POST',
			url:'get_gp.php',
			data:{
				block:block_id
			},
			cache:false,
			success:function(data){
				 //console.log(data);
				$("#gp_id").html(data);
			},
			error: function(jqXHR, reason, ex) {
                $('.error').text(reason + "-" + jqXHR.status + " ie " + jqXHR.statusText);
                console.log(jqXHR.responseText);
            }
		});
	}
});
$("#gp_id").change(function(){
	var gp_id=$(this).children("option:selected").val();
    //console.log(gp_id);
	if(gp_id !=''){
		$.ajax({
			type:'POST',
			url:'get_village.php',
			data:{
				gp:gp_id
			},
			cache:false,
			success:function(data){
 				$("#vlg_id").html(data);
			},
			error: function(jqXHR, reason, ex) {
                $('.error').text(reason + "-" + jqXHR.status + " ie " + jqXHR.statusText);
                console.log(jqXHR.responseText);
            }
		});
	}
});
 
</script>