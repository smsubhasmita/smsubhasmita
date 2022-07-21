<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <title>Hello, world!</title>
       
    </head>
    <body>
    <div class="contaner">
        <div class="card">
            <div class="card-header">
            <h3 class="text-center">Student Registaion</h3>
            </div>
            <?php 
            print_r($country);
            ?>
            <div class="card-body">
                <form class="row g-3" action="<?= base_url('Welcome/usr_regsistation_add');?>" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-6">
                        <label for="inputPassword2" class="">Name</label>
                        <input type="text" name="user_name" value="<?= set_value('user_name')?>" class="form-control"   placeholder="Enter Name">
                        <?= form_error('user_name');?>

                    </div>
                    <div class="col-sm-6">
                        <label for="inputPassword2" class="">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="user_gender"  value="1" <?= ((set_value('user_name')==1)?'checked':'')?> >
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="user_gender" value="2"  <?= ((set_value('user_name')==2)?'checked':'')?> >
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="user_gender" value="3"  <?= ((set_value('user_name')==3)?'checked':'')?> >
                            <label class="form-check-label" for="inlineRadio2">Other</label>
                        </div>
                        <?= form_error('user_gender');?>
                    </div>
                    <div class="col-sm-6">
                        <label for="staticEmail2" class="">Profile photo</label>
                        <input type="file" name="user_profile"  class="form-control"   >
                        <?= form_error('user_profile');?>
                    </div>
                    <div class="col-sm-6">
                        <label for="staticEmail2" class="">DOB</label>
                        <input type="date" name="user_dob" class="form-control"   value="<?= set_value('user_dob')?> ">
                        <?= form_error('user_dob');?>
                    </div>
                    <div class="col-sm-6">
                        <label for="staticEmail2" class="">Email</label>
                        <input type="mail" name="user_email"  class="form-control"  value="<?= set_value('user_email')?>">
                        <?= form_error('user_email');?>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPassword2" class="">Phone Number</label>
                        <input type="tel" name="user_number" class="form-control" value="<?= set_value('user_number')?> " placeholder="Password">
                        <?= form_error('user_number');?>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPassword2" class="">Password</label>
                        <input type="password" name="user_psw" class="form-control" value="<?= set_value('user_psw')?> "  placeholder="Password">
                        <?= form_error('user_psw');?>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPassword2" class="">Confirm Password</label>
                        <input type="password" name="user_cpsw" class="form-control" value="<?= set_value('user_cpsw')?> "  placeholder="Password">
                        <?= form_error('user_cpsw');?>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPassword2" class="">Country</label>
                        <select class="form-select" name="user_country" aria-label="Default select example" onchange="getState(this.value)">
                        <option value="">Select Country</option>    
                            <?php foreach($country as $data){?>
                                <option value="<?= $data->COM_COCD ?>" <?= ((set_value('user_country')==$data->COM_COCD)?'selected':'') ?>><?= $data-> COM_CONM?></option>    
                           <?php } ?>               
                         </select>
                        <?= form_error('user_country');?>
                     </div>
                    <div class="col-sm-6">
                        <label for="inputPassword2" class="">State</label>
                        <select class="form-select stateData"  name="user_state" aria-label="Default select example" onchange="getDistrict(this.value)">
                            <option selected>Select State</option> 
                        </select>    
                        <?= form_error('user_state');?>                
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPassword2" class="">District</label>
                        <select class="form-select district_data" name="user_district" aria-label="Default select example">
                            <option selected>Select District</option> 
                        </select>     
                        <?= form_error('user_district');?>

                    </div>
                    <div class="col-sm-6">
                        <label for="inputPassword2" class="">Pin Code</label>
                        <input type="tel" class="form-control" name="user_pin" value="<?= set_value('user_pin')?> " placeholder="Pin Code">
                        <?= form_error('user_pin');?>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="user_checked[]" value="1" <?= (set_value('user_cpsw')==1)?'checked':''?> type="checkbox"    >
                        <label class="form-check-label" for="flexCheckDefault">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="user_checked[]" type="checkbox" value="2" <?= (set_value('user_cpsw')==2)?'checked':''?>    >
                        <label class="form-check-label" for="flexCheckChecked">
                            Checked checkbox
                        </label>
                        <?= form_error('user_checked[]');?>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary mb-3 text-center">Confirm identity</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    function getState(stateId){
         if(stateId !=""){
           $.ajax({
               url:'<?= base_url('Welcome/get_state_data_ajax');?>',
               type:"POST",
               cache:false, 
               data:{
                user_country:stateId
               },
                success: function(Responce){
                     $('.stateData').html(Responce);
                }
               
           }) 
        }
    }

    function getDistrict(DistrictId){
        console.log(DistrictId);
        if(DistrictId !=""){
           $.ajax({
               url:'<?= base_url('Welcome/get_district_data_ajax');?>',
               type:"POST",
               cache:false, 
               data:{
                user_state:DistrictId
               },
                success: function(Responce){
                    //console.log(Responce);
                    $('.district_data').html(Responce);
                }
               
           }) 
        }
    }
    </script>
</html>