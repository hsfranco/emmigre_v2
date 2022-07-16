<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CallBacksController extends CI_Controller {

	public function customer_subscription_created() {

		$data = json_decode(file_get_contents('php://input'), true);
		$dataText = json_encode(file_get_contents('php://input'), true);
		
		if (!empty($data)) {
		 
		}
	
		$this->db->insert('tbl_Logs', ['ds_Log' =>   $data ,
									   'dt_Log' =>  date('Y-m-d H:i:s')]);
	  }
	
	  public function payment_intent_succeeded() {

		$data = json_decode(file_get_contents('php://input'), true);
		$dataText = json_encode(file_get_contents('php://input'), true);
		
		if (!empty($data)) {
		  if (!empty($data['data'])) {
	
				$this->db->insert('tbl_Logs', ['ds_Log' =>  $data,
											   'dt_Log' =>  date('Y-m-d H:i:s')]);
	
		  }
		}
	}
}
