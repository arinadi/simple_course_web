<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin extends CI_Model{
    function main($sort=null,$search=null){
        //SELECT
        $sql="SELECT * FROM admin a WHERE 1 ";

        //SEARCH
        if(!empty($search)){
            $sql.=" AND (username LIKE '%$search%')";
        }

        //ORDER BY
        $sql.=" ORDER BY ";
        if(empty($sort)){
            $sort="a.admin_id-ASC";
            $sort=explode('-',$sort);
            $field=$sort[0];
            $order=$sort[1];
            $sql.=" $field $order";
        } else {
            $sort=explode('-',$sort);
            $field=$sort[0];
            $order=$sort[1];
            $sql.=" $field $order";
        }

        $query=$this->db->query($sql);
        $data['rows']=$query->num_rows();
        $data['array']=$query->result_array();
        return $data;
    }
    function get($id){
        //SELECT
        $sql="SELECT * FROM admin a WHERE admin_id='$id'";
        $query=$this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }
    function create(){
        $data=$this->input->post();
        $action=$this->db->insert('admin',$data);
        if($action){
            $_SESSION['notice']['type']='success';
            $_SESSION['notice']['title']='Data Berhasil Diproses';
            $_SESSION['notice']['msg']='Siap menerima perintah berikutnya.';
            redirect(site_url('admin/table'));
        } else {
            $_SESSION['notice']['type']='error';
            $_SESSION['notice']['title']='Error';
            $_SESSION['notice']['msg']='Periksa kembali.';
        }
        return $action;
    }
    function update($id){}
    function delete($id){}
}
