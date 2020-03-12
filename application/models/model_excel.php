<?php

class Model_excel extends CI_Model
{
    function select()
    {
        $this->db->order_by('id_koleksi', 'DESC');
        $query = $this->db->get('koleksi');
        return $query;
    }
}