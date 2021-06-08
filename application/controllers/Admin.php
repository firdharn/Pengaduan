<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
		$this->load->model('m_user');
		$this->load->model('m_keluhan');
		$this->load->model('m_kritik_saran');	
		$this->load->model('m_kategori_berita');
		$this->load->model('m_galeri');	
		$this->load->model('m_berita');
		$this->load->model('m_about');
		$this->load->model('m_service');
	}
	
	//menampilkan halaman login
	public function index()
	{
		$this->load->view('admin/login');
	}

	public function login_process() 
	{
		$this->load->model('m_admin');
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);   
		if($this->m_admin->cek_login_admin($username,$password)) {
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('pesan_login_admin', 'Data Invalid !!!');
			redirect('admin/index');
		}      	
    }

	public function logout(){
		session_destroy();
		redirect('admin');	
	}

	//menampilkan dashboard
	public function dashboard(){
		$data = array(
			'tittle'				=> 'dashboard',
			'dummy_dashboard'		=> $this->m_dashboard->get_count_all_data(),
			'dummy_keluhan_pending'	=> $this->m_keluhan->read_pending_per_month(),
			'dummy_keluhan_selesai'	=> $this->m_keluhan->read_selesai_per_month(),
			'content' 				=> 'admin/dashboard' 
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	//menampilkan daftar keluhan
	public function daftar_keluhan()
	{
		$data = array(
			'tittle'=> 'daftar_keluhan',
			'dummy'	=> $this->m_keluhan->get_keluhan(),
			'content' => 'admin/daftar_keluhan' 
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	//menampilkan daftar kritik & saran
	public function daftar_kritik_saran()
	{
		$data = array(
			'tittle'=> 'daftar_kritik_saran',
			'dummy'	=> $this->m_kritik_saran->get_kritik_saran(),
			'content' => 'admin/daftar_kritik_saran' 
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	//menampilkan daftar kategori berita
	public function daftar_kategori_berita()
	{
		$data = array(
			'tittle'=> 'daftar_kategori_berita',
			'dummy'	=> $this->m_kategori_berita->get_kategori_berita(),
			'content' 	=> 'admin/daftar_kategori_berita' 
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	//menampilkan daftar berita
	public function daftar_berita()
	{
		$data = array(
			'tittle'=> 'daftar_berita',
			'dummy'		=> $this->m_berita->get_berita(),
			'content' => 'admin/daftar_berita' 
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	//menampilkan daftar galeri
	public function daftar_galeri()
	{
		$data = array(
			'tittle'=> 'daftar_galeri',
			'dummy'	=> $this->m_galeri->get_galeri(),
			'content' => 'admin/daftar_galeri' 
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	//menampilkan daftar user
	public function daftar_user()
	{
		$data = array(
			'tittle'=> 'daftar_user',
			'dummy'	=> $this->m_user->get_user(),
			'content' => 'admin/daftar_user' 
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	//menambahkan data kategori berita ke database
	public function tambah_kategori_berita()
	{	
		$this->form_validation->set_rules('nama_kategori', 'Masukkan Nama Kategori Berita', 'required');

		if($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle'=> 'daftar_kategori_berita',
				'content' => 'admin/tambah_kategori_berita' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} else {
			$data = array(
					'nama_kategori'	=> $this->input->post('nama_kategori')			
				);
			if($this->m_kategori_berita->input_kategori_berita($data) == true) {
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
			}
			redirect('admin/daftar_kategori_berita/');	
		}
	}

	//menambahkan data berita ke database
	public function tambah_berita()
	{
		$this->form_validation->set_rules('id_kategori', 'Pilih Kategori', 'required');
		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
		$this->form_validation->set_rules('editor1', 'Deskripsi', 'required');
		$this->form_validation->set_rules('tanggal_publish', 'Tanggal Publish', 'required');
		$this->form_validation->set_rules('status_publish', 'Status Publish', 'required');

		if($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle'=> 'daftar_berita',
				'dummy'	=> $this->m_kategori_berita->get_kategori_berita(),
				'content' => 'admin/tambah_berita' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} else {
			$banner = $_FILES['banner'];
			if($banner=''){} else {
				$config['upload_path']	= './assets/banner_berita/';
				$config['allowed_types']        = '*';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('banner')){
					$this->session->set_flashdata('upload', 'Upload Gagal');
				} else {
					$banner = $this->upload->data('file_name');
				}
			}
			$data = array(
					'id_kategori'		=> $this->input->post('id_kategori', TRUE),
					'banner'			=> $banner,
					'judul'				=> $this->input->post('judul_berita'),
					'slug'				=> slug($this->input->post('judul_berita')),
					'deskripsi'			=> $this->input->post('editor1'),
					'tanggal_publish'	=> $this->input->post('tanggal_publish', TRUE),					
					'status_publish'	=> $this->input->post('status_publish', TRUE)			
				);
			$this->m_berita->input_berita($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');

			redirect('admin/daftar_berita/');	
		}
	}

	//menambahkan data galeri ke database
	public function tambah_galeri()
	{
		$this->form_validation->set_rules('caption', 'Caption', 'required');
		if($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle'=> 'daftar_galeri',
				'content' => 'admin/tambah_galeri' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} else {
			$gambar = $_FILES['gambar'];
			if($gambar=''){} else {
				$config['upload_path']		= './assets/galeri_gambar/';
				$config['allowed_types']	= '*';
				$config['encrypt_name'] 	= TRUE;
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('gambar')){
					$this->session->set_flashdata('upload', 'Upload Gagal');
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}
			$data = array(
					'gambar'			=> $gambar,
					'caption'			=> $this->input->post('caption', TRUE),			
				);
			$this->m_galeri->input_galeri($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');

			redirect('admin/daftar_galeri/');	
		}
	}

	//mengupdate data kategori berita di database
	public function edit_kategori_berita($id)
	{	
		$this->form_validation->set_rules('nama_kategori', 'Masukkan Nama Kategori Berita', 'required');
		
		if($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle'=> 'daftar_kategori_berita',
				'dummy'	=> $this->m_kategori_berita->get_detail_kategori_berita($id),
				'content' 	=> 'admin/edit_kategori_berita' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} else {	
			$data = array(
					'id'			=> $id,
					'nama_kategori'	=> $this->input->post('nama_kategori')			
				);
			$this->m_kategori_berita->update_kategori_berita($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diupdate !!!');
			redirect('admin/daftar_kategori_berita/'.$id);	
		}
	}	

	//mengupdate data berita di database
	public function edit_berita($id)
	{
		$this->form_validation->set_rules('id_kategori', 'Pilih Kategori', 'required');
		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
		$this->form_validation->set_rules('editor1', 'Deskripsi', 'required');
		$this->form_validation->set_rules('tanggal_publish', 'Tanggal Publish', 'required');
		$this->form_validation->set_rules('status_publish', 'Status Publish', 'required');
		
		if($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle'			=> 'daftar_berita',
				'dummy_detail'		=> $this->m_berita->get_detail_berita($id),
				'dummy_kategori'	=> $this->m_kategori_berita->get_kategori_berita(),
				'content' 			=> 'admin/edit_berita' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} else {
			if($_FILES['banner']['size'] == 0) {
				$data = array(
					'id_kategori'		=> $this->input->post('id_kategori', TRUE),
					'judul'				=> $this->input->post('judul_berita'),
					'slug'				=> slug($this->input->post('judul_berita')),
					'deskripsi'			=> $this->input->post('editor1'),
					'tanggal_publish'	=> $this->input->post('tanggal_publish', TRUE),					
					'status_publish'	=> $this->input->post('status_publish', TRUE)			
				);
			} else {
				$banner = $_FILES['banner'];
				if($banner=''){} else {
					$config['upload_path']	= './assets/banner_berita/';
					$config['allowed_types']        = '*';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('banner')){
						$this->session->set_flashdata('upload', 'Upload Gagal');
					} else {
						$banner = $this->upload->data('file_name');
					}
				}
				$data = array(
						'id_kategori'		=> $this->input->post('id_kategori', TRUE),
						'banner'			=> $banner,
						'judul'				=> $this->input->post('judul_berita', TRUE),
						'slug'				=> slug($this->input->post('judul_berita',TRUE)),
						'deskripsi'			=> $this->input->post('editor1', TRUE),
						'tanggal_publish'	=> $this->input->post('tanggal_publish', TRUE),					
						'status_publish'	=> $this->input->post('status_publish', TRUE)			
					);
			}			
			$this->m_berita->update_berita($id, $data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diupdate !!!');

			redirect('admin/daftar_berita/');	
		}
	}

	//mengupdate data galeri di database
	public function edit_galeri($id)
	{
		$this->form_validation->set_rules('caption', 'Caption', 'required');
		
		if($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle'=> 'daftar_galeri',
				'dummy'	=> $this->m_galeri->get_detail_galeri($id),
				'content' 	=> 'admin/edit_galeri' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} else {	
			if($_FILES['gambar']['size'] == 0) {
				$data = array(
					'caption'			=> $this->input->post('caption', TRUE)		
				);
			} else {
				$gambar = $_FILES['gambar'];
				if($gambar=''){} else {
					$config['upload_path']		= './assets/galeri_gambar/';
					$config['allowed_types']	= '*';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('gambar')){
						$this->session->set_flashdata('upload', 'Upload Gagal');
					} else {
						$gambar = $this->upload->data('file_name');
					}
				}
				$data = array(
						'gambar'			=> $gambar,
						'caption'			=> $this->input->post('caption', TRUE),			
					);
			}			
			$this->m_galeri->update_galeri($id, $data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diupdate !!!');

			redirect('admin/daftar_galeri/');	
		}
	}	

	// public function update_status_keluhan(){		
	// 	if(isset($_REQUEST['sval'])){
	// 		$this->m_keluhan->update_status_keluhan();
	// 		$this->session->set_flashdata('pesan', 'Status Berhasil Diupdate !!!');
	// 		redirect('admin/daftar_keluhan');
	// 	}
	// }

	//mengupdate data approval kolom keluhan di database
	public function edit_approval_keluhan($id)
	{
		$this->form_validation->set_rules('nama_approval', 'Masukkan Nama Approval', 'required');
		$this->form_validation->set_rules('waktu_approval', 'Masukkan Waktu Approval', 'required');
		
		if($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle'=> 'daftar_keluhan',
				'dummy'	=> $this->m_keluhan->get_detail_keluhan($id),
				'content' 	=> 'admin/approval_keluhan' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} else {	
			if($_FILES['bukti_approval']['size'] == 0) {
				$data = array(
						'status'			=> 'SELESAI',
						'nama_approval'		=> $this->input->post('nama_approval', TRUE),
						'waktu_approval'	=> $this->input->post('waktu_approval', TRUE)		
					);
			} else {
				$bukti_approval = $_FILES['bukti_approval'];
				if($bukti_approval=''){} else {
					$config['upload_path']		= './assets/bukti_approval/';
					$config['allowed_types']	= '*';
					$config['encrypt_name'] 	= TRUE;
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('bukti_approval')){
						$this->session->set_flashdata('upload', 'Upload Bukti Approval Gagal');
					} else {
						$bukti_approval = $this->upload->data('file_name');
					}
				}
				$data = array(
						'status'			=> 'SELESAI',
						'nama_approval'		=> $this->input->post('nama_approval', TRUE),
						'waktu_approval'	=> $this->input->post('waktu_approval', TRUE),	
						'bukti_approval'	=> $bukti_approval		
					);
			}			
			$this->m_keluhan->update_data($id, $data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diupdate !!!');

			redirect('admin/daftar_keluhan/');	
		}
	}

	public function hapus_keluhan($id)
	{
		$this->m_keluhan->delete_keluhan($id);
		$this->session->set_flashdata('pesan hapus', 'Data Berhasil Dihapus !!!');
		redirect('admin/daftar_keluhan/delete/'.$id);
	}

	public function hapus_kritik_saran($id)
	{
		$this->m_kritik_saran->delete_kritik_saran($id);
		$this->session->set_flashdata('pesan hapus', 'Data Berhasil Dihapus !!!');
		redirect('admin/daftar_kritik_saran/delete/'.$id);
	}

	public function hapus_kategori_berita($id)
	{
		$this->m_kategori_berita->delete_kategori_berita($id);
		$this->session->set_flashdata('pesan hapus', 'Data Berhasil Dihapus !!!');
		redirect('admin/daftar_kategori_berita/delete/'.$id);
	}

	public function hapus_berita($id)
	{
		$this->m_berita->delete_berita($id);
		$this->session->set_flashdata('pesan hapus', 'Data Berhasil Dihapus !!!');
		redirect('admin/daftar_berita/delete/'.$id);
	}

	public function hapus_galeri($id)
	{
		$this->m_galeri->delete_galeri($id);
		$this->session->set_flashdata('pesan hapus', 'Data Berhasil Dihapus !!!');
		redirect('admin/daftar_galeri/delete/'.$id);
	}

	public function hapus_user($id)
	{
		$this->m_user->delete_user($id);
		$this->session->set_flashdata('pesan hapus', 'Data Berhasil Dihapus !!!');
		redirect('admin/daftar_user/delete/'.$id);
	}

	public function edit_about()
	{
		$this->form_validation->set_rules('about_title', 'Masukkan Title', 'required');
		$this->form_validation->set_rules('about_desc', 'Masukkan Deskripsi', 'required');
		
		if($this->form_validation->run() == FALSE) 
		{
			$data = array(
					'tittle'	=> 'edit_about',
					'dummy'		=> $this->m_about->read_detail_data('id', '1'),
					'content' 	=> 'admin/edit_about' 
				);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} 
		else 
		{
			if($_FILES['about_image']['size'] == 0) 
			{
				$data = array(
						'about_title'		=> $this->input->post('about_title', TRUE),
						'about_desc'		=> $this->input->post('about_desc', TRUE)
					);
			} 
			else 
			{
				$banner = $_FILES['about_image'];
				if($banner != '')
				{
					$config['upload_path']		= './assets/about/';
					$config['allowed_types']	= 'gif|jpg|jpeg|png';
					$config['encrypt_name'] 	= TRUE;
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('about_image'))
					{
						$this->session->set_flashdata('warning', 'Gagal Edit Data karena Gagal Upload Gambar');
						redirect('admin/edit_about/');
					} 
					else 
					{
						$banner = $this->upload->data('file_name');
					}
				}
				$data = array(
						'about_image'	=> $banner,
						'about_title'	=> $this->input->post('about_title', TRUE),
						'about_desc'	=> $this->input->post('about_desc')
					);
			}
			$this->m_about->update_data('1', $data);			

			redirect('admin/edit_about/update');	
		}
	}

	public function daftar_service()
	{
		$data = array(
			'tittle'	=> 'daftar_service',
			'dummy'		=> $this->m_service->read_data(),
			'content' 	=> 'admin/daftar_service' 
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function tambah_service()
	{
		$this->form_validation->set_rules('caption', 'Masukkan Caption', 'required');
		$this->form_validation->set_rules('title', 'Masukkan Judul', 'required');

		if($this->form_validation->run() == FALSE) 
		{
			$data = array(
					'tittle'	=> 'tambah_service',
					'content' 	=> 'admin/tambah_service' 
				);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} 
		else 
		{
			$foto = $_FILES['service_image'];
			if($foto != '')
			{
				$config['upload_path']		= './assets/service/';
				$config['allowed_types']	= 'gif|jpg|jpeg|png';
				$config['encrypt_name'] 	= TRUE;
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('service_image'))
				{
					$this->session->set_flashdata('warning', 'Gagal Tambah Data karena Gagal Upload Gambar');
					redirect('admin/daftar_service/');
				} else 
				{
					$foto = $this->upload->data('file_name');
				}
			}
			$data = array(
					'service_image'		=> $foto,
					'caption'		    => $this->input->post('caption', TRUE),
					'title'		    	=> $this->input->post('title', TRUE)
				);
			$this->m_service->insert_data($data);

			redirect('admin/daftar_service/');	
		}
	}

	public function edit_service($id){	
		$this->form_validation->set_rules('caption', 'Masukkan Caption', 'required');

		if($this->form_validation->run() == FALSE) 
		{
			$data = array(
					'tittle'	=> 'edit_service',
					'dummy'		=> $this->m_service->read_detail_data('id', $id),
					'content' 	=> 'admin/edit_service' 
				);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} 
		else 
		{
			if($_FILES['service_image']['size'] == 0) 
			{
				$data = array(
						'caption'	=> $this->input->post('caption', TRUE),
						'title'		=> $this->input->post('title', TRUE)		
					);
			} 
			else 
			{
				$foto = $_FILES['service_image'];
				if($foto != '')
				{
					$config['upload_path']		= './assets/service/';
					$config['allowed_types']	= 'gif|jpg|jpeg|png';
					$config['encrypt_name'] 	= TRUE;
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('service_image'))
					{
						$this->session->set_flashdata('warning', 'Gagal Edit Data karena Gagal Upload Gambar');
						redirect('admin/daftar_service/');
					} 
					else 
					{
						$foto = $this->upload->data('file_name');
					}
				}
				$data = array(
						'service_image'	=> $foto,
						'caption'		=> $this->input->post('caption', TRUE),
						'title'		=> $this->input->post('title', TRUE)
					);
			}
			$this->m_service->update_data($id, $data);			

			redirect('admin/daftar_service/update/'.$id);	
		}
	}

	public function hapus_service($id)
	{
		$this->m_service->delete_data($id);
		
		redirect('admin/daftar_service/delete/'.$id);
	}

}