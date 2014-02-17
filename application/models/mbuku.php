<?php

class mbuku extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	//Untuk Tampilkan Data
	function getbuku($start, $perpage,$where=null){
		
		$sql="SELECT * FROM tbl_buku $where ORDER BY tgl_daftar_buku DESC limit $start, $perpage" ;
		$result=$this->db->query($sql)->result_array();
		return $result;
		
	}
	//Untuk Cari Data
	function getbukunumrow($where){
		
		$sql="SELECT * FROM tbl_buku $where ";
		$result=$this->db->query($sql)->num_rows();
		return $result;
		
	}
	
	//Untuk Edit dan Hapus Data
	function getbukubyid($id){
		
		$sql="SELECT * FROM tbl_buku WHERE kode_buku='".$id."'";
		$result=$this->db->query($sql)->result_array();
		return $result[0];
	}
}