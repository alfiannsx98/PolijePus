<?php
class model_kategori extends CI_Model
{
    function edit_kategori($id, $kategori)
    {
        $hsl = $this->db->query("UPDATE kategori SET kategori = '$kategori' WHERE id='$id'");
        return $hsl;
    }
    function hapus_kategori($id)
    {
        $hasil = $this->db->query("DELETE FROM kategori WHERE id='$id'");
        return $hasil;
    }
}
