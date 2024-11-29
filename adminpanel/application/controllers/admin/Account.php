<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
	public function dashboard()
	{
		if($this->session->has_userdata('logininfo')==true)
		{
		$data['logininfo']=$this->session->userdata('logininfo');
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/_sidebar',$data);
		$this->load->view('admin/_main',$data);
		$this->load->view('admin/_footer',$data);
		}
		else
		{
			redirect(base_url("admin"));

		}

	}
	public function index()
	{
		$this->load->view('admin/_header',$data);
		$this->load->view('admin/login');
		$this->load->view('admin/_main', $data);
		$this->load->view('admin/_footer',$data);		
	}
	function auth()
	{
		$username= $this->input->post('username');
		$password= $this->input->post('password');
		
		$query = $this->db->get_where('users', array('username'=>$username,'password'=>$password));
		if($query->num_rows()>0)
		{
			$result['logininfo'] = $query->row_array();
			$result['logininfo']['logged_in'] = true;

           $this->session->set_userdata($result);
			redirect(base_url("admin/dashboard"));
		}
		else
		{
			var_dump($username);
			var_dump($password);
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("admin"));
	}
}