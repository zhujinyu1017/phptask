<?php  
class Mtest extends CI_Model{  
    function Mtest(){  
        parent::__construct();  
    }  
        function get_last_ten_entries()  
    {         
        $this->load->database();   
        $query = $this->db->get('member', 10);  
        return $query->result();  
    }  
}  
?>
