<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_Model
{
	//mengambil data galeri
	public function get_galeri()
	{
		$this->db->select('*');
        $this->db->from('galeri');
		$this->db->order_by('created_at', 'DESC');
        $this->db->order_by('caption', 'ASC');
        return $this->db->get()->result();
	}

	//mengambil detail data galeri tertentu
	public function get_detail_galeri($id)
	{
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->where('id', $id);
        return $this->db->get()->row();
	}
    
	//menambah data galeri
	public function input_galeri($data)
	{
		$this->db->insert('galeri', $data);
    }

	//mengupdate data galeri tertentu
	public function update_galeri($id, $data)
	{
        $this->db->where('id', $id);
        $this->db->update('galeri', $data);
	}  

	//menghapus data galeri tertentu
	public function delete_galeri($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('galeri');
	}	
}