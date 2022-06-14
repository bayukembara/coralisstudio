<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupa extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('m_user', 'user');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $user = $this->db->get_where('user')->row_array();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Reset Password';
            $this->load->view('template/header', $data);
            $this->load->view('auth/lupa', $data);
            $this->load->view('template/footer', );
        } else {
            $email = $this->input->post('email');

            if ($email === $user['email']) {
                $data = [
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);
                redirect('lupa/reset', $data);
            } else {
                $this->load->view('template/header');
                $this->load->view('auth/lupa');
                $this->load->view('template/footer');
            }
        }
    }

    public function reset()
    {
        $data['title'] = 'Reset Password';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $model = $this->user;
        $validation = $this->form_validation->set_rules($model->prules());
        if ($validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('auth/reset');
            $this->load->view('template/footer');
        } else {
            $model->repassword();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Account has been updated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
            redirect('auth');
        }
    }
}