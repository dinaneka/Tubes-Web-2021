<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_konsul extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'One Life | Jadwal Konsultasi';
        $this->load->view('template/header', $data);
        $this->load->view('jadwal_konsul');
        $this->load->view('template/footer');
    }
}
