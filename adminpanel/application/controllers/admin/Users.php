<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['users'] = $this->Users_model->get_all();
        $this->load->view('users/users_list', $data);
    }
    public function add()
    {
        $this->load->view('users/users_create');
    }
    public function create()
    {
        // Form validation rules
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^[a-zA-Z0-9._%+-]+@gmail\.com$/]|is_unique[users_tbl.email]', [
            'required' => 'You must provide a %s.',
            'valid_email' => 'The %s must be a valid email address.',
            'regex_match' => 'The %s must be in the format example@gmail.com.',
            'is_unique' => 'This %s already exists. Please use a different email.'
        ]);
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]', [
            'required' => 'You must provide a %s.',
            'regex_match' => 'The %s must be a valid 10-digit number.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('users/users_create');
        } 
        else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
            );
            if (!empty($_FILES['images']['name'][0])) {
                $images = $this->_do_upload_multiple();
                if ($images) {
                    $data['images'] = json_encode($images);
                }
            }
            $inserted = $this->Users_model->insert($data);
            if ($inserted) {
                $this->session->set_flashdata('success', 'User added successfully!');
            } 
            else {
                $this->session->set_flashdata('error', 'Failed to add the user. Please try again.');
            }
            redirect('admin/users');
        }
    }
    public function edit($id)
    {
        $data['user'] = $this->Users_model->get_by_id($id);
        $this->load->view('users/users_update', $data);
    }
    public function update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $existing_user = $this->Users_model->get_by_id($id);
        $current_email = $existing_user->email;
        $new_email = $this->input->post('email');

        if ($new_email != $current_email) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^[a-zA-Z0-9._%+-]+@gmail\.com$/]|is_unique[users_tbl.email]', [
                'required' => 'You must provide a %s.',
                'valid_email' => 'The %s must be a valid email address.',
                'regex_match' => 'The %s must be in the format example@gmail.com.',
                'is_unique' => 'This %s already exists. Please use a different email.'
            ]);
        } 
        else {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^[a-zA-Z0-9._%+-]+@gmail\.com$/]', [
                'required' => 'You must provide a %s.',
                'valid_email' => 'The %s must be a valid email address.',
                'regex_match' => 'The %s must be in the format example@gmail.com.'
            ]);
        }
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]', [
            'required' => 'You must provide a %s.',
            'regex_match' => 'The %s must be a valid 10-digit number.'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $new_email,
                'mobile' => $this->input->post('mobile'),
            );
            if (!empty($_FILES['images']['name'][0])) {
                $existing_images = json_decode($existing_user->images, true);
                
                if ($existing_images) {
                    foreach ($existing_images as $image) {
                        if (file_exists('./assets/upload/images/' . $image)) {
                            unlink('./assets/upload/images/' . $image);
                        }
                    }
                }

                $images = $this->_do_upload_multiple();
                if ($images) {
                    $data['images'] = json_encode($images);
                }
            }
            $this->Users_model->update($data, $id);
            $this->session->set_flashdata('success', 'User updated successfully!');
            redirect('admin/users');
        }
    }
    private function _do_upload_multiple()
    {
        $config['upload_path']   = './assets/upload/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);
        $images = [];
        $files = $_FILES['images'];

        $count = count($files['name']);
        $upload_errors = [];

        for ($i = 0; $i < $count; $i++) {
            $_FILES['file']['name'] = $files['name'][$i];
            $_FILES['file']['type'] = $files['type'][$i];
            $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['file']['error'] = $files['error'][$i];
            $_FILES['file']['size'] = $files['size'][$i];

            if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();
                $images[] = $data['file_name'];
            } else {
                $upload_errors[] = $this->upload->display_errors();
            }
        }

        if (!empty($upload_errors)) {
            $this->session->set_flashdata('upload_errors', implode('<br>', $upload_errors));
        }

        return $images;
    }
    public function delete($id)
    {
        $existing_user = $this->Users_model->get_by_id($id);
        $existing_images = json_decode($existing_user->images, true);
        
        if ($existing_images) {
            foreach ($existing_images as $image) {
                if (file_exists('./assets/upload/images/' . $image)) {
                    unlink('./assets/upload/images/' . $image);
                }
            }
        }

        $this->Users_model->delete($id);
        $this->session->set_flashdata('success', 'User deleted successfully!');
        redirect('admin/users');
    }
}





