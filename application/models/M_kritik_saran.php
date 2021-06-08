<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kritik_saran extends CI_Model
{
	//menambahkan data keluhan
	public function input_kritik_saran($data)
	{
		$this->db->insert('kritik_saran', $data);
    }
	
	//mengambil data kritik_saran
    public function get_kritik_saran()
	{
        $this->db->select('ks.id, p.nama, DATE_FORMAT(ks.tanggal, \'%d-%m-%Y\') as tanggal, ks.kritik_saran');
		$this->db->from('pelanggan p');
		$this->db->join('kritik_saran ks', 'p.id = ks.id_pelanggan');
		$this->db->order_by('ks.created_at', 'DESC');
		$this->db->order_by('tanggal','ASC');
		$this->db->order_by('p.nama','ASC');
		$this->db->order_by('ks.kritik_saran','ASC');
		return $this->db->get()->result();
	}

	//menghapus data kritik_saran tertentu
	public function delete_kritik_saran($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kritik_saran');
	}
}