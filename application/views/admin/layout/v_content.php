<?php
if(!$this->session->userdata('id_admin_pengaduan')){
	redirect('admin');
}
if ($content) {
	$this->load->view($content);
}