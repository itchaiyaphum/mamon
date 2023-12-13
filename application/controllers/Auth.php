<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function index()
    {
        redirect('/auth/login');
    }

    public function login()
    {
        $this->load->library('form_validation');
        $this->load->model('auth_model');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->form_validation->run()==true) {
            $status = $this->auth_model->checklogin($email, $password);
            if ($status == true) {
                redirect('/');
            }
        }

        $this->load->view('auth/login');
    }
}
