<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori_berita extends CI_Model
{
    //mengambil data id dan nama_kategori dari tabel kategori berita
    public function get_kategori_berita()
	{
        $this->db->select('id, nama_kategori');
        $this->db->from('kategori_berita');
        $this->db->order_by('created_at', 'DESC');
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get()->result();
	}

	//mengambil data id dan nama_kategori bagian atas dari tabel kategori berita
    public function get_top_kategori_berita()
	{
		$count = $this->db->count_all_results('kategori_berita');

        $this->db->select('id, nama_kategori');
        $this->db->from('kategori_berita');		
        $this->db->order_by('nama_kategori', 'ASC');
        if($count%2 == 0){
            $this->db->limit($count/2);
        } else {
            $this->db->limit(($count/2)+1);
        }
        return $this->db->get()->result();
	}

	//mengambil data id dan nama_kategori bagian bawah dari tabel kategori berita
    public function get_lower_kategori_berita()
	{
        $count = $this->db->count_all_results('kategori_berita');

        $this->db->select('id, nama_kategori');
        $this->db->from('kategori_berita');
        $this->db->order_by('nama_kategori', 'ASC');
        if($count%2 == 0){
            $this->db->limit($count, ($count/2));
        } else {
            $this->db->limit($count, ($count/2)+1);
        }
        return $this->db->get()->result();
	}

    //mengambil detail data kategori berita tertentu berdasarkan id
	public function get_detail_kategori_berita($id)
	{
        $this->db->select('id, nama_kategori');
        $this->db->from('kategori_berita');
        $this->db->where('id', $id);
        return $this->db->get()->row();
	}

    //mengambil detail data kategori berita tertentu berdasarkan nama kategori
	public function get_detail_nama_kategori_berita($nama_kategori, $type)
	{
        $this->db->select('id, nama_kategori');
        $this->db->from('kategori_berita');
        $this->db->like('nama_kategori', $nama_kategori);
        return $this->db->get()->result();
	}

    //menambah data kategori berita
    public function input_kategori_berita($data)
	{
        $nama_kategori = $data['nama_kategori'];
		$query = $this->db->query("SELECT * FROM kategori_berita WHERE nama_kategori='$nama_kategori'");
    	$cek = $query->num_rows();
    	if($cek == 0){
    		$this->db->insert('kategori_berita', $data);
    		return true;
    	} else {
    		$this->session->set_flashdata('error', 'Kategori telah terdaftar!');
    		return false;
    	}
    }

    //mengupdate data kategori berita tertentu
    public function update_kategori_berita($data)
	{
        $this->db->set('nama_kategori', $data['nama_kategori']);
        $this->db->where('id', $data['id']);
        $this->db->update('kategori_berita');
	}  

    //menghapus data kategori berita tertentu
	public function delete_kategori_berita($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kategori_berita');
	}	
}