<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmartformsController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Stripe_model');
 
   }

	public function index()
	{
		$data = [];
		
		$this->load->view('includes/header');
		$this->load->view('pages/home', $data);
		$this->load->view('includes/footer');
	}

    public function b2tourism() 
	{

		$data = $this->Stripe_model->CreatePaymentSession();

		$header = ['title' => 'Emmigre - Visto de Turismo B1/B2 - Form I-539',
				   'description' => 'Este processo ajuda aqueles que querem estender o seu visto de turista, sim é possivel extender a sua viagem no estados unidos, com aguns passos e documentos você consegue criar seu processo para soicitar esta extensão, faça você mesmo na sua casa em poucos passos.'];

    
		
		$this->load->view('includes/header', $header);
		$this->load->view('forms/b2tourism', $data);
		$this->load->view('includes/footer');
	}

	
}
