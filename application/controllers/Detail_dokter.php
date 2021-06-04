<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_dokter extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'One Life | Rincian Dokter';
        $this->load->view('template/header', $data);
        $this->load->view('Detail_dokter');
        $this->load->view('template/footer');
    }
}
