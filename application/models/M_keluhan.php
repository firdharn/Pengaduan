<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_keluhan extends CI_Model
{
	//menambahkan data keluhan
	public function input_keluhan($data)
	{
		$this->db->insert('keluhan', $data);
    }

    //mengambil data keluhan
    public function get_keluhan()
	{
        $this->db->select('k.id, p.nama, DATE_FORMAT(k.tanggal, \'%d-%m-%Y\') as tanggal, k.keluhan_pelanggan, k.status, k.bukti_keluhan');
		$this->db->from('pelanggan p');
		$this->db->join('keluhan k', 'p.id = k.id_pelanggan');
		$this->db->order_by('k.created_at', 'DESC');
		$this->db->order_by('tanggal','ASC');
		$this->db->order_by('p.nama','ASC');
		$this->db->order_by('k.status','ASC');
		$this->db->order_by('k.keluhan_pelanggan','ASC');
		return $this->db->get()->result();
	}

	//mengambil detail data keluhan tertentu
	public function get_detail_keluhan($id)
	{
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->where('id', $id);
        return $this->db->get()->row();
	}

	//mengupdate data approval kolom keluhan tertentu di database
	public function update_data($id, $data)
	{
        $this->db->where('id', $id);
        $this->db->update('keluhan', $data);
		$this->session->set_flashdata('success', 'Data Berhasil Diubah !!!');
	}

    //mengupdate status pada data keluhan tertentu
	// public function update_status_keluhan()
	// {
	// 	$id = $_REQUEST['sid'];
	// 	$sval = $_REQUEST['sval'];
	// 	if($sval=='PENDING'){
	// 		$status = 'SELESAI';
	// 	} else {
	// 		$status = 'PENDING';
	// 	}
	// 	$this->db->set('status', $status);
	// 	$this->db->where('id', $id);
	// 	$this->db->update('keluhan');
	// }

	//menghapus data keluhan tertentu
	public function delete_keluhan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('keluhan');
	}

	//membaca data keluhan per bulan where 'PENDING'
    public function read_pending_per_month()
    {
		$this->db->select('COUNT(id) as jumlah, DATE_FORMAT(tanggal, "%c") as bulan');
        $this->db->from('keluhan');
		$this->db->where('status', 'PENDING');
        $this->db->where('DATE_FORMAT(tanggal, "%Y") =', ' DATE_FORMAT(NOW(), "%Y")', FALSE);
        $this->db->group_by('DATE_FORMAT(tanggal, "%c-%Y")');
        return $this->db->get()->result();
    }

	//membaca data keluhan per bulan where 'SELESAI'
    public function read_selesai_per_month()
    {
		$this->db->select('COUNT(id) as jumlah, DATE_FORMAT(tanggal, "%c") as bulan');
        $this->db->from('keluhan');
		$this->db->where('status', 'SELESAI');
        $this->db->where('DATE_FORMAT(tanggal, "%Y") =', ' DATE_FORMAT(NOW(), "%Y")', FALSE);
        $this->db->group_by('DATE_FORMAT(tanggal, "%c-%Y")');
        return $this->db->get()->result();
    }
}