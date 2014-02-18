<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cbuku extends CI_Controller {
	
	function __construct(){ 
		
		parent::__construct();
		// if ($this->session->userdata("login") != TRUE) {
            // $this->session->set_flashdata('login_notif','<p>Anda harus login</p>');
            // redirect('admin_login', 'refresh');
		
		// }
		$this->load->model("mbuku");
		$this->load->library('template');
		$this->load->helper(array('url','tanggal','enum','form','date'));
		
	}
	
	function index()
	{	
		$this->browse();
	}
	
	// function pilihotentikasi()
	// {	
		// if('IS_AJAX') {
        	// $data['pilih_otentikasi'] = "<input type='radio' name='value' id='status_otentikasi' value='1' checked='checked' style='font-size:20px;margin:10px' >Aktif</input>
			// <input type='radio' name='value' id='status_otentikasi' value='0' style='font-size:20px;margin:10px' >non-Aktif</input></td>
			// <td>";
			
			// $this->load->view('admin/user/choise_user_view',$data);
            // }
	// }
	
	function lihat(){
		if(count($_POST)>0){
			$id=$_POST['ID'];
			$data['buku']=$this->mbuku->getbukubyid($id);
			
			$this->load->view("admin/buku/detail_buku_view",$data);
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
			// if ($key == 'status_otentikasi'){
			
				// $where="WHERE  ".$key." = ".$value."";
				// $config['total_rows'] = $this->muser->getusernumrow($where);
				// $config['base_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/";
				// $config['first_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/0/true/4/".$key."/".$value."')";
				// $config['suffix'] = "/true/4/".$key."/".$value."')";
			
			// } else {
			
				$where="WHERE  ".$key." LIKE '%".$value."%'";
				$config['total_rows'] = $this->muser->getusernumrow($where);
				$config['base_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/";
				$config['first_url'] = "javascript:pagination('".site_url() . "/admin/" .$this->router->fetch_class() . "/browse/0/true/4/".$key."/".$value."')";
				$config['suffix'] = "/true/4/".$key."/".$value."')";
			// }
		}else{
			$config['total_rows'] = $this->db->count_all('tbl_buku');
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
			$data['buku']=$this->mbuku->getbuku($start, $config['per_page'], $where);
		}else{
			$data['buku']=$this->mbuku->getbuku($start, $config['per_page']);
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
			
			$this->load->view('admin/buku/browse_buku_view',$data);
		}else{
			$data['notif']="";
			$data['judul']="BUKU SiPerpus";
			$this->template->display('admin/buku/main_buku_view',$data);
			
		}
	}

	function tambah(){
		
		$this->load->view("admin/buku/add_buku_view");
		
	}
	
	function edit(){
		if(count($_POST)>0){
			$id=$_POST['ID'];
			$data['buku']=$this->mbuku->getbukubyid($id);
			$this->load->view("admin/buku/edit_buku_view",$data);
		}
	}
	
	function simpan_tambah(){
		if(count($_POST)>0){
			$config = array(
				array('field' => 'kode_buku', 'label' => 'Kode Buku', 'rules' => 'required'),
				array('field' => 'prioritas_buku', 'label' => 'Prioritas Buku', 'rules' => 'required'),
				array('field' => 'judul_buku', 'label' => 'Judul Buku', 'rules' => 'required'),
				array('field' => 'penulis', 'label' => 'Penulis', 'rules' => 'required'),
				array('field' => 'penerbit', 'label' => 'Penerbit', 'rules' => 'required'),
				array('field' => 'tahun_terbit', 'label' => 'Tahun Terbit', 'rules' => 'required'),
			);
			
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE) {
				
				$kode_buku = mysql_real_escape_string($_POST['kode_buku']);
				$prioritas_buku = mysql_real_escape_string($_POST['prioritas_buku']);
				$judul_buku = ucwords(mysql_real_escape_string($_POST['judul_buku']));
				$subjek = mysql_real_escape_string($_POST['subjek']);
				
				$penulis = ucwords(mysql_real_escape_string($_POST['penulis']));
				$penerbit = ucwords(mysql_real_escape_string($_POST['penerbit']));
				$tahun_terbit = mysql_real_escape_string($_POST['tahun_terbit']);
				
				$bahasa = mysql_real_escape_string($_POST['bahasa']);
				$panjang = mysql_real_escape_string($_POST['panjang']);
				$lebar = mysql_real_escape_string($_POST['lebar']);
				
				$ISBN = mysql_real_escape_string($_POST['ISBN']);
				$cetakan = mysql_real_escape_string($_POST['cetakan']);
				$keterangan = mysql_real_escape_string($_POST['keterangan']);
				
				$user = "admin";
				
				$datestring = "Y-m-d H:i:s";
				$time = time();
				
				$tgl_daftar_buku = date($datestring, $time);
				
				$query = $this->db->insert("tbl_buku", array(
					"kode_buku" => $kode_buku,
					"prioritas_buku" => $prioritas_buku,
					"judul_buku" => $judul_buku,
					"subjek" => $subjek,
					
					"penulis" => $penulis,
					"penerbit" => $penerbit,
					"tahun_terbit" => $tahun_terbit,
					
					"bahasa" => $bahasa,
					"panjang" => $panjang,
					"lebar" => $lebar,
					
					"ISBN" => $ISBN,
					"cetakan" => $cetakan,
					"keterangan" => $keterangan,
					"user" => $user,
					
					"tgl_daftar_buku" => $tgl_daftar_buku
					
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
				array('field' => 'kode_buku', 'label' => 'Kode Buku', 'rules' => 'required'),
				array('field' => 'prioritas_buku', 'label' => 'Prioritas Buku', 'rules' => 'required'),
				array('field' => 'judul_buku', 'label' => 'Judul Buku', 'rules' => 'required'),
				array('field' => 'penulis', 'label' => 'Penulis', 'rules' => 'required'),
				array('field' => 'penerbit', 'label' => 'Penerbit', 'rules' => 'required'),
				array('field' => 'tahun_terbit', 'label' => 'Tahun Terbit', 'rules' => 'required'),
			);
			
			$this->form_validation->set_rules($config);
			
			if ($this->form_validation->run() == TRUE) {
				$kode_buku = mysql_real_escape_string($_POST['kode_buku']);
				$prioritas_buku = mysql_real_escape_string($_POST['prioritas_buku']);
				$judul_buku = ucwords(mysql_real_escape_string($_POST['judul_buku']));
				$subjek = mysql_real_escape_string($_POST['subjek']);
				
				$penulis = ucwords(mysql_real_escape_string($_POST['penulis']));
				$penerbit = ucwords(mysql_real_escape_string($_POST['penerbit']));
				$tahun_terbit = mysql_real_escape_string($_POST['tahun_terbit']);
				
				$bahasa = mysql_real_escape_string($_POST['bahasa']);
				$panjang = mysql_real_escape_string($_POST['panjang']);
				$lebar = mysql_real_escape_string($_POST['lebar']);
				
				$ISBN = mysql_real_escape_string($_POST['ISBN']);
				$cetakan = mysql_real_escape_string($_POST['cetakan']);
				$keterangan = mysql_real_escape_string($_POST['keterangan']);
				
				$user = "admin";
				
				$datestring = "Y-m-d H:i:s";
				$time = time();
				
				$tgl_daftar_buku = date($datestring, $time);
				
				
				$sqlupdate="UPDATE tbl_buku SET 
					kode_buku = '".$kode_buku."',
					prioritas_buku = '".$prioritas_buku."',
					judul_buku = '".$judul_buku."',
					subjek = '".$subjek."',
					
					penulis = '".$penulis."',
					penerbit = '".$penerbit."',
					tahun_terbit = '".$tahun_terbit."',
					
					bahasa = '".$bahasa."',
					panjang = '".$panjang."',
					lebar = '".$lebar."',
					
					ISBN = '".$ISBN."',
					cetakan = '".$cetakan."',
					keterangan = '".$keterangan."',
					
					user = '".$user."'
					
					
					WHERE kode_buku='".$kode_buku."'";
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
			$kode_buku=$_POST['kode_buku'];
			
			$sqldelete= "DELETE FROM tbl_buku WHERE kode_buku ='".$kode_buku."'";
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
					$this->db->delete("tbl_buku", array('username' => substr($b[$i], 2)));
				}
			}
			
			$this->browse();
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/crud.php */