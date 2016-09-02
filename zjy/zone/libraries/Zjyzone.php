<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zjyzone {
    var $CI;  
    function ZONES(){  
        $this->CI = & get_instance();  
        //变量可以在这里定义，或者来自配置文件，也可以去数据库中查  
        $variable = array('abc'=>'asdfasdf');  
        $this->CI->load->vars($variable);  
    }  
}