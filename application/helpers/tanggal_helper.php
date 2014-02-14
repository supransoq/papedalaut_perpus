<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tanggal')) {
	function tanggal($var = '') {
		$tgl = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$pecah = explode("-", $var);
		return $pecah[2]." ".$tgl[$pecah[1] - 1]." ".$pecah[0];
	}
}

if ( ! function_exists('is_date_valid')) {
	function is_date_valid($datein) {
		if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $datein)){
			return true;
		}else{
			return false;
		}
	}
}