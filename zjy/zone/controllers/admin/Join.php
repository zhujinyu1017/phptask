<?php
/**
 * Name: /zone/front/index.php
 * Author: zhujinyu
 * Description: 首页
 * */
class Join extends CI_Controller{
	public function index(){
		$this->load->helper('url');
		$this->load->view('admin/Join/index');
	}
	public function ajax_login(){
		$this->load->helper('url');
		$data = array('status' => FALSE, 'message' => '系统未知错误');	
		if(empty($_POST['name']) || empty($_POST['password'])){ 
			$data['status']=false;
			$data['message'] = '请填写手机号和密码';
			echo json_encode($data);
			exit;
		}
		$arr=array('name'=>$_POST['name'],'password'=>$_POST['password']); 
		$query = $this->db->get_where("member",$arr);
		$user_info=$query->row_array(); 
		if(!empty($user_info)){
			$data['status']=true;
			$data['message'] = '登录成功'; 
			$data['location']=base_url('admin/basic/index');
			setcookie('login',1,0,'/');
			setcookie('username',$_POST['name'],0,'/');
			echo json_encode($data); 
		}else{ 
			$data['status']=FALSE;
			$data['message'] = '登录失败';
			echo json_encode($data); 
		}
	}
	public function register(){
		$this->load->helper('url');
		$this->load->view('admin/Join/register');
	}
	public function ajax_register(){
		$this->load->helper('url');
		$data = array('status' => FALSE, 'message' => '系统未知错误');	
		if(empty($_POST['name']) || empty($_POST['password'])){ 
			$data['status']=false;
			$data['message'] = '请填写手机号和密码';
			echo json_encode($data);
			exit;
		}
		$arr=array('name'=>$_POST['name']); 
		$query = $this->db->get_where("member",$arr);
		$user_info=$query->row_array(); 
		if(!empty($user_info)){
			$data['status']=false;
			$data['message'] = '该用户已存在'; 
			echo json_encode($data); 
		}else{ 
			$arr=array('name'=>$_POST['name'],'password'=>$_POST['password']);
			$this->db->insert("member",$arr);
			$data['status']=true;
			$data['message']='注册成功';
			$data['location']=base_url('admin/join/index');
			echo json_encode($data);
		}
		
	}
	public function logout(){
		setcookie('login','',time()-3600,'/');
		$this->load->view('admin/Join/index');

	}
}
?>