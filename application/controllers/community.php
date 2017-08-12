<?php
class Community extends CI_Controller {
 
 var $data;
 
	function __construct()
	{
		parent::__construct();
		$this->load->library('fx_auth');
		$this->load->library('form_validation');
		$this->data['nav'] = '커뮤니티';
	    $this->data['title'] = $this->data['nav'].$this->config->item('title');
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
		$this->data['css'] = 1;
		$this->data['cssfile'] = 'community.css';
		//$this->output->enable_profiler(TRUE);
	}
 
 function index()
 {
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
  		$this->load->view('community/index',$this->data);
 }
 
 
 
 function freetalk()
 {
	 
	 	$this->data['community_category'] ="freetalk";
		$this->data['h2_class'] ="free_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_posts', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_posts',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_posts'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_posts'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_posts',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{				
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_posts', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_posts'); 
				
				$query = $this->db->get_where('m23_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
 
  function news()
 {
	 	$this->data['community_category'] ="news";
	 	$this->data['h2_class'] ="news_community";
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					$post_type="post";
					$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
					
					if(preg_match($pattern,$this->input->post('content'),$match))
					 $post_type="image";
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_type' =>  $post_type,
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_news', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_news',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_news_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_news'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
					
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_news',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
					
				$query = $this->db->get_where('m23_news', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_news'); 
				
				$query = $this->db->get_where('m23_news_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
 function advise()
 {
	 
	 	$this->data['community_category'] ="advise";
		$this->data['h2_class'] ="advise_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_advise', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_advise',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_advise_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_advise'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_advise'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_advise',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
					
				$query = $this->db->get_where('m23_advise', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_advise'); 
				
				$query = $this->db->get_where('m23_advise_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
  
 function party()
 {
	 
	 	$this->data['community_category'] ="party";
		$this->data['h2_class'] ="party_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_party', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_party',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_party_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_party'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_party'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_party',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
					
				$query = $this->db->get_where('m23_party', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_party'); 
				
				$query = $this->db->get_where('m23_party_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
  
 function writter()
 {
	 
	 	$this->data['community_category'] ="writter";
		$this->data['h2_class'] ="writter_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_writter', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_writter',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_writter_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_writter'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_writter'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_writter',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_writter', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_writter'); 
				
				$query = $this->db->get_where('m23_writter_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
   
 function friend()
 {
	 
	 	$this->data['community_category'] ="friend";
		$this->data['h2_class'] ="friend_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_friend', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_friend',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_friend_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_friend'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_friend'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_friend',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id

				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_friend', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_friend'); 
				
				$query = $this->db->get_where('m23_friend_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
 
  function recommand()
 {
	 
	 	$this->data['community_category'] ="recommand";
		$this->data['h2_class'] ="recommand_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_recommand', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_recommand',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_recommand_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_recommand'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_recommand'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_recommand',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_recommand', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_recommand'); 
				
				$query = $this->db->get_where('m23_recommand_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
  function popular()
 {
	 
	 	$this->data['community_category'] ="popular";
		$this->data['h2_class'] ="popular_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_popular', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_popular',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_popular_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_popular'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_popular'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_popular',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_popular', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_popular'); 
				
				$query = $this->db->get_where('m23_popular_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
 
 function music()
 {
	 
	 	$this->data['community_category'] ="music";
		$this->data['h2_class'] ="music_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_music', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_music',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_music_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_music'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_music'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_music',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_music', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_music'); 
				
				$query = $this->db->get_where('m23_music_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
 
   function movie()
 {
	 
	 	$this->data['community_category'] ="movie";
		$this->data['h2_class'] ="movie_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_movie', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_movie',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_movie_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_movie'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_movie'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_movie',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_movie', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_movie'); 
				
				$query = $this->db->get_where('m23_movie_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
   function drama()
 {
	 
	 	$this->data['community_category'] ="drama";
		$this->data['h2_class'] ="drama_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_drama', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_drama',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_drama_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_drama'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_drama'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_drama',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_drama', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_drama'); 
				
				$query = $this->db->get_where('m23_drama_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
 
   function tvshow()
 {
	 
	 	$this->data['community_category'] ="tvshow";
		$this->data['h2_class'] ="tvshow_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_tvshow', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_tvshow',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_tvshow_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_tvshow'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_tvshow'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_tvshow',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_tvshow', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_tvshow'); 
				
				$query = $this->db->get_where('m23_tvshow_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
   function cartoon()
 {
	 
	 	$this->data['community_category'] ="cartoon";
		$this->data['h2_class'] ="cartoon_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_cartoon', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_cartoon',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_cartoon_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_cartoon'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_cartoon'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_cartoon',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');				
				
				$query = $this->db->get_where('m23_cartoon', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_cartoon'); 
				
				$query = $this->db->get_where('m23_cartoon_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
 
   function picbook()
 {
	 
	 	$this->data['community_category'] ="picbook";
		$this->data['h2_class'] ="picbook_community";
	 			
		$this->data['user_status'] = $this->fx_auth->is_logged_in();
	
		if ($this->fx_auth->is_logged_in()) {									// logged in
			$this->data['username'] = $this->fx_auth->get_username();
			$this->data['userid'] = $this->fx_auth->get_user_id();
		}
		if($this->input->get("action") == "new_post"){
			if ($this->fx_auth->is_logged_in()) {									// logged in
				$this->load->view('community/newpost',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "commit"){ //提交新的帖子的时候
			if ($this->fx_auth->is_logged_in()) {									// logged in
				
				//提交文章
				//$this->form_validation->set_rules('subject', 'title', 'required|xss_clean');
				//$this->form_validation->set_rules('content', 'content', 'required|xss_clean');
				//if ($this->form_validation->run())
				{
					
					$sql = array(
					   'post_title' => $this->input->post('subject'),
					   'post_content' =>  $this->input->post('content'),
					   'post_author_IP' =>  "123.123.123.123.",
					   'post_author' => $this->fx_auth->get_username(),
					   'post_date' =>  date('Y-m-d H:i:s')
					);
		
					$this->db->insert('m23_picbook', $sql);
				}
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_picbook',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "new_comment"){ //提交新的评论的时候
	
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
	
				$this->db->insert('m23_picbook_comments', $sql);
				
				$this->db->set('comment_count','comment_count+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_picbook'); 
				// 生成: INSERT INTO mytable (name) VALUES ('{$name}')
			}
			else
			{
				redirect('/auth/login/');
			}
		}
		else if($this->input->get("action") == "recommand"){ //提交新的评论的时候
				$this->db->set('post_recommand','post_recommand+1',FALSE); 
				$this->db->where('id',$this->input->post('postid'));
				$this->db->update('m23_picbook'); 
		}
	 	else{
			if ($this->uri->segment(3) === FALSE) //帖子列表的时候
			{
				$this->load->library('pager'); 
				$list = $this->pager->init('m23_picbook',30)->ar();
				//取得地址上的第三个参数
				$current = $this->uri->segment(3); 
				$this->data['postlist'] = $list->query;
				$this->data['current'] = $current;
				$this->load->view('community/list',$this->data);
			}
			else //帖子内容的时候
			{
				$postid = $this->uri->segment(3); //点击的帖子id
				
				if(is_numeric($postid) == FALSE) //防止恶意数字连接
	 	 			redirect('errors/index');
				
				$query = $this->db->get_where('m23_picbook', array('id' => $postid));
				$this->data['postlist'] = $query;
				
				$this->db->set('view_count','view_count+1',FALSE); 
				$this->db->where('ID',$postid);
				$this->db->update('m23_picbook'); 
				
				$query = $this->db->get_where('m23_picbook_comments', array('comment_post_ID' => $postid));
				$this->data['comment_list'] = $query;
				
				$this->load->view('community/view',$this->data);
			}
		}
 }
 
 
 function view($postid)
 {
	 if(!is_numeric($postid))
	 	 $this->load->view('errors/index');
	 
	 //这里查询postid相应的数据库
	 
	 $data['nav'] = '커뮤니티';
	 $data['title'] = '엠투쓰리 :: ,엠투쓰리';
	 $data['user_status'] = $this->fx_auth->is_logged_in();
		
		
	if ($this->fx_auth->is_logged_in()) {									// logged in
		$data['username'] = $this->fx_auth->get_username();
		$data['userid'] = $this->fx_auth->get_user_id();
	}
	
	$data['postid'] = $postid;
	
  	 $this->load->view('community/view',$data);
 }
 
}
?>