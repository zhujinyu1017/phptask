<?php
class Acl {
    private $url_model;
    private $url_method;
    private $CI;
    function Acl()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->url_model = $this->CI->uri->segment(1);
        $this->url_method = $this->CI->uri->segment(2);
    }
    function auth()
    {
        $user = $this->CI->session->userdata('USER');
        if(empty($user))
            $user->status = 0;
        $this->CI->load->config('acl');
        $AUTH = $this->CI->config->item('AUTH');
        if(in_array($user->status, array_keys($AUTH))){
            $controllers = $AUTH[$user->status];
            if(in_array($this->url_model, array_keys($controllers))){
                if(!in_array($this->url_method, $controllers[$this->url_model])){
                    show_error('您无权访问该功能，该错误已经被记录！点击<a href="'. site_url('admin/logout') .'">返回</a>');
                }
            }else{
                show_error('您无权访问该模块，该错误已经被记录！点击<a href="'. site_url('admin/logout') .'">返回</a>');
            }
        }
        else
            show_error('错误的用户类型，该错误已经被记录！点击<a href="'. site_url('admin/logout') .'">返回</a>');
    }
}