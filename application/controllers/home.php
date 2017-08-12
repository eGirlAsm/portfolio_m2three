<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
var $data;
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url','text'));
		$this->load->helper(array('fmtime'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('fx_auth');
		$this->load->library('detect');
		
		$this->data['nav'] = '처음으로';
		$this->data['title'] = '엠투쓰리 :: 만남의 시작,중국조선족 BBS';
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
		$this->data['css'] = 1;
		$this->data['cssfile'] = 'index.css';
		
	}
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
	public function index()
	{

		
		$this->load->library('pager'); 
		$list = $this->pager->init('m23_job',12)->ar();
		//取得地址上的第三个参数
		$this->data['joblist'] = $list->query;
		
		$list = $this->pager->init('m23_weibo',10)->ar();
		//取得地址上的第三个参数
		$this->data['weibo'] = $list->query;


		$list = $this->pager->init('m23_news',6)->ar();
		//取得地址上的第三个参数
		$this->data['news'] = $list->query;
		
		$list = $this->pager->init('m23_posts',18)->ar();
		//取得地址上的第三个参数
		$this->data['allposts'] = $list->query;

		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		} elseif ($this->fx_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');
		} else {
			$this->data['login_by_username'] = ($this->config->item('login_by_username', 'fx_auth') AND
			$this->config->item('use_username', 'fx_auth'));
			$data['login_by_email'] = $this->config->item('login_by_email', 'fx_auth');
			
			
			$this->form_validation->set_rules('username', 'Login', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('id_cookie', 'Remember me', 'integer');
			
			// Get login for counting attempts to login
			if ($this->config->item('login_count_attempts', 'fx_auth') AND
					($login = $this->input->post('login'))) {
				$login = $this->security->xss_clean($login);
			} else {
				$login = '';
			}
			
			
			if ($this->form_validation->run()) {								// validation ok
			if ($this->fx_auth->login(
					$this->form_validation->set_value('username'),
					$this->form_validation->set_value('password'),
					$this->form_validation->set_value('id_cookie'),
					$this->data['login_by_username'],
					$this->data['login_by_email'])) {								// success
					redirect('');

				} else {
					$errors = $this->fx_auth->get_error_message();
					if (isset($errors['banned'])) {								// banned user
						$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

					} elseif (isset($errors['not_activated'])) {				// not activated user
						redirect('/auth/send_again/');

					} else {													// fail
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
			}

		}
		
		
		$this->load->view('home/index',$this->data);
		
	}
	function weibo()
	{
		if ($this->fx_auth->is_logged_in()) {									// logged in

			$this->form_validation->set_rules('hopeNote', 'content', 'trim|required|xss_clean');

			if ($this->form_validation->run()) {								// validation ok
					
					$device;
					if($this->detect->isiOS())//return boolen True or False
						$device= "iPhone";
					else if($this->detect->isAndroidOS)
						$device = "Android";
					else 
						$device = "";	
						
					$data = array(
					   'author' => $this->fx_auth->get_username(),
					   'content' => $this->input->post('hopeNote'),
					   'creattime' => date("Y-m-d H:i:s" ,time()) ,
            		);
					$this->db->insert('m23_weibo', $data); 
			}

			redirect('');
		}
		else
		{
			redirect('/auth/login/');
		}
	}
	/**
	 * Login user on the site
	 *
	 * @return void
	 */
	function login()
	{
		if ($this->fx_auth->is_logged_in()) {									// logged in
			redirect('');
		} elseif ($this->fx_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');
		} else {
			$this->data['login_by_username'] = ($this->config->item('login_by_username', 'fx_auth') AND
					$this->config->item('use_username', 'fx_auth'));
			$this->data['login_by_email'] = $this->config->item('login_by_email', 'fx_auth');

			$this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('remember', 'Remember me', 'integer');

			// Get login for counting attempts to login
			if ($this->config->item('login_count_attempts', 'fx_auth') AND
					($login = $this->input->post('login'))) {
				$login = $this->security->xss_clean($login);
			} else {
				$login = '';
			}

			$this->data['use_recaptcha'] = $this->config->item('use_recaptcha', 'fx_auth');
			if ($this->fx_auth->is_max_login_attempts_exceeded($login)) {
				if ($this->data['use_recaptcha'])
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				else
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
			}
			$this->data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->fx_auth->login(
						$this->form_validation->set_value('login'),
						$this->form_validation->set_value('password'),
						$this->form_validation->set_value('remember'),
						$this->data['login_by_username'],
						$this->data['login_by_email'])) {								// success
					redirect('');

				} else {
					$errors = $this->fx_auth->get_error_message();
					if (isset($errors['banned'])) {								// banned user
						$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

					} elseif (isset($errors['not_activated'])) {				// not activated user
						redirect('/auth/send_again/');

					} else {													// fail
						foreach ($errors as $k => $v)	$this->data['errors'][$k] = $this->lang->line($v);
					}
				}
			}
			$this->data['show_captcha'] = FALSE;
			if ($this->fx_auth->is_max_login_attempts_exceeded($login)) {
				$this->data['show_captcha'] = TRUE;
				if ($this->data['use_recaptcha']) {
					$this->data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$this->data['captcha_html'] = $this->_create_captcha();
				}
			}
			$this->load->view('auth/login_form', $this->data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */