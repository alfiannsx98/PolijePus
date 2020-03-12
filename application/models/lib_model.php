<?php

class lib_model extends CI_Model{
    public function getAllKoleksi()
    {
        $getKoleks = "SELECT `koleksi`.*,`kategori_koleksi`.`nama_kategori` 
        FROM `koleksi` JOIN `kategori_koleksi`
        ON `koleksi`.`id_kategori` = `kategori_koleksi`.`id_kategori`
        ";
        return $this->db->query($getKoleks)->result_array();
    }
    public function getKoleksiById($id_koleksi)
    {
        return $this->db->get_where('koleksi', ['id_koleksi' => $id_koleksi])->row_array();
    }
    public function cariDataKoleksi()
    {
        $getKoleks1 = "SELECT `koleksi`.*,`kategori_koleksi`.`nama_kategori` 
        FROM `koleksi` JOIN `kategori_koleksi`
        ON `koleksi`.`id_kategori` = `kategori_koleksi`.`id_kategori`
        ";

        $keyword = $this->input->post('keyword', true);
        $this->db->like('judul', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('isbn', $keyword);
        $this->db->or_like('penerbit', $keyword);
        $this->db->or_like('penulis', $keyword);
        $this->db->or_like('tahun_terbit', $keyword);
        return $this->db->get('koleksi')->result_array();
    }
}