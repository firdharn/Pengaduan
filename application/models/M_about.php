<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_about extends CI_Model
{
	//memasukkan data site_banner ke database
	public function insert_data($data)
	{
    	$this->db->insert('site_about', $data);
        $this->session->set_flashdata('success', 'Data Berhasil Dimasukkan !!!');
	}


    //membaca semua data site_banner pada database
	public function read_data()
	{
		$this->db->select('*');
        $this->db->from('site_about');
		$this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
	}

	//membaca detail data site_banner tertentu berdasarkan context dan data
	public function read_detail_data($context, $data){
		$this->db->select('*');
		$this->db->from('site_about');
		$this->db->where($context, $data);
		return $this->db->get()->row();
	}

    //mengupdate data site_banner tertentu di database
	public function update_data($id, $data)
	{
		if($this->read_data() == null)
        {
            $this->insert_data($data);            
        }
        else 
        {
			$this->db->where('id', $id);
			$this->db->update('site_about', $data);
			$this->session->set_flashdata('success', 'Data Berhasil Diubah !!!');
		}
	}
}