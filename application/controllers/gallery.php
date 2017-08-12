<?php

class Gallery extends CI_Controller {

var $data; 

	function __construct()

	{

		parent::__construct();
		
		$this->load->library('fx_auth');
		 $this->load->helper(array('form', 'url'));
		$this->load->helper('html');
		$this->data['nav'] = '갤러리';

	 	$this->data['title'] = $this->data['nav'].$this->config->item('title');

	 	$this->data['user_status'] = $this->fx_auth->is_logged_in();

		

		

		if ($this->fx_auth->is_logged_in()) {									// logged in

			$this->data['username'] = $this->fx_auth->get_username();

			$this->data['userid'] = $this->fx_auth->get_user_id();

		}
		$this->data['css'] = 1;
		$this->data['cssfile'] = 'gallery.css';

	}

 

 function index()
 {
	 $this->load->library('pager'); 
	$list = $this->pager->init('m23_gallery',100)->ar();
		//取得地址上的第三个参数
	$current = $this->uri->segment(3); 
	$this->data['g_list'] = $list->query;
	$this->data['current'] = $current;
		
	$this->data['error'] = '';
  	$this->load->view('gallery/index',$this->data);

 }
 
 
 function do_upload()
 {
	 if ($this->fx_auth->is_logged_in()) {									// logged in
	  $config['upload_path'] = './uploads/';
	  $config['allowed_types'] = 'gif|jpg|jpeg|png';
	  $config['max_size'] = '1000';
	  $config['max_width']  = '10240';
	  $config['max_height']  = '7680';
	  $data['error'] = '';
	  $this->load->library('upload', $config);
	  if ( ! $this->upload->do_upload())
	  {
	   $error = array('error' => $this->upload->display_errors(),'css'=>'1','cssfile'=>'gallery.css','user_status'=>$this->fx_auth->is_logged_in());
	   $this->load->view('gallery/index', $error);
	  } 
	  else
	  {
	   $data = array('upload_data' => $this->upload->data(),'css'=>'1','cssfile'=>'gallery.css','user_status'=>$this->fx_auth->is_logged_in(),'error'=>'','username'=>$this->fx_auth->get_username());
	   $this->load->helper('array');
	   $sql = array(
		   'image' => base_url().'uploads/'.$data['upload_data']['file_name'] ,
		   'author' =>  $this->fx_auth->get_username(),
		   'client_ip' =>  "123.123.123.123.",
		   'content' => $this->input->post('content'),
		   'creattime' =>  date('Y-m-d H:i:s')
		);
	   $this->db->insert('m23_gallery', $sql);
	   
	$this->load->library('pager'); 
	$list = $this->pager->init('m23_gallery',100)->ar();
		//取得地址上的第三个参数
	$current = $this->uri->segment(3); 
	$data['g_list'] = $list->query;
	$data['current'] = $current;
	   
	   $this->load->view('gallery/index', $data);
	  }
	}
	else
	{
		redirect('auth/login');
	}
 } 


}

?>