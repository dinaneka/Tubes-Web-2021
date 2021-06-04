<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'One Life | Profile';
        $this->load->view('template/header', $data);
        $this->load->view('profil');
        $this->load->view('template/footer');
    }
    public function profil_dokter()
    {
        $data['title'] = 'One Life | Profile';
        $this->load->view('template/header', $data);
        $this->load->view('profil_dokter');
        $this->load->view('template/footer');
    }
}
