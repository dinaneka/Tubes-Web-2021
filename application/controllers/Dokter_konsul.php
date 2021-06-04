<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_konsul extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'One Life | List Konsultasi';
        $this->load->view('template/header', $data);
        $this->load->view('dokter_konsul');
        $this->load->view('template/footer');
    }
}
