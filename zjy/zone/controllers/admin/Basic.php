<?php
/**
 * Name: /zone/front/index.php
 * Author: zhujinyu
 * Description: 首页
 * */
class Basic extends CI_Controller{
	/**
	 * 构造函数
	 */
	public function __construct() {
		parent::__construct();
		if(!$_COOKIE['login']){
			redirect(base_url('admin/join/index'));
		}
	}
	public function index(){
		$this->load->view('admin/basic/index');
	}
	public function comments(){
		 $this->load->view('admin/basic/comments');
	}
	public function column(){
		/*获取数据库表数据*/
		$query = $this->db->get('column')->result_array();
		$data['info']=$query;
		$this->load->view('admin/basic/column',$data);
	}
	public function column_add(){
		$this->load->view('admin/basic/column_add');
	}
	public function column_modify(){
		$id=$this->uri->segment(5);
		$arr=array('id'=>$id);
		$this->db->where($arr);
		$query = $this->db->get('classify');
		$result = $query->result_array();
		$data=$result[0];
		$this->load->view('admin/basic/column_modify',$data);
	}
	public function ajax_columnadd(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');	
		if(empty($_POST['name']) || empty($_POST['rank'])){ 
			$data['status']=false;
			$data['message'] = '请填写栏目名和排序号';
			echo json_encode($data);
			exit;
		}
		$arr=array('name'=>$_POST['name']); 
		$query = $this->db->get_where("column",$arr);
		$user_info=$query->row_array(); 
		if(!empty($user_info)){
			$data['status']=false;
			$data['message'] = '该栏目已存在'; 
			echo json_encode($data); 
		}else{ 
			$arr=array('name'=>$_POST['name'],'rank'=>$_POST['rank'],'visible'=>$_POST['visible']);
			$this->db->insert("column",$arr);
			$data['status']=true;
			$data['message']='添加成功';
			$data['location']=base_url('admin/basic/column');
			echo json_encode($data);
		}

	}
	public function ajax_column_del(){
		$id=$_POST['id'];
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		$arr=array('id'=>$id);
		$this->db->delete("column",$arr);
		$hang=$this->db->affected_rows();
		$data['status']=true;
		if(!$hang==0){
			$data['status']=true;
			$data['message']='删除成功';
		}else{
			$data['status']=false;
			$data['message']='删除失败';
		}
		echo json_encode($data);
	}
	public function ajax_columnmodify(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		if(empty($_POST['name']) || empty($_POST['rank'])){
			$data['status']=false;
			$data['message'] = '请填写栏目名和排序号';
			echo json_encode($data);
			exit;
		}
		$arr1=array('id'=>$_POST['id']);
		$arr=array('name'=>$_POST['name'],'rank'=>$_POST['rank'],'visible'=>$_POST['visible']);
		$this->db->where($arr1)->update("classify",$arr);
		$hang=$this->db->where($arr)->affected_rows();
		if(!$hang==0){
			$data['status']=true;
			$data['message']='修改成功';
			$data['location']=base_url('admin/basic/column');
			echo json_encode($data);
		}else{
			$data['status']=false;
			$data['message']='修改失败';
			echo json_encode($data);
		}
	}
	/*标签*/
	public function tag(){
		/*获取数据库表数据*/
		$query = $this->db->get('tag')->result_array();
		$data['info']=$query;
		$this->load->view('admin/basic/tag',$data);
	}
	public function tag_add(){
		$this->load->view('admin/basic/tag_add');
	}
	public function tag_modify(){
		$id=$this->uri->segment(5);
		$arr=array('id'=>$id);
		$this->db->where($arr);
		$query = $this->db->get('tag');
		$result = $query->result_array();
		$data=$result[0];
		$this->load->view('admin/basic/tag_modify',$data);
	}
	public function ajax_tagadd(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		if(empty($_POST['name'])){
			$data['status']=false;
			$data['message'] = '请填写标签名';
			echo json_encode($data);
			exit;
		}
		$arr=array('name'=>$_POST['name']);
		$query = $this->db->get_where("tag",$arr);
		$user_info=$query->row_array();
		if(!empty($user_info)){
			$data['status']=false;
			$data['message'] = '该标签已存在';
			echo json_encode($data);
		}else{
			$arr=array('name'=>$_POST['name']);
			$this->db->insert("tag",$arr);
			$data['status']=true;
			$data['message']='添加成功';
			$data['location']=base_url('admin/basic/tag');
			echo json_encode($data);
		}

	}
	public function ajax_tag_del(){
		$id=$_POST['id'];
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		$arr=array('id'=>$id);
		$this->db->delete("tag",$arr);
		$hang=$this->db->affected_rows();
		$data['status']=true;
		if(!$hang==0){
			$data['status']=true;
			$data['message']='删除成功';
		}else{
			$data['status']=false;
			$data['message']='删除失败';
		}
		echo json_encode($data);
	}
	public function ajax_tagmodify(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		if(empty($_POST['name'])){
			$data['status']=false;
			$data['message'] = '请填写栏目名';
			echo json_encode($data);
			exit;
		}
		$arr1=array('id'=>$_POST['id']);
		$arr=$this->input->post();
		$this->db->where($arr1)->update("tag",$arr);
		$hang=$this->db->where($arr)->affected_rows();
		if(!$hang==0){
			$data['status']=true;
			$data['message']='修改成功';
			$data['location']=base_url('admin/basic/tag');
			echo json_encode($data);
		}else{
			$data['status']=false;
			$data['message']='修改失败';
			echo json_encode($data);
		}
	}
	/*标签*/
	public function personalCenter(){
		$this->load->view('admin/basic/personalCenter');
	}
	public function article(){
		/*获取数据库表数据*/
		$arr=array('isDel'=>'0');
		$query = $this->db->where($arr)->get('article')->result_array();
		$data['info']=$query;
		$this->load->view('admin/basic/article',$data);
	}
	public function article_add(){
		$query = $this->db->get('classify')->result_array();
		$data['classify']=$query;
		$list = $this->db->get('tag')->result_array();
		$data['tag']=$list;
		$this->load->view('admin/basic/article_add',$data);
	}
	public function article_modify(){
		$id=$this->uri->segment(5);
		$arr=array('id'=>$id);
		$this->db->where($arr);
		$query = $this->db->get('article');
		$result = $query->result_array();
		$data=$result[0];
		$query1 = $this->db->get('classify')->result_array();
		$data['fenlei']=$query1;
		$query2 = $this->db->get('tag')->result_array();
		$data['biaoqian']=$query2;
		$this->load->view('admin/basic/article_modify',$data);
	}
	public function ajax_article_del(){
		$id=$_POST['id'];
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		$arr1=array('id'=>$_POST['id']);
		$arr=array('isDel'=>'-1');
		$this->db->where($arr1)->update("article",$arr);
//		$arr=array('id'=>$id);
//		$this->db->delete("article",$arr);
		$hang=$this->db->affected_rows();
		$data['status']=true;
		if(!$hang==0){
			$data['status']=true;
			$data['message']='删除成功';
		}else{
			$data['status']=false;
			$data['message']='删除失败';
		}
		echo json_encode($data);
	}
	public function ajax_articleadd(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		if(empty($_POST['title'])){
			$data['status']=false;
			$data['message'] = '标题不可为空';
			$data['ss'] = $this->input->post();
			echo json_encode($data);
			exit;
		}
		$arr=array('title'=>$_POST['title']);
		$query = $this->db->get_where("article",$arr);
		$user_info=$query->row_array();
		if(!empty($user_info)){
			$data['status']=false;
			$data['message'] = '该标题已存在';
			echo json_encode($data);
		}else{
//			$arr1=array('title'=>$_POST['title'],'classify'=>$_POST['classify'],'isthumb'=>$_POST['isthumb'],'isIndex'=>$_POST['isIndex'],'thumb'=>$_POST['thumb'],'content'=>$_POST['content']);
			$arr1=$this->input->post();
			$this->db->insert("article",$arr1);
			$data['status']=true;
			$data['location']=base_url('admin/basic/article');
			$data['message']='添加成功';
			echo json_encode($data);
		}

	}
	public function ajax_article_modify(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		if(empty($_POST['title']) || empty($_POST['content'])){
			$data['status']=false;
			$data['message'] = '标题和内容不得为空';
			echo json_encode($data);
			exit;
		}
		$arr1=array('id'=>$_POST['id']);
		$updateTime=date('Y-m-d H:i:s');
//		$arr=array('title'=>$_POST['title'],'classify'=>$_POST['classify'],'isthumb'=>$_POST['isthumb'],'isIndex'=>$_POST['isIndex'],'thumb'=>$_POST['thumb'],'content'=>$_POST['content'],'updateTime'=>$updateTime);
		$arr=$this->input->post();
		$this->db->where($arr1)->update("article",$arr);
		$hang=$this->db->where($arr)->affected_rows();
		if(!$hang==0){
			$data['status']=true;
			$data['message']='修改成功';
			$data['location']=base_url('admin/basic/article');
			echo json_encode($data);
		}else{
			$data['status']=false;
			$data['message']='修改失败';
			echo json_encode($data);
		}
	}

	public function classify(){
		/*获取数据库表数据*/
		$query = $this->db->get('classify')->result_array();
		$data['info']=$query;
		$this->load->view('admin/basic/classify',$data);
	}
	public function ajax_classify_del(){
		$id=$_POST['id'];
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		$arr=array('id'=>$id);
		$this->db->delete("classify",$arr);
		$hang=$this->db->affected_rows();
		$data['status']=true;
		if(!$hang==0){
			$data['status']=true;
			$data['message']='删除成功';
		}else{
			$data['status']=false;
			$data['message']='删除失败';
		}
		echo json_encode($data);
	}
	public function ajax_classifyadd(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');	
		if(empty($_POST['name'])){ 
			$data['status']=false;
			$data['message'] = '请填写栏目名';
			echo json_encode($data);
			exit;
		}
		$arr=array('name'=>$_POST['name']); 
		$query = $this->db->get_where("classify",$arr);
		$user_info=$query->row_array(); 
		if(!empty($user_info)){
			$data['status']=false;
			$data['message'] = '该栏目已存在'; 
			echo json_encode($data); 
		}else{ 
			$arr=array('name'=>$_POST['name']);
			$this->db->insert("classify",$arr);
			$data['status']=true;
			$data['message']='添加成功';
			echo json_encode($data);
		}

	}
	public function ajax_classifynmodify(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');	
		if(empty($_POST['name'])){ 
			$data['status']=false;
			$data['message'] = '请填写栏目名';
			echo json_encode($data);
			exit;
		}
		$arr1=array('id'=>$_POST['id']);
		$arr=array('name'=>$_POST['name']);
		$this->db->where($arr1)->update("classify",$arr);
		$hang=$this->db->where($arr)->affected_rows();
		if(!$hang==0){
			$data['status']=true;
			$data['message']='修改成功';
			echo json_encode($data);
		}else{
			$data['status']=false;
			$data['message']='修改失败';
			echo json_encode($data);
		}
	}
	public function user(){
		/*获取数据库表数据*/
		$query = $this->db->get('member')->result_array();
		$data['info']=$query;
		$this->load->view('admin/basic/user',$data);
	}
	public function ajax_user_del(){
		$id=$_POST['id'];
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		$arr=array('id'=>$id);
		$this->db->delete("member",$arr);
		$hang=$this->db->affected_rows();
		$data['status']=true;
		if(!$hang==0){
			$data['status']=true;
			$data['message']='删除成功';
		}else{
			$data['status']=false;
			$data['message']='删除失败';
		}
		echo json_encode($data);
	}
}
?>