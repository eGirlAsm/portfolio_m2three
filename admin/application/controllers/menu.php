<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		//$this->load->model('check');
	}
	function top()
	{
		$temp['username']=$this->session->userdata('manager');
		$this->load->view('root/TaskTop',$temp);
	}
	function main()
	{
		$this->load->view('root/simpleinfo');
	}
	function left()
	{
		$this->load->view('root/menu/index');
	}
	
	function systemMenu()
	{
		$this->load->view('root/menu/system');
	}
	
	function user()
	{
		$this->load->view('root/menu/user');
	}
	function mission()
	{
		$this->load->view('root/menu/mission');
	}	
	function content()
	{
		$this->load->view('root/menu/content');
	}
	function plugin()
	{
		$this->load->view('root/menu/plugin');
	}
	function app()
	{
		$this->load->view('root/menu/app');
	}	
}