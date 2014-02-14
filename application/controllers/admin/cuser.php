<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cuser extends CI_Controller {
	
	function __construct(){ 
		
		parent::__construct();
		// if ($this->session->userdata("login") != TRUE) {
            // $this->session->set_flashdata('login_notif','<p>Anda harus login</p>');
            // redirect('admin_login', 'refresh');
		
		// }
		$this->load->model("muser");
		$this->load->library('template');
		$this->load->helper(array('url','tanggal','enum','form','date'));
		
	}
	
	function index()
	{	
		$this->browse();
	}
	
	function pilihotentikasi()
	{	
		if('IS_AJAX') {
        	$data['pilih_otentikasi'] = "<input type='radio' name='value' id='status_otentikasi' value='1' checked='checked' style='font-size:20px;margin:10px' >Aktif</input>
			<input type='radio' name='value' id='status_otentikasi' value='0' style='font-size:20px;margin:10px' >non-Aktif</input></td>
			<td>";
			
			$this->load->view('admin/user/choise_user_view',$data);
            }
	}
	
	
	function browse(){
		if(isset($_POST['key']) && isset($_POST['value'])){
			$key=$_POST['key'];
			$value=mysql_real_escape_string($_POST['value']);
		}else{
			$key=$this->uri->segment(7);
			$value=mysql_real_escape_string($this->uri->segment(8));
		}
		$ajax = $this->uri->segment(5);
		$action = $this->uri->segment(6);
		if(!isset($ajax)){
			$ajax = false;
		}
		
		//pagination
		if($action == 4){
			if ($key == 'status_otentikasi'){
			
				$where="WHERE  ".$key." = ".$value."";
				$config['total_rows'] = $this->muser->getusernumrow($where);
				$config['base_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/";
				$config['first_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/0/true/4/".$key."/".$value."')";
				$config['suffix'] = "/true/4/".$key."/".$value."')";
			
			} else {
			
				$where="WHERE  ".$key." LIKE '%".$value."%'";
				$config['total_rows'] = $this->muser->getusernumrow($where);
				$config['base_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/";
				$config['first_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/0/true/4/".$key."/".$value."')";
				$config['suffix'] = "/true/4/".$key."/".$value."')";
			}
		}else{
			$config['total_rows'] = $this->db->count_all('tbl_user');
			$config['base_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/";
			$config['first_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/0/true/0')";
			$config['suffix'] = "/true/0')";
			
		}
		
		$config['per_page']  = 10;
		
		$start=$this->uri->segment(4);
		if(empty($start)){
			$start=0;
		}
		$this->pagination->initialize($config);
		
		//getdata
		if($action == 4){
			$where = "WHERE  ".$key." LIKE '%".$value."%'";
			$data['user']=$this->muser->getuser($start, $config['per_page'], $where);
		}else{
			$data['user']=$this->muser->getuser($start, $config['per_page']);
		}
		$data['pagination'] = $this->pagination->create_links();
		
		//showdata
		if($ajax){
			if($action==1){
				$data['notif']="Data telah berhasil diupdate!!";
			}elseif($action==2){
				$data['notif']="Data telah berhasil dihapus!!";
			}elseif($action==3){
				$data['notif']="Data telah berhasil ditambah!!";
			}else{
				$data['notif']="";
			}
			// $this->template->display('admin/user/browse_user_view',$data);
			$this->load->view('admin/user/browse_user_view',$data);
		}else{
			$data['notif']="";
			$data['judul']="USER SiPerpus";
			$this->template->display('admin/user/main_user_view',$data);
			// $this->load->view('admin/user/main_user_view',$data);
		}
	}

	function tambah(){
		
		// $this->template->display('admin/user/tambahuser_view',$data);
		$this->load->view("admin/user/add_user_view");
		
	}
	
	function edit(){
		if(count($_POST)>0){
			$id=$_POST['ID'];
			$data['user']=$this->muser->getuserbyid($id);
			// $this->template->display('admin/user/edituser_view',$data);
			$this->load->view("admin/user/edit_user_view",$data);
		}
	}
	
	function simpan_tambah(){
		if(count($_POST)>0){
			
			$config = array(
			
				array(
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'required|alpha_dash'
				),
				
				
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required|matches[password2]|md5'
				),
				
				array(
					'field' => 'password2',
					'label' => 'Konfirmasi Password',
					'rules' => ''
				),
				
				array(
					'field' => 'nama_user',
					'label' => 'Nama User',
					'rules' => 'required'
				),
				
				array(
					'field' => 'status_otentikasi',
					'label' => 'Status Otentikasi',
					'rules' => 'required'
				),

			);
			
			$this->form_validation->set_rules($config);
			
			if ($this->form_validation->run() == TRUE) {
				$username=mysql_real_escape_string($_POST['username']);
				$password=mysql_real_escape_string($_POST['password']);
				$nama_user=ucwords(mysql_real_escape_string($_POST['nama_user']));
				$status_otentikasi=mysql_real_escape_string($_POST['status_otentikasi']);
				$keterangan=mysql_real_escape_string($_POST['keterangan']);
				
				
				$query = $this->db->insert("tbl_user", array(
					"username" => $username,
					"password" => $password,
					"nama_user" => $nama_user,
					"status_otentikasi" => $status_otentikasi,
					"keterangan" => $keterangan
					
				));
				
				if($query){
					$this->browse();
				}
			
			} else {
				$this->tambah();
			}

			
		}
	}
	
	function simpan_edit(){
		if(count($_POST)>0){
			
			$config = array(
			
				array(
					'field' => 'username',
					'label' => 'username',
					'rules' => 'required|alpha_dash'
				),
				
				
				array(
					'field' => 'password',
					'label' => 'password',
					'rules' => 'matches[password2]|md5'
				),
				
				// array(
					// 'field' => 'password2',
					// 'label' => 'password2',
					// 'rules' => 'required'
				// ),
				
				array(
					'field' => 'nama_user',
					'label' => 'nama_user',
					'rules' => 'required'
				),
				
				array(
					'field' => 'status_otentikasi',
					'label' => 'status_otentikasi',
					'rules' => 'required'
				),

			);
			
			$this->form_validation->set_rules($config);
			
			if ($this->form_validation->run() == TRUE) {
				$username=mysql_real_escape_string($_POST['username']);
				$password=mysql_real_escape_string($_POST['password']);
				$nama_user=ucwords(mysql_real_escape_string($_POST['nama_user']));
				$status_otentikasi=mysql_real_escape_string($_POST['status_otentikasi']);
				$keterangan=mysql_real_escape_string($_POST['keterangan']);
				
				
				$sqlupdate="UPDATE tbl_user SET 
					username = '".$username."', 
					password = '".$password."', 
					nama_user = '".$nama_user."', 
					status_otentikasi = '".$status_otentikasi."', 
					keterangan = '".$keterangan."' 
					
					WHERE username='".$username."'";
					$query=$this->db->query($sqlupdate);
				
				if($query){
					$this->browse();
				}
			
			} else {
				$this->tambah();
			}
			
		}
	}
	
	function hapus(){
		if(count($_POST)>0){
			$username=$_POST['username'];
			
			$sqldelete= "DELETE FROM tbl_user WHERE username ='".$username."'";
			$query=$this->db->query($sqldelete);
			
			if($query){
				$this->browse();
			}
			
		}
	}
	
	function hapussemua(){
		if(count($_POST)>0){
			$b = array_keys($_POST);
			$a = count($b);
			for ($i = 0; $i < $a; $i++) {
				if(substr($b[$i],0,2)=="f_"){
					$this->db->delete("tbl_user", array('username' => substr($b[$i], 2)));
				}
			}
			
			$this->browse();
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/crud.php */