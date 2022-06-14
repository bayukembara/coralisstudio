<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function rrules()
    {
        return [
      [
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'email',
        'label' => 'E-mail',
        'rules' => 'trim|required|valid_email'
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required|min_length[5]|matches[re-password]'
      ],
      [
        'field' => 're-password',
        'label' => 'Re-Password',
        'rules' => 'trim|required|min_length[5]|matches[password]'
      ],
    ];
    }

    public function lrules()
    {
        return [
      [
        'field' => 'email',
        'label' => 'E-mail',
        'rules' => 'trim|required|valid_email'
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required'
      ],
    ];
    }

    public function erules()
    {
        return [
      [
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required|min_length[5]'
      ],
      ];
    }

    public function frules()
    {
        return [
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email'
      ],
      ];
    }

    public function prules()
    {
        return [
        [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required|min_length[5]|matches[re-password]'
      ],
      [
        'field' => 're-password',
        'label' => 'Re-Password',
        'rules' => 'trim|required|min_length[5]|matches[password]'
      ],
      ];
    }

    public function save()
    {
        $data = [
          'name' => $this->input->post('name'),
          'email' => $this->input->post('email'),
          'password' => hash("sha512", md5($this->input->post('password'))),
          'status' => 1,
          'picture' => 'default.jpg'
                ];
        return $this->db->insert('user', $data);
    }

    public function edit()
    {
        $data = [
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
      ];
        $upload_images =$_FILES['image']['name'];

        if ($upload_images) {
            $config =[
          'allowed_types' => 'jpg|png',
          'max_size' => '2048',
          'upload_path' => 'assets/img/picture'
        ];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                return  $this->session->set_flashdata('message', $this->upload->display_errors('<div id="message" class="alert alert-danger" role="alert">', '</div>'));
            } else {
                $old_image = $data['user']['picture'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH.'../../assets/img/picture/'.$old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('picture', $new_image);
                }
            }
        }

        $this->db->set('name', $data);
        $this->db->where('email', $data['email']);
        $this->db->update('user', $data);
    }

    public function repassword()
    {
        $id = $this->session->userdata('id');
        $data = ['password' => hash("sha512", md5($this->input->post('password')))
        ];
        $this->db->set('password', $data);
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}