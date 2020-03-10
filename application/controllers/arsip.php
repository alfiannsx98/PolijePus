<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_arsip');
        $this->load->model('model_arsip_jenis');
        
    }
    public function index()
    {
        $data['title'] = 'Arsip';
        $data['user'] = $this->db->get_where('user', [
            'email'=> $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('abstrak', 'Abstrak', 'required');

        $data['arsip'] = $this->model_arsip->getArsip();
        $data['getArsipJenis'] = $this->db->get('jenis_arsip')->result_array();

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('arsip/index', $data);
            $this->load->view('templates/footer');
            // asd
        }else{
            $data = [
                'nim' => ($this->input->post('nim')),
                'judul' => ($this->input->post('judul')),
                'abstrak' => ($this->input->post('abstrak')),
                'keywords' => ($this->input->post('keywords')),
                'id_jns_arsip' => ($this->input->post('id_jns_arsip'))
            ];
            $this->db->insert('arsip', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('arsip');
        }
    }
    public function hapus_arsip()
    {
        $nim = $this->input->post('nim');
        $this->model_arsip->hapus_arsip($nim);
        redirect('arsip');
    }
    public function edit_arsip()
    {
        $nim = $this->input->post('nim');
        $judul = $this->input->post('judul');
        $abstrak = $this->input->post('abstrak');
        $keywords = $this->input->post('keywords');
        $id_jns_arsip = $this->input->post('id_jns_arsip');

        $this->db->set('judul', $judul);
        $this->db->set('abstrak', $abstrak);
        $this->db->set('keywords', $keywords);
        $this->db->set('id_jns_arsip', $id_jns_arsip);
        $this->db->where('nim', $nim);
        $this->db->update('arsip');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Data telah Berhasil Diperbarui</div>');
        redirect('arsip');
    }
}
