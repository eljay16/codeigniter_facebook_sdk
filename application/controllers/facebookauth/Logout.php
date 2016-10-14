<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function index(){
		$this->facebook->destroy_session();
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
	}

}
?>