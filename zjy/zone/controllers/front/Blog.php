<?php
/**
 * Name: /zone/Blog.php
 * Author: zhujinyu
 * Description: 首页
 * */
class Blog extends CI_Controller{
	public function index(){
		$query = $this->db->get('column');
		$data['session_name']= array();
		foreach ($query->result() as $row)
		{
			array_push($data['session_name'], $row->name);
		}
        $data['title'] = "奈何";
        $this->config->load('zone');
		$this->load->view('front/blog/index',$data);

	}
	public function comments(){
		 echo 'Look at this!';
	}
	public function ajax_login(){
		
	}
}
?>