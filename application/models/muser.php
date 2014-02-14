<?php

class muser extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	//Untuk Tampilkan Data
	function getuser($start, $perpage,$where=null){
		
		$sql="SELECT * FROM tbl_user $where ORDER BY  tgl_daftar DESC limit $start, $perpage" ;
		$result=$this->db->query($sql)->result_array();
		return $result;
		
	}
	//Untuk Cari Data
	function getusernumrow($where){
		
		$sql="SELECT * FROM tbl_user $where ";
		$result=$this->db->query($sql)->num_rows();
		return $result;
		
	}
	
	//Untuk Edit dan Hapus Data
	function getuserbyid($id){
		
		$sql="SELECT * FROM tbl_user WHERE username='".$id."'";
		$result=$this->db->query($sql)->result_array();
		return $result[0];
	}
}