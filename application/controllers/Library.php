<?php

class Library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('lib_model');
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Pencarian Buku';
        $data['koleksi'] = $this->lib_model->getAllKoleksi();
        if($this->input->post('keyword')){
            $data['koleksi'] = $this->lib_model->cariDataKoleksi();
        }
        $this->load->view('lib/header', $data);
        $this->load->view('lib/index', $data);
        $this->load->view('lib/footer');
    }

}