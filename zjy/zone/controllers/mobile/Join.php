<?php
/**
 * Name: /zone/mobile/index.php
 * Author: zhujinyu
 * Description: 首页
 * */
class Join extends CI_Controller{
	public function index(){
		$data['title']="登录";
		$this->load->helper('url');
		$this->load->view('mobile/Join/index',$data);
	}
	public function ajax_login(){
		$this->load->helper('url');
		$data = array('status' => FALSE, 'message' => '系统未知错误');	
		if(empty($_POST['name']) || empty($_POST['password'])){ 
			$data['status']=false;
			$data['message'] = '请填写账户名和密码';
			echo json_encode($data);
			exit;
		}
		$arr=array('name'=>$_POST['name'],'pass'=>$_POST['password']);
		$query = $this->db->get_where("user",$arr);
		$user_info=$query->row_array(); 
		if(!empty($user_info)){
			$data['status']=true;
			$data['message'] = '登录成功'; 
			$data['location']=base_url('mobile/blog/index');
			echo json_encode($data); 
		}else{ 
			$data['status']=FALSE;
			$data['message'] = '登录失败';
			echo json_encode($data); 
		}
	}
	public function register(){
		$data['title']="注册";
		$this->load->helper('url');
		$this->load->view('mobile/Join/register',$data);
	}
	public function ajax_register(){
		$this->load->helper('url');
		$data = array('status' => FALSE, 'message' => '系统未知错误');	
		if(empty($_POST['name']) || empty($_POST['password'])){ 
			$data['status']=false;
			$data['message'] = '请填写账户名和密码';
			echo json_encode($data);
			exit;
		}
		$arr=array('name'=>$_POST['name']); 
		$query = $this->db->get_where("user",$arr);
		$user_info=$query->row_array(); 
		if(!empty($user_info)){
			$data['status']=false;
			$data['message'] = '该账号已存在';
			echo json_encode($data); 
		}else{ 
			$arr=array('name'=>$_POST['name'],'pass'=>$_POST['password']);
			$this->db->insert("user",$arr);
			$data['status']=true;
			$data['message']='注册成功';
			$data['location']=base_url('mobile/join/index');
			echo json_encode($data);
		}
		
	}
}
?>