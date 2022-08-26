<main id="main">
    <section class="inner-page">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-12 login-form-1 mx-auto">
                    <h2 class="text-center">Create Account</h2> 
                    <form id="creataccount" action=" " method="POST" enctype="">
                        <div class="reg-section">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 		
                                <div class="form-group">
                                    <label for="name">Name of Organization</label>
                                    <input name="name" type="text" class="form-control name" id="orgname" placeholder="Organization name" value="">
                                </div> 
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 		 
                            <div class="form-group res-mg-t-15">
                                <label for="type">registered office  number</label>
                                <input name="reg_num" type="text" class="form-control reg_num" id="regnumber" placeholder="User  Name" value="" >
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">phone  number</label>
                                <input name="phone" type="text" class="form-control  phone" id="phone" placeholder="0123456789" value="" >
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">Distric</label>
                                <select name="distict_id"   id="distict_id" class="form-control subject_type">
                                    <option value="">Select distict </option>
                                          
 
                                </select>
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">gp</label>
                                <select class="form-control" id="gp_id" name="gp_id"> 
                                    <option value="" >Select GP</option>
                                        
                                </select>
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">pin</label>
                                <input name="pin" type="text" class="form-control username" id="pin" placeholder="enter your pincode" value="">
                            </div>
                            </div>
                            <!-- -->    
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <div class="form-group res-mg-t-15">
                                <label for="type">email</label>
                                <input name="email" type="email"id="email" class="form-control username" placeholder="abc123@gmail.com" value="">
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">state</label>
                                <select name="state_id"  id="state_id" class="form-control class_type"> 
                                    <option value="">Select  start</option>
                                    <?php  
                                    $class_results=$db->getalldata('sta_mst01','COM_CMCD,COM_CMNM','COM_CANC=1 AND COM_TPCD=2'); 
                                    foreach($class_results  as $cdata){ 
                                    ?>
                                    <option value="<?= $cdata->COM_CMCD ?>"> <?= $cdata->COM_CMNM ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">block</label>
                                <select class="form-control" id="block_id" name="block_id">
                                    <option value="">Select Block</option>
                                        
                                </select>
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">village</label>
                                 <select class="form-control" id="vlg_id" name="vlg_id"> 
                                        <option value="">Select Village</option>
                                        
                                    </select>
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">address</label>
                                <input name="username" type="text" id="address" class="form-control username" placeholder="User  Name" value=" ">
                            </div>
                            
                            </div>   
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Registration</button> 
                        </div>
                        <p class="text-center">Have an account? <a href="login.php" class="text-center">Log In</a> </p>                  					 
                    </form>  
                </div>
            </div>
        </div>
    </section>
</main>     
<form id="creataccount" action=" " method="POST" enctype=""> 
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="form-groupform-group res-mg-t-15">
                                    <lable for="name">Name of Organization</label>
                                    <input name="name" type="text" class="form-control name" id="orgname" placeholder="Organization name" value="">
                                </div> 		 
                                <div class="form-group res-mg-t-15">
                                    <label for="type">registered office  number</label>
                                    <input name="reg_num" type="text" class="form-control reg_num" id="regnumber" placeholder="User  Name" value="" >
                                </div>
                                
                                <div class="form-group res-mg-t-15">
                                    <label for="type">Distric</label>
                                    <select name="distict_id"   id="distict_id" class="form-control subject_type">
                                        <option value="">Select distict </option>
                                            <?php  
                                            $subject_results=$db->getalldata('dst_mst01','DSM_DSCD,DSM_DSNM','DSM_CANC=0'); 
                                            foreach($subject_results  as $cdata){ 
                                            ?>
                                        <option value="<?= $cdata->DSM_DSCD ?>" > <?= $cdata->DSM_DSNM?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15">
                                <label for="type">gp</label>
                                    <select class="form-control" id="gp_id" name="gp_id"> 
                                        <option value="" >Select GP</option>
                                        <?php  
                                        // $gp_results=$db->getalldata('gp_mst01','GPM_GPCD ,GPM_GPNM','GPM_CANC=0 and GPM_BLCD='.$result[0]->block); 
                                        foreach($gp_results  as $gdata){ 
                                        ?>
                                        <option value="<?= $gdata->GPM_GPCD ?>" <?= ($result[0]->gp ==$gdata->GPM_GPCD)? 'selected':'';?>> <?= $gdata->GPM_GPNM?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group res-mg-t-15">
                                    <label for="type">address</label>
                                    <input name="username" type="text" id="address" class="form-control username" placeholder="User  Name" value="">
                                </div>
                                
                            </div>
                            <!-- -->    
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <div class="form-group res-mg-t-15">
                                <label for="type">email</label>
                                <input name="email" type="email"id="email" class="form-control username" placeholder="abc123@gmail.com" value="">
                            </div>
                            <div class="form-group res-mg-t-15">
                            <div class="form-group res-mg-t-15">
                                <label for="type">phone  number</label>
                                <input name="phone" type="text" class="form-control  phone" id="phone" placeholder="0123456789" value="" >
                            </div>
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">block</label>
                                <select name="distict_id"   id="distict_id" class="form-control subject_type">
                                    <option value="">Select  block </option>
                                        <?php  
                                        // $subject_results=$db->getalldata('vlg_mst01','VLM_VLCD,	VLM_VLNM','VLM_CANC=0'); 
                                        // foreach($subject_results  as $cdata){ 
                                        ?>
                                    <!-- <option value="<?= $cdata->	STM_STCD ?>" <?= ($result[0]->district ==$cdata->	STM_STCD)? 'selected':'';?>> <?= $cdata->DSM_DSNM?></option> -->
                                    <?php// } ?>
                                </select>
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label for="type">village</label>
                                <label for="type">village</label>
                                 <select class="form-control" id="vlg_id" name="vlg_id"> 
                                    <option value="">Select Village</option>
                                    <?php  
                                    // $vl_results=$db->getalldata('vlg_mst01','VLM_VLCD ,VLM_VLNM','VLM_CANC=0 and VLM_GPCD='.$result[0]->gp); 
                                    foreach($vl_results  as $vdata){ 
                                    ?>
                                    <option value="<?= $vdata->VLM_VLCD ?>" <?= ($result[0]->village ==$vdata->VLM_VLCD)? 'selected':'';?>> <?= $vdata->VLM_VLNM?></option>
                                    <?php } ?>
                                </select>
                            </div>
                           
                            <div class="form-group res-mg-t-15">
                                <label for="type">pin</label>
                                <input name="pin" type="text" class="form-control username" id="pin" placeholder="enter your pincode" value="">
                            </div>
                            </div>   
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Registration</button> 
                        </div>
                        <p class="text-center">Have an account? <a href="login.php" class="text-center">Log In</a> </p>                  					 
                    </form>  






<?php 
 if(isset($_REQUEST) =='POST'){ 
    if($mode =='ADD'){
        /**
         * get form data 
         * sanitize form data
         * data convert to PascalCase
         */
        $common_type=$db->escape_string($_POST['common_type']);
        $common=ucwords(strtolower($db->escape_string($_POST['common'])));
 
        if($common_type =='' && $common==''){
            $db->redirect('common_add.php','status=400');
        }else{
            //check unique value
			$is_uniq=$db->check_uniq_column_value($table_name,'COM_CMNM' ,$common,"COM_TPCD =$common_type"); //, "COM_TPCD =$common_type"
            if($is_uniq < 1){
                //data insert section
                $insert_fields=array('COM_TPCD','COM_CMNM', 'COM_CHTP', 'COM_CHTM', 'COM_CHUI','COM_CHWI');
                $insert_values=array($common_type,$common,'Created',$cur_date,$login_id,$localIp);
                $res =$db->insert($table_name, $insert_fields,$insert_values);
                //after success
                if($res){
                    $db->redirect('common_add.php','status=200');
                }else{
                    $db->redirect('common_add.php','status=500');
                }
            }else{
                $db->redirect('common_add.php',"status=401");
            }
        }
    }
    ?>