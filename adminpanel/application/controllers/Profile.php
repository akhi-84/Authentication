<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model or other necessary resources
    }

    // View Profile Page
    public function view() {
        // Fetch user details from the database if needed
        $data['user'] = $this->session->userdata('logininfo');  // Example of getting user data from session

        $this->load->view('admin/_header');  // Load header
        $this->load->view('profile/view', $data);  // Load the 'view' view with user data
        $this->load->view('admin/_footer');  // Load footer
    }
    }
