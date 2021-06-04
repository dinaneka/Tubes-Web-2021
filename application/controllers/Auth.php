<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'One Life | Login';
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('login', $data);
        } else {
            $this->login();
        }
    }
    private function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $pasien = $this->db->get_where('pasien', ['email' => $email])->row_array();
        if ($pasien) {
            if (password_verify($password, $pasien['password'])) {
                $data = [
                    'email' => $pasien['email'],
                    'nama' => $pasien['nama_pasien'],
                    'id_role' => $pasien['id_role']
                ];
                $this->session->set_userdata($data);
                redirect('Welcome');
            } else {
                $this->session->set_flashdata('message', '<div class="succes">wrong password</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="succes">email is not registered</div>');
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No hp', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pasien.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'One Life | Register';
            $this->load->view('register', $data);
        } else {
            $this->load->Auth_model->registrasi_pasien();
            $this->session->set_flashdata('message', '<div class="succes">Your account has been created </div>');
            redirect('Auth');
        }
    }
    public function registerdokter()
    {
        $data['title'] = 'One Life | Bergabung bersama tim dokter ';
        $this->load->view('template/header', $data);
        $this->load->view('register_dokter');
        $this->load->view('template/footer');
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama_pasien');
        $this->session->unset_userdata('id_role');
        redirect('Welcome');
    }
}
