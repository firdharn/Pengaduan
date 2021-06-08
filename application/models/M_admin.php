<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{
	//cek login admin
	public function cek_login_admin($username, $password){
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
		if($query->num_rows()==1){
            foreach ($query->result() as $row){
                $data = array(
                    'id'  		=> $row->id,
                    'nama'  	=> $row->nama
                );
                $datapassword = $row->password;
            }
            if( $datapassword == md5($password)){
                $this->session->set_userdata('id_admin_pengaduan', '$row->id');
                $this->session->set_userdata('nama_admin_pengaduan', $row->nama);
                return true;
            }
        }
    	return false;
	}
}