<?php
class root extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->library('fx_auth');
	}
 
 function index()
 {
  	 $this->load->view('root/index');
 }
}
?>