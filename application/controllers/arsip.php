<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_arsip');
        $this->load->model('model_arsip_jenis');
        is_logged_in();
    }
    public function index()
    {
        
    }
}
