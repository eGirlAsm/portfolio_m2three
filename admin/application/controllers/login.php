<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login extends CI_Controller {





	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -  

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in 

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see http://codeigniter.com/user_guide/general/urls.html

	 */

	function __construct()

	{

		parent::__construct();

		$this->load->library('session');

		$this->load->helper('form');

		

	}

	

	public function index()

	{

		$temp['error']="";

		$this->load->view('root/login',$temp);

	}

	

	public function check_login()

	{
		
		$username=$this->input->post('UserName');

		$userpass=$this->input->post('Password');

		$where['username']=$username;

		$where['userpass']= md5($userpass);
		$table="admin";

	

		$query=$this->db->get_where($table,$where);

		$num=$query->num_rows();



		if($num>0)

		{

			$this->session->set_userdata(array('manager'=>$username));

			redirect('main');

		}

		else

		{

			$temp['error']="用户名密码错误";

			$this->load->view('root/login',$temp);

		}

	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */