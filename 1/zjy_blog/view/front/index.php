<?php
header("Content-type: text/html; charset=utf-8");
class index extends Controller {

	public function index() {
		$data = array(
			'title'=>'ilsea',
			'list'=>array(
				'hello',
				'world'
				)
			);
		$this->assign($xing,"454");
		$this->assign($name, "小雨"); 
		$this->display();
	}
	public function aa() {
		$data = array(
			'title'=>'ilsea',
			'list'=>array(
				'hello',
				'world'
				)
			);
		$this->assign($xing,"454");
		$this->assign($name, "小雨"); 
		$this->display();
	}
}
?>