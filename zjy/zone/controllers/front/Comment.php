<?php
/**
 * Name: /zone/Blog.php
 * Author: zhujinyu
 * Description: 首页
 * */
class Comment extends CI_Controller{
	// global $uid=20;
	public function index(){
		$query = $this->db->get('comment');
		$data['comment']='45454545';
        $data['title'] = "奈何";
        $this->config->load('zone');
		$this->load->view('front/comment/index',$data);

	}
	public function comments(){
		 echo 'Look at this!';
	}
	public function ajax_login(){
		
	}
}
?>