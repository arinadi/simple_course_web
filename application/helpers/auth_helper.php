<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('auth')){
        function auth($allow){
            $ci =& get_instance();
            $ci->load->database();
        //Proses Cek Login
            if(!isset($_SESSION['login'])){
                //+
                $notice['msg']='Masukan username dan password yang anda miliki.';
                $notice['title']='Maaf, Anda Belum Login';
                $notice['type']='danger';
                $_SESSION['notice'][]=$notice;
                redirect(site_url('auth'));
            } else {
                $level=$_SESSION['login']['level'];
                $allow=explode(',',$allow);
                if(!in_array($level,$allow)){
                    $notice['title']='Ilegal Akses';
                    $notice['msg']="Anda tidak boleh mengakses menu.";
                    $notice['type']='danger';
                    $_SESSION['notice'][]=$notice;
                    if($level==1){
                        $page='admin';
                    } elseif($level==2){
                        $page='student';
                    }
                    redirect(site_url($page));
                }
            }
    }
}
