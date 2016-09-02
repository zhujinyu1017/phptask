<?php
/**
 * Created by PhpStorm.
 * User: zhujinyu
 * Description: 栏目信息
 * Date: 2016/3/22
 * Time: 16:15
 */
class GetMember extends CI_Model{
    public $uid;
    public $nickname;
    public $password;
    public $avatar;
    public $mobile;
    public $name;
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    public function get_section(){
        $query = $this->db->get('section');
        return $query->result();
    }
    public function insert_section(){
        $this->uid=$_POST['id'];
        $this->nickname=$_POST['name'];
        $this->db->insert('section', $this);
    }
    public function update_section()
    {
        $this->uid=$_POST['id'];
        $this->nickname=$_POST['name'];
        $this->db->update('section', $this, array('id' => $_POST['id']));
    }
}