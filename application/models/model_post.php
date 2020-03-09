<?php
class model_post extends CI_Model
{
    function getKategori()
    {
        $getKtg = "SELECT `post`.*,`kategori`.`kategori`,`user`.`nama`
            FROM `post` JOIN `kategori`
            ON `post`.`id_kategori` = `kategori`.`id`
            JOIN `user`
            ON `post`.`id_user` = `user`.`id`
        ";
        return $this->db->query($getKtg)->result_array();
    }
    function edit_post($id_post, $judul)
    {
        $hsl = $this->db->query("UPDATE post SET judul = '$judul' WHERE id_post='$id_post'");
        return $hsl;
    }
    function hapus_post($id_post)
    {
        $hasil = $this->db->query("DELETE FROM post WHERE id_post='$id_post'");
        return $hasil;
    }
}
