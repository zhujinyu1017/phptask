<?php
/**
 * Name: /zone/mobile/index.php
 * Author: zhujinyu
 * Description: 首页
 * */
class Basic extends CI_Controller{
	public function index(){
		$this->load->view('mobile/basic/index');
		return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
	}
	public function index2(){
		$this->load->view('mobile/basic/index2');
		return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
	}
	public function comments(){
		 $this->load->view('mobile/basic/comments');
	}
	public function pen(){
		$this->load->view('mobile/basic/pen');
	}
	public function flower(){
		$this->load->view('mobile/basic/flower');
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
		$this->load->view('mobile/basic/index',$data);

	}
}
?>