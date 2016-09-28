<?php
class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_gate');
    }
    function index(){
        redirect(site_url('auth/student'));
    }
    function student(){
        //Cek Session Login
        if(isset($_SESSION['login'])){
            $notice['msg']='Anda sudah login.';
            $notice['type']='info';
            $notice['title']='Maaf,';
            $_SESSION['notice'][]=$notice;
            redirect(site_url('student'));
        }
        $data='';
        if(isset($_POST['identity'])){
            $this->M_gate->chacking('2');
        }
        $this->load->view('auth/student',$data);
    }
    function admin(){
        //Cek Session Login
        if(isset($_SESSION['login'])){
            $notice['msg']='Anda sudah login.';
            $notice['type']='info';
            $notice['title']='Maaf,';
            $_SESSION['notice'][]=$notice;
            redirect(site_url('admin'));
        }
        $data='';
        if(isset($_POST['identity'])){
            $this->M_gate->chacking('1');
        }
        $this->load->view('auth/admin',$data);
    }
    function logout(){
        $level=$_SESSION['login']['level'];
        $this->M_gate->logout();
        if($level==1){
            $page='admin';
        } elseif($level==2){
            $page='student';
        }
        redirect(site_url("auth/$page"));
    }
}