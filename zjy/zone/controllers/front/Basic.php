<?php
/**
 * Name: /zone/front/index.php
 * Author: zhujinyu
 * Description: 首页
 * */
class Basic extends CI_Controller{
	public function index(){
		$this->load->view('front/basic/index');
	}
	public function comments(){
		 $this->load->view('front/basic/comments');
	}
	public function pen(){
		$this->load->view('front/basic/pen');
	}
	public function flower(){
		$this->load->view('front/basic/flower');
	}
	public function ajax_login(){
		$name = trim($this->input->post('name'));
		$password = trim($this->input->post('password'));
		if (empty($name) || empty($password)) {
			$data['message'] = '请填写用户名和密码';
			$this->output->set_content_type('application/json')->_display(json_encode($data));
			exit;
		}
		$status = $this->GetMember->verify_member($name, $password);
		$this->load->model('GetMember');
		$data['member'] = $this->GetMember->insert_member();
		$this->load->view('front/basic/index',$data);

	}
}
?>