<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_buku');
        $this->load->model('model_buku_kategori');
    }
    public function index()
    {
        $data['title'] = 'Buku';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        $data['buku'] = $this->model_post->getKategori();
        $data['getBukuKategori'] = $this->db->get('kategori')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_buku' => ($this->input->post('kode_buku')),
                'judul' => ($this->input->post('judul')),
                'penerbit' => ($this->input->post('penerbit')),
                'pengarang' => ($this->input->post('pengarang')),
                'id_ktg' => ($this->input->post('id_ktg'))
            ];
            $this->db->insert('buku', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('buku');
        }
    }
}