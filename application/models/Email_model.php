<?php 

class Email_model extends CI_Model{

    public function __construct(){

        parent::__construct();

    }

    public function sendMail($subject,$message,$to_email,$from_email){
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        $headers[] = 'From: <'.$from_email.'>';
        mail($to_email,$subject,$message,implode("\r\n", $headers));
    }
}