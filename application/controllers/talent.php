<?php
class Talent extends CI_Controller {
 
	var $data;
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('fx_auth');
		$this->load->helper('date');
		$this->data['nav'] = '정보광장';
	    $this->data['title'] = $this->data['nav'].$this->config->item('title');
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['user_status'] = TRUE;
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		else
		{
			$this->data['user_status'] = FALSE;
		}
		$this->data['css'] = 1;
		$this->data['cssfile'] = 'talent.css';
	}
 
 function index()
 {
		$this->load->library('pager'); 
		$list = $this->pager->init('m23_talent',30)->ar();
		//取得地址上的第三个参数
		$current = $this->uri->segment(3); 
		$this->data['list'] = $list->query;
		$this->data['current'] = $current;
		


  		$this->load->view('talent/index',$this->data);
		
 }
 
 
  function view($id)
 {
	 	$query = $this->db->get_where('m23_job', array('id' => $id));
		$this->data['qr_list'] = $query;
		
		$query = $this->db->get_where('m23_job_comments', array('comment_post_ID' => $id));
		$this->data['comment_list'] = $query;

		$this->db->set('viewcount','viewcount+1',FALSE); 
		$this->db->where('id',$id);
		$this->db->update('m23_job'); 

  		$this->load->view('job/view',$this->data);
	
 }
 
 function newjob()
 {

		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->load->view('job/newjob',$this->data);
		}
		else
		{
			redirect('/auth/login/');
		}
		
 }
 
 function newcom()
 {
		if ($this->fx_auth->is_logged_in()) {									// logged in

			$this->load->view('job/newcom',$this->data);
		}
		else
		{
			redirect('/auth/login/');
		}
		
		
  
 }
 
 
  function newcomment()
 {
			
		$this->form_validation->set_rules('comments', 'comments', 'required|xss_clean');
			
		if ($this->form_validation->run())
		{
			
			$sql = array(
			   'comment_post_ID' => $this->input->post('postid'),
			   'comment_content' =>  $this->input->post('comments'),
			   'comment_author_IP' =>  "123.123.123.123.",
			   'comment_author' => $this->fx_auth->get_username(),
			   'comment_parent' =>  $this->input->post('comment_parent'),
			   'comment_date' =>  date('Y-m-d H:i:s')
			);

			$this->db->insert('m23_job_comments', $sql);
			
			$this->db->set('comment_count','comment_count+1',FALSE); 
			$this->db->where('id',$this->input->post('postid'));
			$this->db->update('m23_job'); 
			// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
		}
		else
		{
			redirect('/auth/login/');
		}
 }
 
  function select()
 {
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->load->view('job/select',$this->data);
		}
		else
		{
			redirect('/auth/login/');
		}
		
		
  
 }
  function consumer()
 {
		if ($this->fx_auth->is_logged_in()) {									// logged in
		
			$this->form_validation->set_rules('job_title', 'Title', 'required|xss_clean');
			$this->form_validation->set_rules('type', 'jobtype', 'required|xss_clean');
			$this->form_validation->set_rules('addr_prv', 'cityarea', 'required|xss_clean');
			$this->form_validation->set_rules('salary', 'salary', 'required|xss_clean');
			$this->form_validation->set_rules('education', 'education', 'required|xss_clean');
			$this->form_validation->set_rules('experience', 'experience', 'required|xss_clean');
			$this->form_validation->set_rules('people', 'people-count', 'required|xss_clean');
			$this->form_validation->set_rules('description', 'content', 'required|xss_clean');
			
			if ($this->form_validation->run())
		    {
				
				$sql = array(
				   'title' => $this->input->post('job_title'),
				   'type' =>  $this->input->post('type'),
				   'area' =>  $this->input->post('addr_prv'),
				   'salary' =>  $this->input->post('salary'),
				   'education' =>  $this->input->post('education'),
				   'experience' =>  $this->input->post('experience'),
				   'peoplecount' =>  $this->input->post('people'),
				   'content' =>  $this->input->post('description'),
				   'author' => $this->fx_auth->get_username(),
				   'time' =>  date('Y-m-d H:i:s')
            	);

				$this->db->insert('m23_job', $sql); 

// Produces: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')
				
				
				
				redirect('/job');
		    }
		    else
		    {
				$this->load->view('job/consumer',$this->data);
		    }
		}
		else
		{
			redirect('/auth/login/');
		}
 }
 
 
}
?>