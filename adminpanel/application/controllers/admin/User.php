<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    public function index()
    {
        $data['users'] = $this->User_model->get_all();
        $this->load->view('user/user_list', $data);
    }

    public function add()
    {
        $this->load->view('user/user_create');
    }
    
    public function create()
    {
        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),

        );
        
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();
            $data['image'] = $image['file_name'];
        }
        
        $this->User_model->insert($data);
        redirect('admin/user', $data);
    }

    public function edit($id)
    {
        $data['upload'] = $this->User_model->get_by_id($id);
        $this->load->view('user/user_update', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array(
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'password' => $password,
        );

        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();
            $upload = $this->User_model->get_by_id($id);
            if (file_exists('assets/upload/images/'.$upload->image) && $upload->image) {
                unlink('assets/upload/images/'.$upload->image);
            }

            $data['image'] = $image['file_name'];
        }

        $this->User_model->update($data, $id);
        redirect('admin/user');
    }

    private function _do_upload()
    {
        
        $config['upload_path']          = './assets/upload/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('image'))
        {
          return $this->upload->display_errors();
        }
        else
        {
            return $this->upload->data();

        }

    }
        
    public function delete($id)
    {
        $upload = $this->User_model->get_by_id($id);
        if (file_exists('assets/upload/images/'.$upload->image) && $upload->image) {
            unlink('assets/upload/images/'.$upload->image);
        }
        $this->User_model->delete($id);
        redirect('');
    }
}