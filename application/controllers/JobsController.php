<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobsController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Stripe_model');
        $this->load->model('Functions_model');
 
   }

	public function index()
	{
		$data = [];
		
		$this->load->view('includes/header');
		$this->load->view('pages/home', $data);
		$this->load->view('includes/footer');
	}

    public function ExecuteAllTasks($keyCybersecurity) {
        var_dump("INICIO PROCESSAMENTO DO SERVICOS");
        var_dump($keyCybersecurity);
        $this->CheckNewPayments();
    }

    public function CheckNewPayments() 
	{
       $new_payments = $this->db->get_Where('tbl_Payments', ['cd_Status' => 'new_payment'])->result_array();

       foreach ($new_payments as $payment) {

        $html= "";

        $this->CreateUserMoodle($payment);
        $this->CreateUserDocketwise($payment_row);
            
        $resultEmail = $this->Functions_model->SendEmail("hallanfranco@gmail.com", "Hallan", 'Cadastro Portal', $html);

       }
	}

    public function CreateUserMoodle($payment_row, $password_rnd) {









        $this->db->insert('mdl_user', [ 'auth' => '',
                                        'confirmed' => '',
                                        'mnethostid' => '',
                                        'username' => '',
                                        'password' => '',
                                        'firstname' => '',
                                        'lastname' => '',
                                        'email' => '',
                                        'emailstop' => '',
                                        'lang' => '',
                                        'calendartype' => '',
                                        'timezone' => '',
                                        'timecreated' => '',
                                        'timemodified' => '']);
    }

    public function CreateUserDocketwise($payment_row) {

    }


}
