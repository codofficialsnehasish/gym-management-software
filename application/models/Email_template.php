<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email_template extends CI_Model
{

    ////////////////////////test mail
    function testemail($email){
        $email_data[]="";
         send_mail('Test',$email,'test_email',$email_data);
    }
    function send_otp($otp,$email){
         $email_data['otp']=$otp;
         send_mail('One Time Password for eMail Verification',$email,'email_otp',$email_data);
    }

    
}