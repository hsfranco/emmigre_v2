<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagesController extends CI_Controller {

	
	public function index()
	{
		$data = [];
		
		$this->load->view('includes/header');
		$this->load->view('pages/home', $data);
		$this->load->view('includes/footer');
	}

	public function b2tourism() {

		$data = [];
		$header = ['title' => 'Emmigre - Visto de Turismo B1/B2 - Form I-539',
				   'title' => ''];

		$this->load->view('includes/header', $header);
		$this->load->view('visas/b2tourism', $data);
		$this->load->view('includes/footer');
	}

	public function login()
	{
		$data = [];

		$this->load->view('includes/header');
		$this->load->view('pages/login', $data);
		$this->load->view('includes/footer');
	}

	public function politicadeprivacidade() {
		$data = [];

		$this->load->view('includes/header');
		$this->load->view('pages/politicas', $data);
		$this->load->view('includes/footer');
	}

	public function cookies() {
		$data = [];

		$this->load->view('includes/header');
		$this->load->view('pages/cookies', $data);
		$this->load->view('includes/footer');
	}


	public function termosecondicoes() {
		$data = [];

		$this->load->view('includes/header');
		$this->load->view('pages/termos', $data);
		$this->load->view('includes/footer');
	}


	public function sobreemmigre() {
		$data = [];

		$this->load->view('includes/header');
		$this->load->view('pages/sobre', $data);
		$this->load->view('includes/footer');
	}
}
