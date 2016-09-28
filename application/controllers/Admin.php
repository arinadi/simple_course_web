<?php
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        auth(1);
    }
    function index(){
        $data='';
        $this->load->view('admin/dashboard', $data);
    }
    function table(){}
    function search(){}
    function form($id=null){}
    function action($id=null){}
    function delete($id){}
}
