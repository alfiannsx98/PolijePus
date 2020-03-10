<?php

class model_buku_kategori extends CI_Model
{
    function edit_arsip_jenis($id_kategori_bk, $nama_kategori)
    {
        $hasl = $this->db->query("UPDATE kategori_buku SET nama_kategori='$nama_kategori' WHERE id_kategori_bk='$id_kategori_bk'");
        return $hasl;
    }
    function hapus_arsip_jenis($id_kategori_bk)
    {
        $hsil = $this->db->query("DELETE kategori_buku WHERE id_kategori_bk='$id_kategori_bk'");
        return $hsil;
    }
}