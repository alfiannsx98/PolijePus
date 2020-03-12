<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koleksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_koleksi');
        // is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Koleksi';
        $data['user'] = $this->db->get_where('user', [
            'email'=> $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('id_koleksi', 'Id_koleksi', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun_terbit', 'required');

        $data['koleksi'] = $this->model_koleksi->getKoleksi();
        $data['getKategoriKoleksi'] = $this->db->get('kategori_koleksi')->result_array();

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('koleksi/index', $data);
            $this->load->view('templates/footer');
            // asd
        }else{
            $data = [
                'id_koleksi' => ($this->input->post('id_koleksi')),
                'judul' => ($this->input->post('judul')),
                'nim' => ($this->input->post('nim')),
                'isbn' => ($this->input->post('isbn')),
                'penerbit' => ($this->input->post('penerbit')),
                'penulis' => ($this->input->post('penulis')),
                'tahun_terbit' => ($this->input->post('tahun_terbit')),
                'id_kategori' => ($this->input->post('id_kategori'))
            ];
            $this->db->insert('koleksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('koleksi');
        }
    }
    public function hapus_koleksi()
    {
        $id_koleksi = $this->input->post('id_koleksi');
        $this->model_koleksi->hapus_koleksi($id_koleksi);
        redirect('koleksi');
    }
    public function edit_koleksi()
    {
        $id_koleksi= $this->input->post('id_koleksi');
        $judul = $this->input->post('judul');
        $nim = $this->input->post('nim');
        $isbn = $this->input->post('isbn');
        $penerbit = $this->input->post('penerbit');
        $penulis= $this->input->post('penulis');
        $tahun_terbit= $this->input->post('tahun_terbit');
        $id_kategori= $this->input->post('id_kategori');

        $this->db->set('judul', $judul);
        $this->db->set('nim', $nim);
        $this->db->set('isbn', $isbn);
        $this->db->set('penerbit', $penerbit);
        $this->db->set('penulis', $penulis);
        $this->db->set('tahun_terbit', $tahun_terbit);
        $this->db->where('id_koleksi', $id_koleksi);
        $this->db->update('koleksi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Data telah Berhasil Diperbarui</div>');
        redirect('koleksi');
    }
    public function kategori_koleksi()
    {
        $data['title'] = 'Kategori Koleksi';
        $data['user'] = $this->db->get_where('user',[
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('nama_kategori', 'Nama_kategori', 'required');

        $data['kategori_koleksi'] = $this->db->get('kategori_koleksi')->result_array();

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('koleksi/kategori_koleksi', $data);
            $this->load->view('templates/footer');
        }else{
            $this->db->insert('kategori_koleksi', ['nama_kategori' => $this->input->post('nama_kategori')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('koleksi/kategori_koleksi');
        }
    }
    public function edit_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
        $this->model_koleksi->edit_kategori($id_kategori, $nama_kategori);
        redirect('koleksi/kategori_koleksi');
    }
    public function hapus_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $this->model_koleksi->hapus_kategori($id_kategori);
        redirect('koleksi/kategori_koleksi');
    }
    // Fungsi untuk upload excel untuk diconvert menjadi database.
    public function upload()
    {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()){

            // upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');

            redirect('koleksi');
        }else{
            $data_upload = $this->upload->data();

            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('excel/'.$data_upload['file_name']);
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
            $data = array();

            $numrow = 1;
            foreach($sheet as $row){
                if($numrow > 1){
                    array_push($data, array(
                        'id_koleksi' => $row['A'],
                        'judul' => $row['B'],
                        'nim' => $row['C'],
                        'isbn' => $row['D'],
                        'penerbit' => $row['E'],
                        'penulis' => $row['F'],
                        'tahun_terbit' => $row['G'],
                        'nama_kategori' => $row['H'],
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('koleksi', $data);

            unlink(realpath('excel/'.$data_upload['file_name']));

            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');

            redirect('koleksi');
        }
    }
}
