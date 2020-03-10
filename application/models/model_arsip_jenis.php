<?php

class model_arsip_jenis extends CI_Model
{
    function edit_arsip_jenis($id_jns_arsip, $jns_arsip)
    {
        $hsl = $this->db->query("UPDATE jenis_arsip SET jns_arsip='$jns_arsip' WHERE id_jns_arsip='$id_jns_arsip'");
        return $hsl;
    }
    function hapus_arsip_jenis($id_jns_arsip)
    {
        $hasil = $this->db->query("DELETE jenis_arsip WHERE id_jns_arsip='$id_jns_arsip'");
        return $hasil;
    }
}