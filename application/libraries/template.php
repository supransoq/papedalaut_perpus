<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	protected $_ci;
	function __construct() {
		$this->_ci = &get_instance();
	}
	
	function display ($template, $data=null) {
		$data['_judulapp'] = "..:: SiPerpus ::..";
		$data['_top_panel'] = $this->_ci->load->view('template/top', $data, true);
		$data['_body_panel'] = $this->_ci->load->view($template, $data, true);
		$data['_footer_panel'] = $this->_ci->load->view('template/footer', $data, true);
		
		$this->_ci->load->view('/viewtemplate.php', $data);
	}
	
}	