<?php
class Mypage extends CI_Controller {
 
	var $data;
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('fx_auth');
		$this->load->helper('date');
		$this->data['nav'] = '처음으로';
	    $this->data['title'] = $this->data['nav'].$this->config->item('title');
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['user_status'] = TRUE;
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		else
		{
			$this->data['user_status'] = FALSE;
			redirect('/auth/login/');
		}
		$this->data['css'] = 1;
		$this->data['cssfile'] = 'mypage.css';
	}
 
 function index()
 {
  		$this->load->view('mypage/index',$this->data);
 }
 
 function new_msg()
 {
	 	$this->load->view('mypage/new_msg',$this->data); 
 }
 function message()
 {
	 	$this->load->view('mypage/message',$this->data); 
 }
}
?>