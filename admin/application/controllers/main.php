<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('check');
	}
	function index()
	{
		$this->load->view('root/index');
	}
	
	function sysconfig()
	{
		$this->load->view('root/simpleinfo');
	}
	
	function drama()
	{
		$this->load->view('root/drama');
	}
}