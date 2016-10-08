<?php
/**
 * Name: /zone/mobile/index.php
 * Author: zhujinyu
 * Description: 首页
 * */
class Basic extends CI_Controller{
	public function index(){
		$data['columnFooter']=1;
		$data['title']="首页";
		$arr1=array('isDel'=>'0','isthumb'=>'1','isIndex'=>'1');
		$arr2=array('isDel'=>'0','isthumb'=>'1','isIndex'=>'0');
		$query = $this->db->where($arr1)->limit(4)->order_by('updateTime','DESC')->get('article')->result_array();
		$list = $this->db->where($arr2)->order_by('updateTime','DESC')->get('article')->result_array();
		$data['info']=$query;
		$data['list']=$list;
		$this->load->view('mobile/basic/index',$data);
	}
	public function articleDetail(){
		$id=$this->uri->segment(4);
		$arr1=array('id'=>$id);
		$query = $this->db->where($arr1)->get('article')->result_array();
		$data['info']=$query;
		$data['title']=$data['info'][0]['title'];
		/*是否关注*/
		$arr2=array('articleID'=>$id);
		$query2 = $this->db->get_where("follow",$arr2);
		$user_info=$query2->row_array();
		if(!empty($user_info)){
			$data['isfollow']=true;
		}else{
			$data['isfollow']=false;
		}
		/*是否收藏*/
		$query3 = $this->db->get_where("collection",$arr2);
		$user_info3=$query3->row_array();
		if(!empty($user_info3)){
			$data['iscollection']=true;
		}else{
			$data['iscollection']=false;
		}
		$this->load->view('mobile/basic/articleDetail',$data);
	}
	public function jieda(){
		$data['columnFooter']=2;
		$classify=$this->uri->segment(4);
		$data['title']="新技术";
		$arr1=array('isDel'=>'0','isthumb'=>'1','classify'=>$classify);
		$arr2=array('isDel'=>'0','isthumb'=>'0','classify'=>$classify);
		$list1 = $this->db->where($arr1)->order_by('updateTime','DESC')->get('article')->result_array();
		$list2 = $this->db->where($arr2)->order_by('updateTime','DESC')->get('article')->result_array();
		$data['list1']=$list1;
		$data['list2']=$list2;
		$this->load->view('mobile/basic/study',$data);
	}
	public function study(){
		$data['columnFooter']=2;
		$classifyid=$this->uri->segment(4);
		$arr=array('id'=>$classifyid);
		$query = $this->db->where($arr)->get('classify')->result_array();
		$classify=$query[0]['name'];
		$data['title']="新技术";
		$arr1=array('isDel'=>'0','isthumb'=>'1','classify'=>$classify);
		$list1 = $this->db->where($arr1)->order_by('updateTime','DESC')->get('article')->result_array();
		$data['list1']=$list1;
		foreach ($list1 as $v => $a) {
			$list2 = $this->db->where(array('articleID' => $a['id']))->get('follow')->result_array();
			$total = count($list2);
			$data['list1'][$v]['followNumber'] = $total;
		}
		$this->load->view('mobile/basic/study',$data);
	}
	public function question(){
		$data['columnFooter']=3;
		$classifyid=$this->uri->segment(4);
		$arr=array('id'=>$classifyid);
		$query = $this->db->where($arr)->get('classify')->result_array();
		$classify=$query[0]['name'];
		$data['title']="疑难";
		$arr1=array('isDel'=>'0','isthumb'=>'1','classify'=>$classify);
		$list1 = $this->db->where($arr1)->order_by('updateTime','DESC')->get('article')->result_array();
		$list2=array_chunk($list1,3);
		$data['list']=$list2;
		$this->load->view('mobile/basic/question',$data);
	}
	public function test(){
		$list1=[0,1,2,3,4,5,7,8,9,10,11,12];
		$list=array_chunk($list1,3);
		print_r($list);
		$data['list2']=$list;
		$this->load->view('mobile/basic/test',$data);
	}
	public function my(){
		$data['columnFooter']=4;
		if(!empty($_COOKIE['avatar'])){
			$arr=array('id'=>$_COOKIE["uid"]);
			$query = $this->db->where($arr)->get('member')->result_array();
			$data['info']=$query;
			$data['title']=$data['info'][0]['name'];
			$data['user']=$data['info'][0];
		}
		$list1 = $this->db->get('tag')->result_array();
		$list2=array_chunk($list1,4);
		$data['list']=$list2;
		$this->load->view('mobile/basic/my',$data);
	}
	public function tag(){
		$data['columnFooter']=5;
		$tagId=$this->uri->segment(4);
		$arr1=array('id'=>$tagId);
		$arr2=array('tag'=>$tagId);
		$query1 = $this->db->where($arr1)->get('tag')->result_array();
		$data['info']=$query1;
		$data['title']=$data['info'][0]['name'];
		$list = $this->db->where($arr2)->order_by('updateTime','DESC')->get('article')->result_array();
		$data['list']=$list;
		foreach ($list as $v => $a) {
			$list2 = $this->db->where(array('articleID' => $a['id']))->get('follow')->result_array();
			$total = count($list2);
			$data['list'][$v]['followNumber'] = $total;
		}
		$this->load->view('mobile/basic/tag',$data);
	}
    public function ajax_article_store(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		if(empty($_POST['articleID'])){
			$data['status']=false;
			$data['message'] = '文章id不可为空';
			echo json_encode($data);
			exit;
		}
		$arr=array('articleID'=>$_POST['articleID']);
		$query = $this->db->get_where("Collection",$arr);
		$user_info=$query->row_array();
		if(!empty($user_info)){
			$data['status']=false;
			$data['message'] = '已收藏';
			echo json_encode($data);
		}else{
			$arr1=array('articleID'=>$_POST['articleID'],'uid'=>$_COOKIE['uid']);
			$this->db->insert("Collection",$arr1);
			$data['status']=true;
			$data['message']='添加成功';
			echo json_encode($data);
		}
	}
	public function ajax_article_guanzu(){
		$data = array('status' => FALSE, 'message' => '系统未知错误');
		if(empty($_POST['articleID'])){
			$data['status']=false;
			$data['message'] = '文章id不可为空';
			echo json_encode($data);
			exit;
		}
		$arr=array('articleID'=>$_POST['articleID']);
		$query = $this->db->get_where("follow",$arr);
		$user_info=$query->row_array();
		if(!empty($user_info)){
			$data['status']=false;
			$data['message'] = '已关注';
			echo json_encode($data);
		}else{
			$arr1=array('articleID'=>$_POST['articleID'],'uid'=>$_COOKIE['uid']);
			$this->db->insert("follow",$arr1);
			$data['status']=true;
			$data['message']='添加成功';
			echo json_encode($data);
		}
	}
	public function follow(){
		$data['columnFooter']=5;
		$data['title']="我的关注";
		$arr1=array('uid'=>$_COOKIE['uid']);
		$list1 = $this->db->where($arr1)->select('articleID')->order_by('id','DESC')->get('follow')->result_array();
		$list=array();
		foreach ($list1 as $v=>$a)
		{
			$list2 = $this->db->where(array('id'=>$a['articleID']))->get('article')->result_array();
			$data['list4']=$list2;
			array_push($list,$data['list4'][0]);
		}
		$data['list']=$list;
		foreach ($list as $v => $a) {
			$list3 = $this->db->where(array('articleID' => $a['id']))->get('follow')->result_array();
			$total = count($list3);
			$data['list'][$v]['followNumber'] = $total;
		}
		$this->load->view('mobile/basic/follow',$data);
	}
	public function collection(){
		$data['columnFooter']=5;
		$data['title']="我的收藏";
		$arr1=array('uid'=>$_COOKIE['uid']);
		$list1 = $this->db->where($arr1)->select('articleID')->order_by('id','DESC')->get('collection')->result_array();
		$list=array();
		foreach ($list1 as $v=>$a)
		{
			$list2 = $this->db->where(array('id'=>$a['articleID']))->get('article')->result_array();
			$data['list4']=$list2;
			array_push($list,$data['list4'][0]);
		}
		$data['list']=$list;
		foreach ($list as $v => $a) {
			$list3 = $this->db->where(array('articleID' => $a['id']))->get('follow')->result_array();
			$total = count($list3);
			$data['list'][$v]['followNumber'] = $total;
		}
		$this->load->view('mobile/basic/collection',$data);
	}
}
?>