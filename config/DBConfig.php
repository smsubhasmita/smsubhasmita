<?php
/*** =======================================================================
						DOCUMENTATION
						
1-Run Query for database  	=>run_query($SQL)
2-Insert Data 			  	=>insert($table_name,$field_names,$values)
3-Update Data  				=>update($table_name,$fields ,$selected_column_name,$selected_column_name_value)
4-Delete Data  				=>delete($table,$selected_column_name,$selected_column_name_value)
5-Reterve Data  			=>getdata($table, $selected_column_name null,$selected_column_name_value null)
6-Check Uniq column value	=>check_uniq_column_value($table_name,$selected_column_name,$selected_column_name_value,$extra_condition null)
7-Reterve Data  			=>getalldata($table_name,$selected_column_name,$condition)

21-Header redirect  			=>redirect($url String, $get =null String)
22-Input value escape string 	=>escape_string($value) 
23-Get Session  				=>get_session()
24-Session Destroy/Logout 		=>user_logout()
25-File Upload 					=>fileUpload($path String,$file Files Object)
26-Database Connection  		=>dbclose($c)
27-Return error prefix    		=>error_prefix()
28-Write Error Log File  		=>file_write($msg)

29-Text lowercase to upper case =>string_upper($string)
30-Showing Limited Text			=>limit_text($text String, $limit Int)
31-Showing Limited Text			=>limit_text($text String, $limit Int)
================================================================================================== **/

class DBConfig{
	private $host="localhost";
	private $user="root";
	private $password="";
	private $database="tender";
	protected $conn;
	private $dir_name="error"; //folder name
	
	public function __construct(){ 
		date_default_timezone_set('Asia/Calcutta'); 
		
		if (!file_exists($this->dir_name )){
			@mkdir($this->dir_name, 0777);
		}
		if(!isset($this->conn)){
			$this->conn =new mysqli($this->host,$this->user,$this->password,$this->database);
			mysqli_set_charset($this->conn, 'utf8');
			if (!$this->conn){
				echo 'Cannot connect to database server';
				exit;
			}
			return $this->conn;
		}
	}
	
//	9ef4b87351bc02b1018b2fef3f8c2be1
/*======================================================== DATABASE FUNCTION  START =======================================================================*/
	
	/*** Run Query for database ***/
	public function run_query($sql){
		if($result=$this->conn->query($sql) === true){
			return $result;
		}else{
			$_date_time=date('Y-m-d H:i:s');
			$error__prefix=$this->error_prefix();
			$error_msg =$error__prefix."Query : ".$sql." ERROR: " . $this->conn->error."\n";
			$this->file_write($error_msg);
			return false;
		}
		$this->dbclose($this->conn);
	}
	/*** starting the Insert Data ***/
	public function insert($table,$field_names,$values){
		$field="";
		foreach ($field_names as $f) {
			$field.="`$f` ,";
		}
		$field1=rtrim($field,",");
		$value="";
		foreach ($values as $v) {
			$value.="'$v' ,";
		}
		$value1=rtrim($value,",");
		$sql ="INSERT INTO $table($field1) VALUES($value1)";
		if($this->conn->query($sql) === true ){
			$last_id = $this->conn->insert_id;
			return 	$last_id;
		}else{
			echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
			$_date_time=date('Y-m-d H:i:s');
			$error__prefix=$this->error_prefix();
			$error_msg =$error__prefix." ERROR: " . $this->conn->error."\n";
			$this->file_write($error_msg);
		}
		$this->dbclose($this->conn);
	}
	/*** starting the Update Data ***/
	public function update($table,$fields,$param,$id){
		$value='';
		foreach ($fields as $f => $v) {
			$value.="`$f`='$v' ,";
		}
		$value=rtrim($value,",");
		$sql="UPDATE $table SET $value WHERE $param=$id";
		if($this->conn->query($sql) === true){
			return true;
		}else{
			echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
			$_date_time=date('Y-m-d H:i:s');
			$error__prefix=$this->error_prefix();
			$error_msg =$error__prefix." ERROR: " . $this->conn->error."\n";
			$this->file_write($error_msg);
		}
		$this->dbclose($this->conn);
	}
	/*** starting the Delete Data ***/
	public function delete($table,$param,$id){
		$sql="DELETE FROM $table WHERE $param=$id";
		if($this->conn->query($sql) === true){
			return true;
		}else{
			echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
			$_date_time=date('Y-m-d H:i:s');
			$error__prefix=$this->error_prefix();
			$error_msg =$error__prefix." ERROR: " . $this->conn->error."\n";
			$this->file_write($error_msg);
		}
		$this->dbclose($this->conn);
	}
	/*** starting the Reterve Data ***/
	public function getdata($table,$param=null,$id=null){
		$rows =array();
		if($id==null){
			$sql="SELECT * FROM $table";
		}else{
			$sql="SELECT * FROM $table WHERE $param=$id";
		}
		$result=$this->conn->query($sql);
		while($row =$result->fetch_object()){
			$rows[] =$row;
		}
		return $rows;
	}
	public function getalldata($table,$select,$param){
		$rows =array();
		$sql="SELECT $select FROM $table WHERE $param";
		$result=$this->conn->query($sql);
		while($row =$result->fetch_object()){
			$rows[] =$row;
		}
		return $rows;
	}
	/** Check Uniq column value */

	function check_uniq_column_value($table_name,$column_name,$value,$param=null) {
		if($param !=null){
			$sql="SELECT count(*) as tot FROM $table_name WHERE $column_name='$value' AND $param";
		}else{
			$sql="SELECT count(*) as tot FROM $table_name WHERE $column_name='$value'";
		}
		$result=$this->conn->query($sql);
		$row =$result->fetch_object();
		return intval($row->tot);
	}
	function GETCOLUMNBYVALUE($TB_NAME,$TB_COLUMN_NAME,$PARAMS=""){
		if(empty($PARAMS)){
			$sql="select max(IFNULL($TB_COLUMN_NAME,0))  as max_no from $TB_NAME";
		}else{
			$sql="select max(IFNULL($TB_COLUMN_NAME,0))  as max_no from $TB_NAME WHERE $PARAMS ";
		}
		$sqlqry=$this->conn->query($sql);
		$sqlrows= $sqlqry->fetch_object();
		foreach($sqlrows as $r){
			$sqlrow= $r;
		}
		if ($sqlrow <= 0) {
			$GetId_Fn = 1;
		}
		else{
			$GetId_Fn = $sqlrow + 1;
		}
		return $GetId_Fn;
	
	}
	
/*================================================================= DATABASE FUNCTION  CLOSE ============================================================*/
/*===============================================================================================================================================================*/
/*======================================\

public function redirect($url, $get =null){
		header("location:$url ?$get");
	}
===================== DATABASE FUNCTION  START =====================================================================*/
	/** HTTP Header redirect **/
	
	public function redirect($url, $get =null){
		if($get!=""){
			header("location:$url?$get");
		}else{
			header("location:$url");
		}
		
	}
	/*** for Input value escape string ***/
	public function escape_string($value){
		$string=$this->conn->real_escape_string($value);
		$string =trim($string);
		$string = stripslashes($string);
		$string = htmlspecialchars($string);
		$string = htmlentities($string);
		return $string;
		
	}
	public function escape_string_2($value){
		$string=$this->conn->real_escape_string($value);
		return $string;
		
	}
	/*** starting the session ***/
	public function get_session(){
		return $_SESSION['login'];
	}
	/*** starting the session Out ***/
	public function user_logout() {
		$_SESSION['login'] = false;
		session_destroy();
		return true;
	}
	
	/*** starting the Insert Image/file ***/
	public function fileUpload($path,$file){
		if($file['size'] > 0 && $file['error'] == 0){
			$name=strtolower($file['name']);
			$tmp_name=$file['tmp_name'];
			$a_size=$file['size'];
			$a_type=$file['type'];
			$RandomNum=rand(100, 9999);
			$file_name	=str_replace(' ','-',$name);
			$file_ext	= substr($file_name, strrpos($file_name, '.'));
			$file_ext 	= str_replace('.','',$file_ext);
            $file_name 	= preg_replace("/\.[^.\s]{3,4}$/", "", $file_name);
            $file_name 	= $file_name.'.'.$file_ext;

			if(is_file($path.$file_name)){
				unlink($path.$file_name);
			}
			/* 
			if( $a_type =='image/jpeg' ||$a_type =='image/jpg'||$a_type =='image/png'||$a_type =='image/gif' ||$a_type=='application/pdf' ||$a_type=='application/msword'||$a_type=='application/doc'){
				if($a_size <= 1048576){
					move_uploaded_file($tmp_name, $path.$file_name);
					return $file_name;
				}else{
					return $msg ='File size maximum 1Mb';
				}
			}else{
				return $msg='File format Not mach!';
			} */
			move_uploaded_file($tmp_name, $path.$file_name);
			return $file_name;
		}else{
			return $msg='No File Found!';
		}
	}
	/*** starting the Update Image/file ***/

	/*** for login process ***/
	public function check_login($username, $password,$remember=null){
		$password=md5($password);
		$sql ="SELECT id,org_name,reg_number,phone,email FROM tender_mst01 WHERE email='$username' AND password='$password' AND status=1 AND cancel=1";
		if($this->conn->query($sql)){
			$result=$this->conn->query($sql);
			$user_data =$result->fetch_array();
			$count_row =$result->num_rows;
			if ($count_row == 1) {
 				// this login var will use for the session thing
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['login_id'] = $user_data['id'];
				$_SESSION['username'] = $user_data['org_name'];
				//$_SESSION['type'] = $user_row['type'];
				$_SESSION['reg_number'] = $user_data['reg_number'];
				$_SESSION['phone'] = $user_data['phone'];
				$_SESSION['email'] = $user_data['email'];
				if(!empty($remember)) {
					setcookie ("username",$username,time()+ (10 * 365 * 24 * 60 * 60));
					setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
				}
				return true;
			}
			
		}else{
			echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
			$_date_time=date('Y-m-d H:i:s');
			$error__prefix=$this->error_prefix();
			$error_msg =$error__prefix." ERROR: " . $this->conn->error."\n";
			$this->file_write($error_msg);
			return false;
		}
		$this->dbclose($this->conn);
	}
	
/*================================================================  DATABASE FUNCTION  CLOSE  =============================================================*/	
	/** Database Connection Close **/
	function dbclose($c){
		$c->close();
	} 
	public function error_prefix() {
		$date_time=date('Y-m-d H:i:s a');
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		return $_SERVER['REMOTE_ADDR'] ."[".date('Y-m-d H:i:s', strtotime($date_time))."] '".$actual_link."' ";

	}
	/** ERROR file Write  **/
	public function file_write($msg){ 
		$fp = fopen('error/error_log.txt', 'a');//opens file in append mode  
		fwrite($fp, $msg);  
		fclose($fp);  
	}	
	/**Limit Text  **/
	public function limit_text($text, $limit) {
		if (str_word_count($text, 0) > $limit) {
			$words = str_word_count($text, 2);
			$pos   = array_keys($words);
			$text  = substr($text, 0, $pos[$limit]) . '...';
		}
		return $text;
	}
	/** Text lower case to upper case **/
	function string_upper($string){
		$lower_string=strtolower($string);
		return strtoupper($lower_string);
	}
	function masking($value,$number){
		$mask_number =substr($value,0,$number). str_repeat("*", strlen($value)-($number+$number)) . substr($value, -$number);
		return $mask_number;
	}
	function aadhaar_masking($value,$left_number,$right_number){
		$mask_number =substr($value,0,$left_number). str_repeat("*", strlen($value)-($left_number+$right_number)) . substr($value, -$right_number);
		return $mask_number;
	}
	function get_system_ipaddress(){
		return $localIp = gethostbyname(gethostname());
	}
	/*
	* function to encode string
	* accepts a string
	* returns encoded string
	*/
	function safe_encode($string) {
		return strtr(base64_encode($string), '+/=', '-_-');
	}
	/*
	* function to decode the encoded string
	* accepts encoded string
	* returns the original string
	*/
	function safe_decode($string) {
		return base64_decode(strtr($string, '-_-', '+/='));
	} 
}

?>