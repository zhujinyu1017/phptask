<?php  
class Test extends CI_Controller {  
  function Test(){  
    parent::__construct();  
  }  
  function index(){  
    $this->load->helper('form');  
    $data['title'] = "首页";  
    $data['headline'] = "录入用户信息";  
    //多维数组  
    $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');  
    //$this->load->vars($data);  
    $this->load->model('mtest');  
    $data['query1'] = $this->mtest->get_last_ten_entries();  
    $this->load->view('users',$data);  
    //$this->load->view('newfile');  
    //$this->load->view('a/newfile');  
}  
}  
?>