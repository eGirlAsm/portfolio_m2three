<?php

class Space extends CI_Controller {

var $data; 

	function __construct()

	{

		parent::__construct();
		
		$this->load->library('fx_auth');
		$this->load->helper('html');
		
		$this->data['nav'] = '블로그';

	 	$this->data['title'] = $this->data['nav'].$this->config->item('title');

	 	$this->data['user_status'] = $this->fx_auth->is_logged_in();

		

		if ($this->fx_auth->is_logged_in()) {									// logged in

			$this->data['username'] = $this->fx_auth->get_username();

			$this->data['userid'] = $this->fx_auth->get_user_id();

		}

	}

 

 function index()
 {
  	$this->load->view('space/index',$this->data);

 }

 function main()
 {
  	$this->load->view('space/main',$this->data);

 }
 function infocenter()
 {
  	$this->load->view('space/infocenter',$this->data);

 }
}

?>