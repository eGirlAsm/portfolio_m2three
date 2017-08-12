<?php
class Lovedate extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->library('fx_auth');
	}
 
 function index()
 {
	 $data['nav'] = '데이트|모임';
	 $data['title'] = '엠투쓰리 :: ,엠투쓰리';
	 	 $data['user_status'] = $this->fx_auth->is_logged_in();
		
		
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$data['username'] = $this->fx_auth->get_username();
			$data['userid'] = $this->fx_auth->get_user_id();
		}
  	$this->load->view('Lovedate/index',$data);
 }
}
?>