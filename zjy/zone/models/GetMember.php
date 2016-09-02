<?php
/**
 * Created by PhpStorm.
 * User: zhujinyu
 * Date: 2016/3/22
 * Description: 用户数据处理
 * Time: 11:51
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
    /**
     * 获取用户数据
     * @return Array 对象数组
     */
    public function get_member(){
        $query = $this->db->get('member');
        return $query->result();
    }
    public function insert_member($data){
        return $this->data_model->insert($this->table, $data);
    }
    public function update_member()
    {
        $this->uid=$_POST['uid'];
        $this->nickname=$_POST['nickname'];
        $this->password=$_POST['password'];
        $this->avatar=$_POST['avatar'];
        $this->mobile=$_POST['mobile'];
        $this->realname=$_POST['name'];
        $this->update_time=time();
        $this->db->update('member', $this, array('id' => $_POST['id']));
    }
    public function verify_member($name, $password) {
        $where['name'] = $name;
        $where['password'] = md5($password);
        $row = $this->data_model->get_table_row('member', $where);
        return $row;
    }
}