<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller
{
	var $data;
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('fx_auth');
		$this->data['nav'] = '처음으로';
	    $this->data['title'] = '사이트소개'.$this->config->item('title');
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['user_status'] = TRUE;
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		else
		{
			$this->data['user_status'] = FALSE;
		}
	}

	function index()
	{
			$this->load->view('about',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */