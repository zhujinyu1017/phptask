<?php  
class Mtest extends CI_Model{  
    function Mtest(){  
        parent::__construct();  
    }  
        function get_last_ten_entries()  
    {         
        $this->load->database();  
          mysql_query("SET NAMES GBK"); //防止中文乱码  
        $query = $this->db->get('member', 10);  
        return $query->result();  
    }  
}  
?>
