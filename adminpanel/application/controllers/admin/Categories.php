<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model'); 
        $this->load->library(['form_validation', 'upload']);
        $this->load->helper(['url', 'form']);
    }
    public function index() {
        $data['categories'] = $this->Category_model->get_all_categories();
        $this->load->view('categories/categories_list', $data);
    }
    public function add() {
        $this->load->view('categories/add_category');
    }
public function create() {
    $this->form_validation->set_rules('category_name', 'Category Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
    if ($this->form_validation->run() === FALSE) {
        echo json_encode(['error' => validation_errors()]);
        return;
    }
    $data = [
        'category_name' => $this->input->post('category_name'),
        'description' => $this->input->post('description'),
    ];
    if (!empty($_FILES['image']['name'])) {
        $upload_result = $this->handle_image_upload();
        if (isset($upload_result['error'])) {
            echo json_encode(['error' => $upload_result['error']]);
            return;
        }
        $data['image'] = $upload_result['file_name'];
    }
    $this->Category_model->create_category($data);
    echo json_encode(['success' => true, 'message' => 'Category added successfully!']);
}
    public function edit($id) {
        $data['category'] = $this->Category_model->get_category($id);
        $this->load->view('categories/edit_category', $data);
    }
    public function update_category($id) {
    $this->form_validation->set_rules('category_name', 'Category Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');

    if ($this->form_validation->run() === FALSE) {
        echo json_encode(['error' => validation_errors()]);
        return;
    }
    $data = [
        'category_name' => $this->input->post('category_name'),
        'description' => $this->input->post('description'),
    ];
    if (!empty($_FILES['image']['name'])) {
        $upload_result = $this->handle_image_upload();
        if (isset($upload_result['error'])) {
            echo json_encode(['error' => $upload_result['error']]);
            return;
        }
        $data['image'] = $upload_result['file_name'];
    }
    $this->Category_model->update_category($id, $data);
    echo json_encode(['success' => true, 'message' => 'Category updated successfully!']);
}
    public function delete($id) {
        $this->Category_model->delete_category($id);
        redirect('admin/categories/list');
    }
    private function handle_image_upload() {
        $config['upload_path'] = './assets/upload/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
            return ['error' => $this->upload->display_errors()];
        }
        return $this->upload->data();
    }
}
