<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('M_user', 'user');
    }


    public function index()
    {
        $data['title'] = "Coralis Web";
        $model = $this->user;
        $validation = $this->form_validation->set_rules($model->lrules());
        if ($validation->run()==false) {
            $this->load->view('template/header', $data);
            $this->load->view('auth/index');
            $this->load->view('template/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = hash("sha512", md5($this->input->post('password')));
        $user= $this->db->get_where('user', ['email' => $email])->row_array();

        // echo $password;
        // echo '<br>';
        // echo $user['password'];

        if ($user) {
            if ($user['status'] == 1) {
                if ($password=== $user['password']) {
                    $data = [
                        'email' => $user['email'],
                        'name' => $user['name'],
                        'picture' => $user['picture']
                    ];
                    $this->session->set_userdata($data);
                    redirect('landing/index');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
            redirect('auth');
        }
    }


    public function register()
    {
        $data['title'] = "Registration Coralis";
        $model = $this->user;
        $validation = $this->form_validation->set_rules($model->rrules());

        if ($validation->run()) {
            $model->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Account has been created.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
            redirect(base_url());
        }
        $data['title'] = "Registration Form";
        $this->load->view('template/header', $data);
        $this->load->view('auth/register');
        $this->load->view('template/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');

        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">You have been logged out!</div>');
        redirect(base_url());
    }

    public function lupa()
    {
        $data['title'] = 'Reset Password';
        $this->load->view('template/header', $data);
        $this->load->view('auth/lupa');
        $this->load->view('template/footer');
    }
}