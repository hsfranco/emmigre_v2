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

        $pwd = $this->CreateUserMoodle($payment);
        $this->CreateUserDocketwise($payment);

        $html= "";

        $resultEmail = $this->Functions_model->SendEmail("hallanfranco@gmail.com", "Hallan", 'Cadastro Portal', $html);

       }
	}

    public function CreateUserMoodle($payment_row, $password_rnd) {

        $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $shfl = str_shuffle($comb);
        $pwd = substr($shfl,0,8);

        $passwordRandomico = password_hash($pwd, PASSWORD_DEFAULT);
       
        $this->db->insert('db_moodle_emmigre.mdl_user', [ 'auth' => 'email',
                                                          'confirmed' => '1',
                                                          'mnethostid' => '1',
                                                          'username' => $payment_new['ds_CustomerEmail'],
                                                          'password' => $passwordRandomico,
                                                          'firstname' =>$payment_new['ds_CustomerName'],
                                                          'lastname' => '',
                                                          'email' => $payment_new['ds_CustomerEmail'],
                                                          'emailstop' => 0,
                                                          'lang' => 'pt',
                                                          'calendartype' => 'gregorian',
                                                          'timezone' => 99,
                                                          'timecreated' => strtotime(date()),
                                                          'timemodified' => strtotime(date())]);
    
        return $pwd;
    }

    public function CreateUserDocketwise($payment_row) {

    }


}
