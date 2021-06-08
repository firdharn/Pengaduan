<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model
{
	//menghitung jumlah data berita
	public function count_berita()
	{
		if(isset($_REQUEST['kategori']) || isset($_REQUEST['search'])){
			$this->load->model('m_kategori_berita');
			if (isset($_REQUEST['kategori'])) {
				$kategori = $_REQUEST['kategori'];
				$data = $this->m_kategori_berita->get_detail_nama_kategori_berita($kategori, "none");
			} else if (isset($_REQUEST['search'])) {
				$search_kategori = $_REQUEST['search'];
				$data = $this->m_kategori_berita->get_detail_nama_kategori_berita($search_kategori, "both");
			}			
			foreach ($data as $key => $value) {
				$this->db->or_where('id_kategori', $value->id);
			}
			
		}
		$this->db->select('*');
        $this->db->from('berita');		
		$this->db->where('status_publish', 'POST');
		$this->db->where('tanggal_publish <=', 'NOW()', FALSE);
		$this->db->order_by('tanggal_publish','DESC');
		return $this->db->count_all_results();
	}

	//menghitung banyak jumlah page berita (3 berita per page)
	public function count_berita_page(){
		$jumlah = $this->count_berita();
		if($jumlah%3 == 0){
			return (int)($jumlah/3);
		} else {
			return (int)(($jumlah/3)+1);
		}
	}

    //mengambil data dari kategori berita dan berita yang di-JOIN-kan
	public function get_berita()
	{
		$this->db->select('b.id, kb.nama_kategori, b.judul, DATE_FORMAT(b.tanggal_publish, \'%d-%m-%Y\') as tanggal_publish, b.status_publish');
		$this->db->from('kategori_berita kb');
		$this->db->join('berita b', 'kb.id = b.id_kategori');
		$this->db->order_by('b.created_at', 'DESC');
		$this->db->order_by('tanggal_publish','DESC');
		$this->db->order_by('kb.nama_kategori','ASC');
		$this->db->order_by('b.judul','ASC');
		$this->db->order_by('b.status_publish','DESC');
		return $this->db->get()->result();
	}	

	//mengambil 3 data berita terbaru
	public function get_berita_terbaru()
	{
        $this->db->select('*');
        $this->db->from('berita');
		$this->db->where('status_publish', 'POST');
		$this->db->where('tanggal_publish <=', 'NOW()', FALSE);
		$this->db->order_by('tanggal_publish','DESC');
		$this->db->limit(3);
        return $this->db->get()->result();
	}

	//mengambil 3 data berita berdasarkan page
	public function get_berita_page()
	{
		if(isset($_REQUEST['kategori']) || isset($_REQUEST['search'])){
			$this->load->model('m_kategori_berita');
			if (isset($_REQUEST['kategori'])) {
				$kategori = $_REQUEST['kategori'];
				$data = $this->m_kategori_berita->get_detail_nama_kategori_berita($kategori, "none");
			} else if (isset($_REQUEST['search'])) {
				$search_kategori = $_REQUEST['search'];
				$data = $this->m_kategori_berita->get_detail_nama_kategori_berita($search_kategori, "both");
			} 
			foreach ($data as $key => $value) {
				$this->db->or_where('id_kategori', $value->id);
			}
		}
        $this->db->select('*, DATE_FORMAT(tanggal_publish, \'%M %e, %Y\') as tanggal');
        $this->db->from('berita');		
		$this->db->where('status_publish', 'POST');
		$this->db->where('tanggal_publish <=', 'NOW()', FALSE);
		$this->db->order_by('tanggal_publish','DESC');
		$halaman = 1;
		if(isset($_REQUEST['halaman'])){
			$halaman = $_REQUEST['halaman'];
		}
		if($halaman == 1){
			$this->db->limit($halaman*3);
		} else {
			$this->db->limit(3, ($halaman-1)*3);
		}
        return $this->db->get()->result();
	}

    //mengambil detail data berita tertentu
	public function get_detail_berita($id)
	{
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id', $id);
        return $this->db->get()->row();
	}

	//mengambil detail data berita tertentu berdasarkan slug
	public function get_detail_berita_slug($slug)
	{
        $this->db->select('*, DATE_FORMAT(tanggal_publish, \'%M %e, %Y\') as tanggal');
        $this->db->from('berita');
        $this->db->where('slug', $slug);
		$this->db->where('status_publish', 'POST');
		$this->db->where('tanggal_publish <=', 'NOW()', FALSE);
        return $this->db->get()->row();
	}	

    //menambah data berita
	public function input_berita($data)
	{
		$this->db->insert('berita', $data);
    }
    
	//mengupdate data berita tertentu
    public function update_berita($id, $data)
	{
        $this->db->where('id', $id);
        $this->db->update('berita', $data);
	}  

	//menghapus data berita tertentu
	public function delete_berita($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('berita');
	}	
	
}