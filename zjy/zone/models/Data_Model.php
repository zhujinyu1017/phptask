<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/22
 * Time: 16:58
 */
class GetMember extends CI_Model{
    // 当前数据表
    private $tableName;
    /**
     * 构造函数
     */
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    /**
     * 选择数表
     * @param type $tableName 数据表
     */
    public function set_table($tableName) {
        $this->tableName = $tableName;
    }
    /**
     * 获取表数据
     * @param type $tableName
     * @param type $where
     * @param type $fields
     * @param type $like
     * @return Array 二维数组
     */
    public function get_table_data($tableName, $where = array(), $fields = array(), $limit = array(), $orderby = '', $like = array()) {
        $tableName = $tableName == '' ? $this->tableName : $tableName;
        if (!empty($fields)) {
            $fields_string = implode(',', $fields);
            $this->db->select($fields_string);
        }
        $this->db->where($where);
        $this->db->like($like);
        if (!empty($limit)) {
            $this->db->limit($limit['limit'], $limit['offset']);
        }
        if (!empty($orderby)) {
            $this->db->order_by($orderby);
        }
        $query = $this->db->get($tableName);
        return $query->result_array() ? $query->result_array() : array();
    }
    /**
     * 获取表数据
     * @param type $tableName
     * @param type $where
     * @param type $fields
     * @param type $like
     * @return Array 一维数组
     */
    public function get_table_row($tableName, $where = array(), $fields = array(), $like = array(), $orderby = '') {
        $tableName = $tableName == '' ? $this->tableName : $tableName;
        if (!empty($fields)) {
            $fields_string = implode(',', $fields);
            $this->db->select($fields_string);
        }
        $this->db->where($where);
        $this->db->like($like);
        $this->db->limit(1);
        if (!empty($orderby)) {
            $this->db->order_by($orderby);
        }
        $query = $this->db->get($tableName);

        return $query->row_array() ? $query->row_array() : array();
    }
    /*
     * 统计数量
     * @param type $tableName
	 * @param type $where
	 * @return type number
    */
    public function count_table($tableName, $where = array()){
        $tableName = $tableName == '' ? $tableName->tableName : $tableName;
        $this->db->where($where);
        $this->db->from($tableName);
        return $this->db->count_all_results();
    }
}