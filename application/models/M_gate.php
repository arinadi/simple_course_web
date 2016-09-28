<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_gate extends CI_Model{
    function chacking($level){
        //Pripare Data
        $input=$this->input;
        $identity=$input->post('identity');
        $password=md5($input->post('password'));
        //Process Start
        if($level==1){
            //Proses 1 = Cek kesediaan user
            $sql="SELECT username FROM admin WHERE username='$identity'";
            $query=$this->db->query($sql);
            $jum=$query->num_rows();
            if($jum<1){
                $notice['type']='danger';
                $notice['msg']='Username tidak ditemukan.';
                $_SESSION['notice'][]=$notice;
            } else {
                //Proses 2 = Cek kecocokan dengan Password
                $sql="SELECT * FROM admin a WHERE a.username='$identity' AND a.password='$password'";
                $query=$this->db->query($sql);
                $jum=$query->num_rows();
                if($jum<1){
                    $notice['type']='danger';
                    $notice['msg']='Username dan Password tidak cocok.';
                    $_SESSION['notice'][]=$notice;
                } else {
                    //Proses 3 = Membuat SESSION['login']
                    $data=$query->row_array();
                    $user['user_id']=$data['admin_id'];
                    $user['identity']=$data['username'];
                    $user['level']=$level;
                    $_SESSION['login']=$user;
                    //Proses 4 = Menambah waktu valid_session
                    $notice['type']='success';
                    $notice['title']='LOGIN SUKSES';
                    $notice['msg']='Selamat Datang.';
                    $_SESSION['notice'][]=$notice;
                    redirect(site_url('admin'));
                }
            }
        } elseif ($level==2){
            //Proses 1 = Cek kesediaan user
            $sql="SELECT email FROM student WHERE email='$identity'";
            $query=$this->db->query($sql);
            $jum=$query->num_rows();
            if($jum<1){
                $notice['type']='danger';
                $notice['msg']='Username tidak ditemukan.';
                $_SESSION['notice'][]=$notice;
            } else {
                //Proses 2 = Cek kecocokan dengan Password
                $sql="SELECT * FROM student a WHERE a.email='$identity' AND a.password='$password'";
                $query=$this->db->query($sql);
                $jum=$query->num_rows();
                if($jum<1){
                    $notice['type']='danger';
                    $notice['msg']='Username dan Password tidak cocok.';
                    $_SESSION['notice'][]=$notice;
                } else {
                    //Proses 3 = Membuat SESSION['login']
                    $data=$query->row_array();
                    $user['user_id']=$data['student_id'];
                    $user['identity']=$data['email'];
                    $user['level']=$level;
                    $_SESSION['login']=$user;
                    //Proses 4 = Menambah waktu valid_session
                    $notice['type']='success';
                    $notice['title']='LOGIN SUKSES';
                    $notice['msg']='Selamat Datang.';
                    $_SESSION['notice'][]=$notice;
                    redirect(site_url('student'));
                }
            }
        }
    }

    function logout(){
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
            $notice['title']='LOGOUT SEKSES';
            $notice['type']='success';
            $notice['msg']='Terimakasih telah meninggalkan sistem dengan aman.';
            $_SESSION['notice'][]=$notice;
        }
    }
}