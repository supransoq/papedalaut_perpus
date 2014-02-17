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
			// $this->template->display('admin/user/browse_user_view',$data);
			$this->load->view('admin/buku/browse_buku_view',$data);
		}else{
			$data['notif']="";
			$data['judul']="BUKU SiPerpus";
			$this->template->display('admin/buku/main_buku_view',$data);
			// $this->load->view('admin/user/main_user_view',$data);
		}
	}

	function tambah(){
		
		// $this->template->display('admin/user/tambahuser_view',$data);
		$this->load->view("admin/buku/add_buku_view");
		
	}
	
	function edit(){
		if(count($_POST)>0){
			$id=$_POST['ID'];
			$data['buku']=$this->mbuku->getbukubyid($id);
			// $this->template->display('admin/user/edituser_view',$data);
			$this->load->view("admin/buku/edit_buku_view",$data);
		}
	}
	
	function simpan_tambah(){
		if(count($_POST)>0){
			$config = array(
				array('field' => 'nis', 'label' => 'NIS', 'rules' => 'required'),
				array('field' => 'nama_depan', 'label' => 'Nama Depan', 'rules' => 'required'),
				array('field' => 'tempat_lahir', 'label' => 'Tempat Lahir', 'rules' => 'required'),
				array('field' => 'tanggal_lahir', 'label' => 'Tanggal Lahir', 'rules' => 'required'),
				array('field' => 'alamat_rumah', 'label' => 'Alamat Rumah', 'rules' => 'required'),
				array('field' => 'nama_ayah', 'label' => 'Nama Ayah', 'rules' => 'required'),
				array('field' => 'pekerjaan_ayah', 'label' => 'Pekerjaan Ayah', 'rules' => 'required'),
				array('field' => 'nama_ibu', 'label' => 'Nama Ibu', 'rules' => 'required'),
			);
			
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE) {
				
				$nis = mysql_real_escape_string($_POST['nis']);
				$nisn = mysql_real_escape_string($_POST['nisn']);
				$nama_depan = ucwords(mysql_real_escape_string($_POST['nama_depan']));
				$nama_belakang = ucwords(mysql_real_escape_string($_POST['nama_belakang']));
				$nama_panggilan = ucwords(mysql_real_escape_string($_POST['nama_panggilan']));
				$tempat_lahir = ucwords(mysql_real_escape_string($_POST['tempat_lahir']));
				$gender = mysql_real_escape_string($_POST['gender']);
				$tanggal_lahir = mysql_real_escape_string($_POST['tanggal_lahir']);
				$gol_darah = mysql_real_escape_string($_POST['gol_darah']);
				$agama = mysql_real_escape_string($_POST['agama']);
				$suku = mysql_real_escape_string($_POST['suku']);
				$status_keluarga = mysql_real_escape_string($_POST['status_keluarga']);
				$saudara_ke = mysql_real_escape_string($_POST['saudara_ke']);
				$jumlah_saudara = mysql_real_escape_string($_POST['jumlah_saudara']);
				$warga_negara = mysql_real_escape_string($_POST['warga_negara']);
				$alamat_rumah = mysql_real_escape_string($_POST['alamat_rumah']);
				$kode_pos = mysql_real_escape_string($_POST['kode_pos']);
				$telepon = mysql_real_escape_string($_POST['telepon']);
				$no_hp = mysql_real_escape_string($_POST['no_hp']);
				$jarak = mysql_real_escape_string($_POST['jarak']);
				
				$nama_ayah = mysql_real_escape_string($_POST['nama_ayah']);
				$pekerjaan_ayah = mysql_real_escape_string($_POST['pekerjaan_ayah']);
				
				$nama_ibu = mysql_real_escape_string($_POST['nama_ibu']);
				$pekerjaan_ibu = mysql_real_escape_string($_POST['pekerjaan_ibu']);
				$penghasilan_ortu = mysql_real_escape_string($_POST['penghasilan_ortu']);
				
				$kendaraan = mysql_real_escape_string($_POST['kendaraan']);
				$foto = "";
				$keterangan = mysql_real_escape_string($_POST['keterangan']);
				
				$password = "";
				$user = "admin";
				
				$datestring = "Y-m-d H:i:s";
				$time = time();
				
				$tgl_daftar_siswa = date($datestring, $time);
				
				// $tgl_daftar_siswa = "CURRENT_TIMESTAMP";
				$tgl_ubah_siswa = "";
				
				$query = $this->db->insert("tbl_buku", array(
					"nis" => $nis,
					"nisn" => $nisn,
					"nama_depan" => $nama_depan,
					"nama_belakang" => $nama_belakang,
					"nama_panggilan" => $nama_panggilan,
					"tempat_lahir" => $tempat_lahir,
					"tanggal_lahir" => $tanggal_lahir,
					"gender" => $gender,
					"gol_darah" => $gol_darah,
					"agama" => $agama,
					"suku" => $suku,
					"status_keluarga" => $status_keluarga,
					"saudara_ke" => $saudara_ke,
					"jumlah_saudara" => $jumlah_saudara,
					"warga_negara" => $warga_negara,
					"alamat_rumah" => $alamat_rumah,
					"kode_pos" => $kode_pos,
					"telepon" => $telepon,
					"no_hp" => $no_hp,
					"jarak" => $jarak,
					
					"nama_ayah" => $nama_ayah,
					"pekerjaan_ayah" => $pekerjaan_ayah,
					
					"nama_ibu" => $nama_ibu,
					"pekerjaan_ibu" => $pekerjaan_ibu,
					"penghasilan_ortu" => $penghasilan_ortu,
					
					"kendaraan" => $kendaraan,
					"foto" => $foto,
					"keterangan" => $keterangan,
					
					"password" => $password,
					"user" => $user,
					"tgl_daftar_siswa" => $tgl_daftar_siswa,
					"tgl_ubah_siswa" => $tgl_ubah_siswa
					
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
				array('field' => 'nis', 'label' => 'NIS', 'rules' => 'required'),
				array('field' => 'nama_depan', 'label' => 'Nama Depan', 'rules' => 'required'),
				array('field' => 'tempat_lahir', 'label' => 'Tempat Lahir', 'rules' => 'required'),
				array('field' => 'tanggal_lahir', 'label' => 'Tanggal Lahir', 'rules' => 'required'),
				array('field' => 'alamat_rumah', 'label' => 'Alamat Rumah', 'rules' => 'required'),
				array('field' => 'nama_ayah', 'label' => 'Nama Ayah', 'rules' => 'required'),
				array('field' => 'pekerjaan_ayah', 'label' => 'Pekerjaan Ayah', 'rules' => 'required'),
				array('field' => 'nama_ibu', 'label' => 'Nama Ibu', 'rules' => 'required'),
			);
			
			$this->form_validation->set_rules($config);
			
			if ($this->form_validation->run() == TRUE) {
				$nis = mysql_real_escape_string($_POST['nis']);
				$nisn = mysql_real_escape_string($_POST['nisn']);
				$nama_depan = ucwords(mysql_real_escape_string($_POST['nama_depan']));
				$nama_belakang = ucwords(mysql_real_escape_string($_POST['nama_belakang']));
				$nama_panggilan = ucwords(mysql_real_escape_string($_POST['nama_panggilan']));
				$tempat_lahir = ucwords(mysql_real_escape_string($_POST['tempat_lahir']));
				$tanggal_lahir = mysql_real_escape_string($_POST['tanggal_lahir']);
				$gender = mysql_real_escape_string($_POST['gender']);
				$gol_darah = mysql_real_escape_string($_POST['gol_darah']);
				$agama = mysql_real_escape_string($_POST['agama']);
				$suku = mysql_real_escape_string($_POST['suku']);
				$status_keluarga = mysql_real_escape_string($_POST['status_keluarga']);
				$saudara_ke = mysql_real_escape_string($_POST['saudara_ke']);
				$jumlah_saudara = mysql_real_escape_string($_POST['jumlah_saudara']);
				$warga_negara = mysql_real_escape_string($_POST['warga_negara']);
				$alamat_rumah = mysql_real_escape_string($_POST['alamat_rumah']);
				$kode_pos = mysql_real_escape_string($_POST['kode_pos']);
				$telepon = mysql_real_escape_string($_POST['telepon']);
				$no_hp = mysql_real_escape_string($_POST['no_hp']);
				$jarak = mysql_real_escape_string($_POST['jarak']);
				
				$nama_ayah = ucwords(mysql_real_escape_string($_POST['nama_ayah']));
				$pekerjaan_ayah = mysql_real_escape_string($_POST['pekerjaan_ayah']);
				
				
				$nama_ibu = ucwords(mysql_real_escape_string($_POST['nama_ibu']));
				$pekerjaan_ibu = mysql_real_escape_string($_POST['pekerjaan_ibu']);
				$penghasilan_ortu = mysql_real_escape_string($_POST['penghasilan_ortu']);
				
				$kendaraan = mysql_real_escape_string($_POST['kendaraan']);
				$foto = "";
				$keterangan = mysql_real_escape_string($_POST['keterangan']);
				
				$password = "";
				$user = "admin";
				// $tgl_daftar_siswa = "";
				
				$datestring = "Y-m-d H:i:s";
				$time = time();
				
				$tgl_ubah_siswa = date($datestring, $time);
				// $tgl_ubah_siswa = "NOW( )";
				
				
				$sqlupdate="UPDATE tbl_buku SET 
					nisn = '".$nisn."',
					nama_depan = '".$nama_depan."',
					nama_belakang = '".$nama_belakang."',
					nama_panggilan = '".$nama_panggilan."',
					tempat_lahir = '".$tempat_lahir."',
					tanggal_lahir = '".$tanggal_lahir."',
					gol_darah = '".$gol_darah."',
					agama = '".$agama."',
					suku = '".$suku."',
					status_keluarga = '".$status_keluarga."',
					saudara_ke = '".$saudara_ke."',
					jumlah_saudara = '".$jumlah_saudara."',
					warga_negara = '".$warga_negara."',
					alamat_rumah = '".$alamat_rumah."',
					kode_pos = '".$kode_pos."',
					telepon = '".$telepon."',
					no_hp = '".$no_hp."',
					jarak = '".$jarak."',
					
					nama_ayah = '".$nama_ayah."',
					pekerjaan_ayah = '".$pekerjaan_ayah."',
					
					
					nama_ibu = '".$nama_ibu."',
					pekerjaan_ibu = '".$pekerjaan_ibu."',
					penghasilan_ortu = '".$penghasilan_ortu."',
					
					kendaraan = '".$kendaraan."',
					foto = '".$foto."',
					
					password = '".$password."',
					keterangan = '".$keterangan."',
					
					tgl_ubah_siswa = '".$tgl_ubah_siswa."'
					
					
					WHERE nis='".$nis."'";
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