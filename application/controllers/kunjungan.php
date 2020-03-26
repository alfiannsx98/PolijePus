<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_kunjungan');
        // is_logged_in();

    }
    public function index()
    {
        $data['title'] = 'Daftar Kunjungan';
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('id_kjn', 'Id_Kunjungan', 'required');
        $this->form_validation->set_rules('tgl', 'Tgl', 'required');
        $this->form_validation->set_rules('nama_kjn', 'Nama_Kunjungan', 'required');
        $this->form_validation->set_rules('nim_nip', 'Nim_Nip', 'required');
        $this->form_validation->set_rules('jk', 'JK', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');

        $data['kunjungan'] = $this->model_kunjungan->getKunjungan();

        $data['kodeunik'] = $this->model_kunjungan->buat_kode();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kunjungan/index', $data);
            $this->load->view('templates/footer');
            // asd
        } else {
            $data = [
                'id_kjn' => ($this->input->post('id_kjn')),
                'tgl' => ($this->input->post('tgl')),
                'nama_kjn' => ($this->input->post('nama_kjn')),
                'nim_nip' => ($this->input->post('nim_nip')),
                'status' => ($this->input->post('status')),
                'prodi' => ($this->input->post('prodi'))
            ];
            $this->db->insert('kunjungan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('kunjungan');
        }
    }
}
