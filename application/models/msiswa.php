<?php

class msiswa extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	//Untuk Tampilkan Data
	function getsiswa($start, $perpage,$where=null){
		
		$sql="SELECT * FROM tbl_siswa $where ORDER BY tgl_daftar_siswa DESC limit $start, $perpage" ;
		$result=$this->db->query($sql)->result_array();
		return $result;
		
	}
	//Untuk Cari Data
	function getsiswanumrow($where){
		
		$sql="SELECT * FROM tbl_siswa $where ";
		$result=$this->db->query($sql)->num_rows();
		return $result;
		
	}
	
	//Untuk Edit dan Hapus Data
	function getsiswabyid($id){
		
		$sql="SELECT * FROM tbl_siswa WHERE nis='".$id."'";
		$result=$this->db->query($sql)->result_array();
		return $result[0];
	}
}