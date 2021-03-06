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

        if ($keyCybersecurity !== '9ff128d6-2fa8-4ad2-b479-b815be970845') 
            return;
    
        $this->db->insert("tbl_Logs", ['dt_Log' => date('Y-m-d H:i:s'),
                                       'cd_Event' => 'message',
                                       'ds_Log' => 'Starting executing all Tasks',
                                       'cd_Method' => 'JobsControllers/ExecuteAllTasks']);
      
        $this->CheckNewPayments();

        $this->db->insert("tbl_Logs", ['dt_Log' => date('Y-m-d H:i:s'),
                                       'cd_Event' => 'message',
                                       'ds_Log' => 'Finishing executing all Tasks',
                                       'cd_Method' => 'JobsControllers/ExecuteAllTasks']);
    }

    public function CheckNewPayments() 
	{
        $this->db->insert("tbl_Logs", ['dt_Log' => date('Y-m-d H:i:s'),
                                       'cd_Event' => 'message',
                                       'ds_Log' => 'Process of checking payments received started',
                                       'cd_Method' => 'JobsControllers/CheckNewPayments']);

       $new_payments = $this->db->get_Where('tbl_Payments', ['cd_Status' => 'new_payment'])->result_array();

       foreach ($new_payments as $payment) {

         $pwd = $this->CreateUserMoodle($payment);
         $resultUserDocketWise = $this->CreateUserDocketwise($payment);
         $resultEmail = $this->SendFinalEmailRegister($payment, $pwd);

         if (!$resultEmail) {
            $this->db->insert("tbl_Logs", ['dt_Log' => date('Y-m-d H:i:s'),
                                           'cd_Event' => 'error',
                                           'ds_Log' => 'Error when sending e-mail for user',
                                           'cd_Method' => 'JobsControllers/CheckNewPayments']);

         }
       }
	}


    /**************************************************
     * CREATED BY HACODE.SOLUTIONS 2022               *
     *************************************************/
    public function CreateUserMoodle($payment_row) {

        $this->db->insert("tbl_Logs", ['dt_Log' => date('Y-m-d H:i:s'),
                                       'cd_Event' => 'message',
                                       'ds_Log' => 'Creating user moodle for user ' . $payment_row['ds_CustomerEmail'],
                                       'cd_Method' => 'JobsControllers/ExecuteAllTasks']);


        $exists_users_by_email = $this->db->get_where('db_moodle_emmigre.mdl_user', ['email' => $payment_row['ds_CustomerEmail']])->row_array();

        if(empty($exists_users_by_email)) {
            $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $shfl = str_shuffle($comb);
            $pwd = substr($shfl, 0, 8);
    
            $passwordRandomico = password_hash($pwd, PASSWORD_DEFAULT);

            $result_of_creation = $this->db->insert('db_moodle_emmigre.mdl_user', [ 'auth' => 'email',
                                                                                    'confirmed' => '1',
                                                                                    'mnethostid' => '1',
                                                                                    'username' => $payment_row['ds_CustomerEmail'],
                                                                                    'password' => $passwordRandomico,
                                                                                    'firstname' => $payment_row['ds_CustomerName'],
                                                                                    'lastname' => '',
                                                                                    'email' => $payment_row['ds_CustomerEmail'],
                                                                                    'emailstop' => 0,
                                                                                    'lang' => 'pt',
                                                                                    'calendartype' => 'gregorian',
                                                                                    'timezone' => 99,
                                                                                    'timecreated' => strtotime(date('Y-m-d h:i:sa')),
                                                                                    'timemodified' => strtotime(date('Y-m-d h:i:sa'))]);
            
            $id_last_id_created =  $this->db->insert_id(); 

            $result_of_enrollment = $this->db->insert('db_moodle_emmigre.mdl_user_enrolments', ['status' => 0,
                                                                                                'enrolid' => 1, 
                                                                                                'userid' =>  $id_last_id_created, 
                                                                                                'timestart' => strtotime(date('Y-m-d h:i:sa')), 
                                                                                                'timeend' => '', 
                                                                                                'modifierid' => 2, 
                                                                                                'timecreated' => strtotime(date('Y-m-d h:i:sa')), 
                                                                                                'timemodified' => strtotime(date('Y-m-d h:i:sa'))]);

         $this->db->where('id_Payment', $payment_row['id_Payment']);
         $this->db->update('tbl_Payments', ['cd_Status' => 'user_moodle_created',
                                            'dt_LastUpdate' => date('Y-m-d H:i:s'),
                                            'ds_LastProcess' => 'CreateUserMoodle']);
            
          return $pwd;
        
        } else {

            $this->db->insert("tbl_Logs", ['dt_Log' => date('Y-m-d H:i:s'),
                                            'cd_Event' => 'warning',
                                            'ds_Log' => 'user exists in database ' . $payment_row['ds_CustomerEmail'],
                                            'cd_Method' => 'JobsControllers/ExecuteAllTasks']);

            return "User exists in database";
        }
    }

    public function CreateUserDocketwise($payment_row) {

        $this->db->insert("tbl_Logs", ['dt_Log' => date('Y-m-d H:i:s'),
                                        'cd_Event' => 'message',
                                        'ds_Log' => 'Creating user docketwise for user' . $payment_row['ds_CustomerEmail'],
                                        'cd_Method' => 'JobsControllers/ExecuteAllTasks']);

       
        $curl = curl_init();

        $firstName = '';
        $middleName = '';
        $lastName = '';

        $nameArray = explode(" ", $payment_row['ds_CustomerName']);

        if (count($nameArray) === 5) {

            $firstName = $nameArray[0];
            $middleName = $nameArray[1] . " ";
            $middleName .= $nameArray[2] . " ";
            $middleName .= $nameArray[3];
            $lastName = $nameArray[4];

        } else if (count($nameArray) === 4) {

            $firstName = $nameArray[0];
            $middleName = $nameArray[1] . " ";
            $middleName = $nameArray[2] . " ";
            $lastName = $nameArray[3];

        } else if (count($nameArray) === 3) {
            
            $firstName = $nameArray[0];
            $middleName = $nameArray[1];
            $lastName = $nameArray[2];

        } else if (count($nameArray) === 2) {
            
            $firstName = $nameArray[0];
            $lastName = $nameArray[1];

        } else {

            $firstName = $nameArray[0];
        
        }


        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://app.docketwise.com/api/v1/contacts',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "contact": {
                "first_name": "'.$firstName.'",
                "middle_name": "'.$middleName.'",
                "last_name": "'.$lastName.'",
                "email": "'. $payment_row['ds_CustomerEmail'] .'",
                "type": "Person",
                "addresses_attributes": [{
                    "data": {
                        "street_number_and_name": "This is and address",		 
                        "physical": true
                    }
                }],
                "phone_numbers_attributes": [{
                    "data": {
                        "number": "'. $payment_row['ds_CustomerPhone'] .'",
                        "daytime": true
                    }
                }]
            }
        }',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer JfPfiyQbsxUbGYrEr0S187sPS82uOakAu8CEyHj3unE',
            'Content-Type: application/json',
            'Cookie: _borderwise_session=4d72c4567d8e4e1ece7eb4bad98527dd'
          ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);

    
        $this->db->where('id_Payment', $payment_row['id_Payment']);
        $this->db->update('tbl_Payments', ['cd_Status' => 'user_docketwise_created',
                                           'dt_LastUpdate' => date('Y-m-d H:i:s'),
                                           'ds_LastProcess' => 'CreateUserDocketwise']);

    }

    public function SendFinalEmailRegister($payment_row, $pwd) {
        $html = " Seja bem vindo ao EMMIGRE </br>";
        $html .= "Abaixo voc?? vai ter informa????es referente ao acesso a nota ferramenta que criar a sua trilha para cria????o do seu processo imigrat??rio, leia com muita aten????o todos os t??pico e s?? marque com finalizado aqueles que voc?? tiver finalizado </br>";
        $html .= "Seu usu??iro: " . $payment_row['ds_CustomerEmail'] . "</br>";
        $html .= "Sua senha: " .  $pwd . "</br>";
        $html .= "Link de acesso: https://app.emmigre.com";

        $resultEmail = $this->Functions_model->SendEmail($payment_row['ds_CustomerEmail'], "Hallan", 'Cadastro Portal', $html);

        $this->db->where('id_Payment', $payment_row['id_Payment']);
        $this->db->update('tbl_Payments', ['cd_Status' => 'final_mail_sended',
                                           'dt_LastUpdate' => date('Y-m-d H:i:s'),
                                           'ds_LastProcess' => 'CreateUserDocketwise']);


        return $resultEmail;
    }
}
