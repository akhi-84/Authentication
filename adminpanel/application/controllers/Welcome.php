<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	function fileuploadTutorial()
	{
		$data['error'] = "";
		$this->load->view('fileuploadTutorial',$data);

	}
	function do_upload()
	{
		 $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 800;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('fileuploadTutorial', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data(),'error' => "");

                        $this->load->view('fileuploadTutorial', $data);
                }
	}

function formvalidationTutorial()
	{
		$this->form_validation->set_rules('Attr Name', 'Attr Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('formvalidationTutorial');
                }
                else
                {
                        echo "submit successfully";
                }

	}
}

