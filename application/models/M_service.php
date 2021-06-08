<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_service extends CI_Model
{
    //memasukkan data site_our_team ke database
    public function insert_data($data)
    {
        if($this->read_detail_data('caption', $data['caption']) == null){
            $this->db->insert('site_service', $data);
            $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan !!!');
        } else {
            $this->session->set_flashdata('warning', 'Layanan telah terdaftar !!!');
        }
    }

    //membaca semua data site_our_team pada database
    public function read_data()
    {
        $this->db->select('*');
        $this->db->from('site_service');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
    }

    //membaca detail data site_our_team tertentu berdasarkan context dan data
    public function read_detail_data($context, $data){
        $this->db->select('*');
        $this->db->from('site_service');
        $this->db->where($context, $data);
        return $this->db->get()->row();
    }

    //menghitung banyak data produk
    public function count_all_data(){
        return $this->db->count_all_results('site_service');
    }

    //mengupdate data site_our_team tertentu di database
    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('site_service', $data);
        $this->session->set_flashdata('success', 'Data Berhasil Diupdate !!!');
    }

    //menghapus data site_our_team tertentu di database
    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('site_service');
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus !!!');
    }
}