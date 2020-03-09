<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_kategori');
        $this->load->model('model_post');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Post';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        $data['Kategori'] = $this->model_post->getKategori();
        $data['getKategori'] = $this->db->get('kategori')->result_array();



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('cms/index', $data);
            $this->load->view('templates/footer');
        } else {

            $token = base64_encode(random_bytes(8));

            $upload_image = $_FILES['gambar'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/post/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gmbr_baru = $this->upload->data('file_name');
                    $data = [
                        'judul' => ($this->input->post('judul')),
                        'id_kategori' => ($this->input->post('id_kategori')),
                        'isi' => ($this->input->post('isi')),
                        'id_user' => ($this->input->post('id_user')),
                        'tanggal' => time(),
                        'slug' => $token,
                        'gambar' => $gmbr_baru
                    ];
                    $this->db->insert('post', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
                    redirect('cms');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
    public function hapus_post()
    {
        $id_post = $this->input->post('id_post');
        $this->model_post->hapus_post($id_post);
        redirect('cms');
    }
    public function edit()
    {

        $judul = $this->input->post('judul');
        $id = $this->input->post('id_post');
        $kategori = $this->input->post('id_kategori');

        $upload_gambar = $_FILES['gambar'];

        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/post/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $gmbr_lawas = $kategori['post']['gambar'];
                if ($gmbr_lawas != 'default.jpg') {
                    unlink(FCPATH . '/assets/img/post/' . $gmbr_lawas);
                }
                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('gambar', $gambar_baru);
            } else {
                echo $this->upload->display_errors();
            }
        };

        $this->db->set('judul', $judul);
        $this->db->set('id_kategori', $kategori);
        $this->db->where('id_post', $id);
        $this->db->update('post');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Data telah diperbarui</div>');
        redirect('cms');
    }
    public function kategori()
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('cms/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('kategori', ['kategori' => $this->input->post('kategori')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('cms/kategori');
        }
    }
    public function edit_kategori()
    {
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');
        $this->model_kategori->edit_kategori($id, $kategori);
        redirect('cms/kategori');
    }
    public function hapus_kategori()
    {
        $id = $this->input->post('id');
        $this->model_kategori->hapus_kategori($id);
        redirect('cms/kategori');
    }
}
