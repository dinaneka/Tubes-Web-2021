<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'One Life | Cari Dokter';
        $this->load->view('template/header', $data);
        $this->load->view('template/cari');
        $this->load->view('Cari');
        $this->load->view('template/footer');
    }
}
