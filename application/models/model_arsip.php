<?php

class model_arsip extends CI_Model
{
    function getArsip()
    {
        $getArsp = "SELECT `arsip`.*,`jenis_arsip`.`jns_arsip` 
        FROM `arsip` JOIN `jenis_arsip`
        ON `arsip`.`id_jns_arsip` = `jenis_arsip`.`id`
        ";
        return $this->db->query($getArsp)->result_array();
    }
    function edit_arsip($nim, $judul, $abstrak, $keywords)
    {
        $hsl = $this->db->query("UPDATE arsip SET judul='$judul', abstrak='$abstrak', keywords='$keywords' WHERE nim='$nim'");
        return $hsl;
    }
    function hapus_arsip($nim)
    {
        $hasil = $this->db->query("DELETE FROM arsip WHERE nim='$nim'");
        return $hasil;
    }
}