<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class errors extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url','text'));
	}

	function index()
	{
		$this->load->view('errors/index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */