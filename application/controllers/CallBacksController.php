<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CallbacksController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Stripe_model');
	}

	public function customer_subscription_created() {

		$data = json_decode(file_get_contents('php://input'), true);
		$dataText = json_encode(file_get_contents('php://input'), true);
		
		if (!empty($data)) {
		 
		}
	
		$this->db->insert('tbl_Logs', ['ds_Log' =>   $data['data'],
									   'dt_Log' =>  date('Y-m-d H:i:s')]);
	  }
	
	  public function payment_intent_succeeded() {

		$data = json_decode(file_get_contents('php://input'), true);
		$dataText = json_encode(file_get_contents('php://input'), true);
		
		if (!empty($data)) {
		  if (!empty($data['data'])) {
	
				$this->db->insert('tbl_Logs', ['ds_Log' =>  $dataText,
											   'dt_Log' =>  date('Y-m-d H:i:s'),
											   'cd_Event' => '',
											   'cd_Method' => '']);

			    $customer = $this->Stripe_model->getCustomer($data['data']['object']["customer"]);
				$this->db->insert('tbl_Payments', ['id_StripePayment' => $data['data']['object']['id'],
												   'cd_Status' => 'newpayment',
												   'dt_Register' => date('Y-m-d H:i:s'),
												   'url_Receipt' => '',
												   'ds_CustomerName' => $customer->name,
												   'ds_CustomerEmail' => $customer->email,
												   'cd_CustomerId' => $data['data']['object']["customer"]]);

												
		  }
		}
	}
}
