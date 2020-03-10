<?php

class model_buku extends CI_Model
{
    function getBuku()
    {
        $getBk = "SELECT `buku`.*,`kategori_buku`.`nama_kategori` 
        FROM `buku` JOIN `kategori_buku`
        ON `buku`.`id_ktg` = `kategori_buku`.`id_kategori_bk`
        ";
        return $this->db->query($getBk)->result_array();
    }
    function edit_arsip($kode_buku, $judul, $penerbit, $pengarang)
    {
        $hasl = $this->db->query("UPDATE buku SET judul='$judul', penerbit='$penerbit', pengarang='$pengarang' WHERE kode_buku='$kode_buku'");
        return $hasl;
    }
    function hapus_arsip($kode_buku)
    {
        $hsil = $this->db->query("DELETE FROM buku WHERE kode_buku='$kode_buku'");
        return $hsil;
    }
}