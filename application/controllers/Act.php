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
		if($this->session->userdata('id_pelanggan_pengaduan'))
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
		else
		{
			redirect('act/login/');	
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
				$data = array(
					'id_pelanggan'		=> $id,
					'nama'              => $this->input->post('nama', TRUE),
					'tanggal'			=> date('Y-m-d'),	
					'Status'			=> 1,	
					'kritik_saran'		=> $this->input->post('form_isian', TRUE)
				);
			}else{
				$data = array(
					'id_pelanggan'		=> $id,	
					'nama'              => $this->input->post('nama', TRUE),
					'tanggal'			=> date('Y-m-d'),	
					'Status'			=> 0,	
					'kritik_saran'		=> $this->input->post('form_isian', TRUE)
				);
			}
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
			'dummy_keluhan_ditolak'	=> $this->m_keluhan->read_ditolak_per_month(),
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
	    $this->load->model('m_service');
		$data = array(
			'tittle'	=> 'layanan',
			'service'	=> $this->m_service->read_data(),
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
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);
		$nilai = $this->m_user->cek_login_user($email,$password);
		
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
		$this->form_validation->set_rules('telepon', 'Telepon:', 'required|trim');
		$this->form_validation->set_rules('email', 'Email:', 'required|trim');
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
					'email'			=> $this->input->post('email', TRUE),
					'password' 		=> md5($this->input->post('password', TRUE))
				);
			$this->load->model('m_user');
			if($this->m_user->register_user($data) == true) {
				$this->session->set_flashdata('pesan_register_pengaduan', 'Akun Berhasil Terdaftar !!!');
			}
		}
		redirect('act/register');
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			//masukkan email gmail valid disini semisal admin@gmail.com
			'smtp_user' => 'pengaduanplnkepanjen@gmail.com',
			//masukkan password email gmail valid disini semisal 123
			'smtp_pass' => 'pengaduanPLN',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];
		$this->load->library('email');
		$this->email->initialize($config);
		
		//masukkan email gmail valid disini semisal admin@gmail.com
		$this->email->from('pengaduanplnkepanjen@gmail.com', 'Admin Web Pengaduan');
		$this->email->to($this->input->post('email', TRUE));
		if($type == 'lupa_password') 
		{
			$this->email->subject('Konfirmasi Lupa Password Akun Pelanggan PLN Kepanjen');
			$this->email->message('Halo Pelanggan,<br><br>Berdasarkan permintaan anda melalui 
				website resmi PLN Kepanjen untuk email ' . $this->input->post('email', TRUE) . ', 
				<br>Klik link berikut untuk mengganti password Anda :<br><br><a href="' . base_url() 
				. 'act/reset_password?email=' . $this->input->post('email', TRUE) . '&token='
				. urlencode($token). '">Reset Password</a><br><a href="' . base_url() 
				. 'act/reset_password?email=' . $this->input->post('email', TRUE) . '&token='
				. urlencode($token). '">Reset Password</a><br><a href="' . base_url() 
				. 'act/reset_password?email=' . $this->input->post('email', TRUE) . '&token='
				. urlencode($token). '">Reset Password</a><br><br>Kami sarankan Anda untuk segera 
				menggantinya.<br><br>Terima Kasih<br>PLN Kepanjen<br>website resmi PLN Kepanjen');
		}

		if($this->email->send()) 
		{
			return true;
		} 
		else 
		{
			echo $this->email->print_debugger();
			die;
		}
	}

	public function lupa_password()
	{
		//$this->form_validation->set_rules('telepon', 'Telepon:', 'required|trim');
		$this->form_validation->set_rules('email', 'Email:', 'required|trim');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('frontend/v_lupa_password');
		} 
		else 
		{
			$email = $this->input->post('email', TRUE);
			//$no_telepon	= $this->input->post('telepon', TRUE);

			//$user = $this->db->get_where('pelanggan', ['email' => $email, 'no_telepon' => $no_telepon])->row_array();
	        $user = $this->db->get_where('pelanggan', ['email' => $email])->row_array();


			if($user)
			{
				$token = base64_encode(random_bytes(32));

				$this->db->set('email', $email);
				$this->db->set('token', $token);
				$this->db->set('created_at', 'NOW()', FALSE);
				$this->db->insert('token_pelanggan');

				$this->_sendEmail($token, 'lupa_password');
				
				$this->session->set_flashdata('pesan_lupa_password_pengaduan', 'Silahkan cek email untuk melakukan Reset Password');
				redirect('act/lupa_password');
			} 
			else 
			{
				$this->session->set_flashdata('pesan_lupa_password_pengaduan', 'Email atau No Telepon Invalid !!!');
				redirect('act/lupa_password');
			}			
		}
	}

	public function reset_password()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

		if($user)
		{
			$token_pelanggan = $this->db->get_where('token_pelanggan', ['token' => $token])->row_array();

			if($token_pelanggan)
			{
				$this->session->set_userdata('email_reset_password_account', $email);
				$this->change_password();
			}
			else
			{
				$this->session->set_flashdata('pesan_login_pengaduan', 'Gagal Reset Password! Token Invalid.');
				redirect('act/login');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan_login_pengaduan', 'Gagal Reset Password! Email Invalid.');
			redirect('act/login');
		}
	}

	public function change_password()
	{
		if(!$this->session->userdata('email_reset_password_account'))
		{
			redirect('act/login');
		}

		$this->form_validation->set_rules('password1', 'Password:', 'required|trim');
		$this->form_validation->set_rules('password2', 'Confirm Password:', 'required|trim');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('frontend/v_change_password');
		} 
		else 
		{
			$password1 = $this->input->post('password1', TRUE);
			$password2 = $this->input->post('password2', TRUE);

			if($password1 != $password2)
			{
				$this->session->set_flashdata('pesan_change_password_pengaduan', 'Gagal Ganti Password! Password tidak sesuai dengan Confirm Password.');
				redirect('act/change_password');
			}

			$password = md5($password1);
			$email = $this->session->userdata('email_reset_password_account');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('pelanggan');

			$this->db->delete('token_pelanggan',['email' => $email]);

			$this->session->unset_userdata('email_reset_password_account');
			
			$this->session->set_flashdata('pesan_login_pengaduan', 'Password berhasil diganti! Silahkan Login.');
			redirect('act/login');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url('act/login'));
	}
}
