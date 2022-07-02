<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisasController extends CI_Controller {

    public function b2tourism() {

		$data = [];
		$header = ['title' => 'Emmigre - Visto de Turismo B1/B2 - Form I-539',
				   'title' => ''];

		$this->load->view('includes/header');
		$this->load->view('visas/b2tourism', $data);
		$this->load->view('includes/footer');
	}
}
