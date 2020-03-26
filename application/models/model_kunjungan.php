<?php

class model_kunjungan extends CI_Model
{
    function getKunjungan()
    {
        // $getKunjungan = "SELECT `kunjungan`.*,`kategori_kunjungan`.`nama_kategori` 
        // FROM `kunjungan` JOIN `kategori_kunjungan`
        // ON `kunjungan`.`id_kategori` = `kategori_kunjungan`.`id_kategori`
        // ";
        $getKunjungan = "SELECT * FROM kunjungan";
        return $this->db->query($getKunjungan)->result_array();
    }

    public function buat_kode()
    {

        $this->db->select('RIGHT(kunjungan.id_kjn,4) as kode', FALSE);
        $this->db->order_by('id_kjn', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('kunjungan');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "KJN" . $kodemax;    // hasilnya KJN-9921-0001 dst.
        return $kodejadi;
    }
}
