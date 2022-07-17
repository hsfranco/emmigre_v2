<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymailer {

      private $MyEmail;

      function __construct() {

        require_once(APPPATH.'third_party/PHPMailer/src/PHPMailer.php');
        require_once(APPPATH.'third_party/PHPMailer/src/SMTP.php');
        require_once(APPPATH.'third_party/PHPMailer/src/Exception.php');
      }


      public function Load() {
        $MyEmail = new PHPMailer\PHPMailer\PHPMailer(true);
        return $MyEmail;
      }
}

?>
