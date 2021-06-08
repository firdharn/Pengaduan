<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Act extends CI_Controller {

	//menampilkan landing page PLN Kepanjen
	public function index()
	{
		$this->load->view('frontend/v_intro');
	}

	//menampilkan halaman pengaduan
	public function pengaduan()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('frontend/v_pengaduan');
		} else {
			$id = 0;
			if($this->session->userdata('id_pelanggan_pengaduan')){
				$id = $this->session->userdata('id_pelanggan_pengaduan');
			}
			$bukti_keluhan = $_FILES['bukti_keluhan'];
			if($bukti_keluhan=''){} else {
				$config['upload_path']		= './assets/bukti_keluhan/';
				$config['allowed_types']	= 'gif|jpg|jpeg|png';
				$config['encrypt_name'] 	= TRUE;
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('bukti_keluhan')){
					$this->session->set_flashdata('upload', 'Gagal Upload Bukti Keluhan');
				} else {
					$bukti_keluhan = $this->upload->data('file_name');
				}
			}
			$data = array(
					'id_pelanggan'		=> $id,
					//'tanggal'			=> $this->input->post('tanggal', TRUE),	
					'tanggal'			=> date('Y-m-d'),	
					'keluhan_pelanggan'	=> $this->input->post('form_isian', TRUE),
					'status'			=> 'PENDING',
					'bukti_keluhan'		=> $bukti_keluhan,
					'nama_approval'		=> '-',
					'bukti_approval'	=> '-'
				);
			$this->load->model('m_keluhan');
			$this->m_keluhan->input_keluhan($data);
			$this->session->set_flashdata('pesan_pengaduan', 'Data pengaduan berhasil dikirim');
			redirect('act/pengaduan/');	
		}
	}

	//menampilkan halaman kritik&saran
	public function kritik_saran()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('frontend/v_kritik_saran');
		} else {
			$id = 0;
			if($this->session->userdata('id_pelanggan_pengaduan')){
				$id = $this->session->userdata('id_pelanggan_pengaduan');
			}
			$data = array(
					'id_pelanggan'		=> $id,
					'tanggal'			=> $this->input->post('tanggal', TRUE),	
					'kritik_saran'		=> $this->input->post('form_isian', TRUE)
				);
			$this->load->model('m_kritik_saran');
			$this->m_kritik_saran->input_kritik_saran($data);
			$this->session->set_flashdata('pesan_kritik_saran', 'Data kritik & saran berhasil dikirim');
			redirect('act/kritik_saran/');	
		}
	}

    public function beranda()
	{
		$this->load->model('m_berita');
		$this->load->model('m_about');
		$this->load->model('m_service');
		$this->load->model('m_keluhan');
		$data = array(
			'tittle'				=> 'beranda',
			'dummy'					=> $this->m_berita->get_berita_terbaru(),
			'about'					=> $this->m_about->read_detail_data('id', '1'),
			'service'				=> $this->m_service->read_data(),
			'dummy_keluhan_pending'	=> $this->m_keluhan->read_pending_per_month(),
			'dummy_keluhan_selesai'	=> $this->m_keluhan->read_selesai_per_month(),
			'content' 				=> 'frontend/v_beranda' 
		);
		$this->load->view('frontend/layout/v_wrapper', $data, FALSE);
	}

    public function tentang()
	{
		$this->load->model('m_galeri');
		$data = array(
			'tittle'	=> 'tentang',
			'dummy'		=> $this->m_galeri->get_galeri(),
			'content' 	=> 'frontend/v_tentang' 
		);
		$this->load->view('frontend/layout/v_wrapper', $data, FALSE);
	}

    public function layanan()
	{
		$data = array(
			'tittle'	=> 'layanan',
			'content' 	=> 'frontend/v_layanan' 
		);
		$this->load->view('frontend/layout/v_wrapper', $data, FALSE);
	}

	public function berita()
	{
		$this->load->model('m_berita');
		$this->load->model('m_kategori_berita');
		
		$data = array(
			'tittle'				=> 'berita',
			'dummy_top_kategori'	=> $this->m_kategori_berita->get_top_kategori_berita(),
			'dummy_lower_kategori'	=> $this->m_kategori_berita->get_lower_kategori_berita(),
			'dummy_berita'			=> $this->m_berita->get_berita_page(),
			'dummy_page'			=> $this->m_berita->count_berita_page(),
			'content' 				=> 'frontend/v_berita' 
		);
		$this->load->view('frontend/layout/v_wrapper_berita', $data, FALSE);
	}

	public function berita_detail($slug)
	{
		$this->load->model('m_berita');
		$this->load->model('m_kategori_berita');
		$data = array(
			'tittle'				=> 'berita',
			'dummy_top_kategori'	=> $this->m_kategori_berita->get_top_kategori_berita(),
			'dummy_lower_kategori'	=> $this->m_kategori_berita->get_lower_kategori_berita(),
			'dummy_berita'			=> $this->m_berita->get_detail_berita_slug($slug),
			'content' 				=> 'frontend/v_berita_detail' 
		);
		$this->load->view('frontend/layout/v_wrapper_berita', $data, FALSE);
	}

    public function kontak()
	{
		$data = array(
			'tittle'	=> 'kontak',
			'content' 	=> 'frontend/v_kontak' 
		);
		$this->load->view('frontend/layout/v_wrapper', $data, FALSE);
	}

	public function login()
	{
		$this->load->view('frontend/v_login');
	}
	
	public function login_process()
	{	
		$this->load->model('m_user');
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$nilai = $this->m_user->cek_login_user($username,$password);
		if($nilai) {      		
			redirect(base_url());
		} else {
			$this->session->set_flashdata('pesan_login_pengaduan', 'Username atau Password Salah !!!');
			redirect('act/login');
		} 
	}

	public function register()
	{
		$this->load->view('frontend/v_register');
	}

	public function register_process()
	{			
		//$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon:', 'required');
		$this->form_validation->set_rules('username', 'Username:', 'required|trim');
		$this->form_validation->set_rules('password', 'Password:', 'required|trim');
		
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan_register_pengaduan', 'Data Invalid');
		} else {
			$data = array(
					//'nik'			=> $this->input->post('nik', TRUE),
					'nama'			=> $this->input->post('nama', TRUE),
					//'jenis_kelamin'	=> $this->input->post('jenis_kelamin', TRUE),
					//'tanggal_lahir'	=> $this->input->post('tanggal_lahir', TRUE),
					'no_telepon'	=> $this->input->post('telepon', TRUE),
					//'alamat'		=> $this->input->post('alamat', TRUE),
					'username'		=> $this->input->post('username', TRUE),
					'password' 		=> md5($this->input->post('password', TRUE))
				);
			$this->load->model('m_user');
			if($this->m_user->register_user($data) == true) {
				$this->session->set_flashdata('pesan_register_pengaduan', 'Akun Berhasil Terdaftar !!!');
			}
		}
		redirect('act/register');
	}

	public function logout(){
		session_destroy();
		redirect(base_url('act/login'));
	}
}
