<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // Logout
    public function logout() {
        // Destroy the session
        $this->session->sess_destroy();
        redirect(base_url("login"));  // Redirect to login page after logout
    }
}
