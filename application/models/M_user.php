<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{
	//mengambil data user
    public function get_user()
	{
        $this->db->select('id, nama, no_telepon, username');
        $this->db->from('pelanggan');
		$this->db->where('id !=', 0);
		$this->db->order_by('created_at', 'DESC');
        $this->db->order_by('nama', 'ASC');
		$this->db->order_by('username', 'ASC');
        return $this->db->get()->result();
	}

    //menghapus data user tertentu
	public function delete_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pelanggan');
	}	

	//register user
	public function register_user($data){
		$username = $data['username'];
		$query = $this->db->query("SELECT * FROM pelanggan WHERE username='$username'");
    	$cek = $query->num_rows();
    	if($cek == 0){
    		$this->db->insert('pelanggan', $data);
    		return true;
    	} else {
    		$this->session->set_flashdata('error', 'Username telah terdaftar!');
    		return false;
    	}		
	}

	//cek login user
	public function cek_login_user($username, $password){
		$this->db->where('username', $username);
		$query = $this->db->get('pelanggan');
		if($query->num_rows()==1){
            foreach ($query->result() as $row){
            	$data = array(
            		'id'  		=> $row->id,
					'nama'  	=> $row->nama
            	);
				$datapassword = $row->password;
            }
			if($datapassword == md5($password)){
				$this->session->set_userdata('id_pelanggan_pengaduan', $data['id']);
				$this->session->set_userdata('nama_pelanggan_pengaduan', $data['nama']);
				return true;
			}
        } else {
    		return false;
    	}      
	}
}