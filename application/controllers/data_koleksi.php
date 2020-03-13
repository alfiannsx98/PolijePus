<?php

class data_koleksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('lib_model');
        $this->load->library('form_validation');
        $this->load->model('model_koleksi');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Pencarian Buku';

        $this->load->model('lib_model', 'koleksi');
        

        $this->load->library('pagination');

        // Ambil data keyword
        if($this->input->post('keyword')){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        }else{
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // $config['base_url'] = 'http://localhost/polijepus/data_koleksi/index';
        $this->db->like('judul', $data['keyword']);
        $this->db->from('koleksi');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        // $config['num_links'] = 5;

        

        // inisialisasi
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['koleksi'] = $this->koleksi->getLibrary($config['per_page'], $data['start'], $data['keyword']);

        // if($this->input->post('keyword')){
        //     $data['koleksi'] = $this->lib_model->cariDataKoleksi();
        // }
        $this->load->view('lib/header', $data);
        $this->load->view('lib/index', $data);
        $this->load->view('lib/footer');
    }

    public function reset() {

        $this->load->library('pagination');

        $this->load->model('lib_model', 'koleksi');
        $data['koleksi'] = $this->model_koleksi->getKoleksi();
        $this->session->unset_userdata('keyword');

        $this->load->view('lib/header', $data);
        $this->load->view('lib/index', $data);
        $this->load->view('lib/footer');

        redirect('data_koleksi');

    }



}