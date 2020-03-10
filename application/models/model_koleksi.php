<?php

class model_koleksi extends CI_Model
{
    function getKoleksi()
    {
        $getKoleks = "SELECT `koleksi`.*,`kategori_koleksi`.`nama_kategori` 
        FROM `koleksi` JOIN `kategori_koleksi`
        ON `koleksi`.`id_kategori` = `kategori_koleksi`.`id_kategori`
        ";
        return $this->db->query($getKoleks)->result_array();
    }
    function edit_koleksi($id_koleksi, $judul, $nim, $isbn, $penerbit, $penulis, $tahun_terbit)
    {
        $hsl = $this->db->query("UPDATE koleksi SET judul='$judul', nim='$nim', isbn='$isbn', penerbit='$penerbit', penulis='$penulis', tahun_terbit='$tahun_terbit' WHERE id_koleksi='$id_koleksi'");
        return $hsl;
    }
    function hapus_koleksi($id_koleksi)
    {
        $hasil = $this->db->query("DELETE FROM koleksi WHERE id_koleksi='$id_koleksi'");
        return $hasil;
    }
}