<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_dokter extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'One Life | Dokter';
        $this->load->view('template/header', $data);
        $this->load->view('template/cari');
        $this->load->view('list_dokter');
        $this->load->view('template/footer');
    }
}
