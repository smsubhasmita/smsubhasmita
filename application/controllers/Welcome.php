<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
			$this->load->model('WelcomeModel','wlcm',true);
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function user_form(){
		$data['country']=$this->wlcm->get_country()->result();
		$this->load->view('user_form',$data);
	}
	public function usr_regsistation_add(){
	 
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('user_gender', 'Gender', 'required');
		$this->form_validation->set_rules('user_dob', 'Dob', 'required');
		$this->form_validation->set_rules('user_email', 'Email', 'required');
		$this->form_validation->set_rules('user_number', 'Number', 'required');
		$this->form_validation->set_rules('user_psw', 'Password', 'required');
		$this->form_validation->set_rules('user_cpsw', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('user_country', 'Country', 'required');
		$this->form_validation->set_rules('user_state', 'State', 'required');
		$this->form_validation->set_rules('user_district', 'District', 'required');
		$this->form_validation->set_rules('user_pin', 'Pin Code', 'required');
		$this->form_validation->set_rules('user_checked[]', 'tc', 'required');
		if($_FILES['user_profile']['name'] =='' && $_FILES['user_profile']['error'] !=0){
			$this->form_validation->set_rules('user_profile', 'Profile Photo', 'required');
		}
		 
 		$this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>'); 
		if ($this->form_validation->run() === FALSE){
			$data['country']=$this->wlcm->get_country()->result();
			$this->load->view('user_form',$data);

		}else{
			 
			$insert_data=[
				'user_name'=>$this->input->post('user_name'),
				'user_gender'=>$this->input->post('user_gender'),
				'user_dob'=>$this->input->post('user_dob'),
				'user_email'=>$this->input->post('user_email'),
				'user_number'=>$this->input->post('user_number'),
				'user_psw'=>md5($this->input->post('user_psw')),
				'user_cpsw'=>$this->input->post('user_psw'),
				'user_country'=>$this->input->post('user_country'),
				'user_state'=>$this->input->post('user_state'),
				'user_district'=>$this->input->post('user_district'),
				'user_pin'=>$this->input->post('user_pin'),
				'user_checked'=>json_encode($this->input->post('user_checked')),
 
			];
			$uplode_path="uplode/user";
			if(!file_exists($uplode_path)){
				@mkdir($uplode_path,0777,true);
			}
			$file_name=$_FILES['user_profile']['name'];
			if($_FILES['user_profile']['name'] !== '' && $_FILES['user_profile']['error'] === 0){
				move_uploaded_file($_FILES['user_profile']['tmp_name'],$uplode_path.$file_name);
			 //move_uploaded_file($_FILES['base_photo']['tmp_name'],$uplodePath.$_FILES['base_photo']['name']);

			}
			$insert_data['user_profile']=$file_name;
			echo "<pre>";
			print_r($insert_data);
			$responc=$this->wlcm->get_insert($insert_data);
			if($responc > 0){
				echo "insertted";
			}else{
				echo "not Inserted";
			}
		}

	}
	function user_list(){
		$data['user_data']=$this->wlcm->get_user_data()->result();
		$this->load->view('user_list',$data);
	}



	function get_state_data_ajax(){
		$countryId=$_POST['user_country'];
		$sate_data=$this->wlcm->get_state($countryId)->result();
		if($sate_data){
			 $html='<option value="">Select State </option>';
			 foreach($sate_data as $data){
				 $html.='<option value="'.$data->STM_STCD.'">'.$data->STM_STNM.'</option>';
			 }
			 echo $html;
		}else{
			echo "data not found";
		}


	}
	function get_district_data_ajax(){
		$stateId=$_POST['user_state'];

		$district_data=$this->wlcm->get_district($stateId)->result();
		if($district_data){
			 $html='<option value="">Select District </option>';
			 foreach($district_data as $data){
				 $html.='<option value="'.$data->DSM_DSCD.'">'.$data->DSM_DSNM.'</option>';
			 }
			 echo $html;
		}else{
			echo "data not found";
		}
	}
}
