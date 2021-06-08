<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

	//menghitung jumlah data pelanggan, berita, kritik_saran, dan keluhan dalam bentuk array
	public function get_count_all_data()
	{
        $data = array();
        array_push($data, $this->db->count_all_results('pelanggan')-1);
        array_push($data, $this->db->count_all_results('berita'));
        array_push($data, $this->db->count_all_results('kritik_saran'));
        array_push($data, $this->db->count_all_results('keluhan'));
		return $data;
	}

	//menghapus data tertentu
	// public function delete_data($data)
	// {
	// 	$this->db->where('id', $data['id']);
	// 	$this->db->delete($data['tabel']);
	// }	
}