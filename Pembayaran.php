<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'One Life | Pembayaran';
        $this->load->view('template/header', $data);
        $this->load->view('pembayaran');
        $this->load->view('template/footer');
    }
}
