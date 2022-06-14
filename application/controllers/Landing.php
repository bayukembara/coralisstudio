<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
    }
    public function index()
    {
        $data['title'] = 'Personal Information';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('landing/index', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $data['title'] = 'Personal Information';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user =$this->user;
        $validation = $this->form_validation->set_rules($user->erules());

        if ($validation->run()==false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('landing/index', $data);
            $this->load->view('template/footer');
        } else {
            $user->edit();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Account has been updated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
            redirect('landing/index');
        }
    }
};