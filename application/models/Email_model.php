<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Email_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

	    public function send_email_data($subj,$to,$template_path,$userdata,$attachment="")
        {
            $data = array(
                'subject' => $subj,
                'to' => $to,
                'template_path' => 'email/'.$template_path,
				'userdata'	=> $userdata
            );
            $this->send($data,$attachment);
        }


	    public function send($data,$attachment=""){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'indpnt.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@indpnt.com';
        $mail->Password = '84cHhz}g06s7';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('admin@indpnt.com', 'Independent');
        $mail->addReplyTo('admin@indpnt.com', 'Independent');
        
        // Add a recipient
        $mail->addAddress($data['to']);
        
        // Add cc or bcc 
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = $data['subject'];
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = $this->load->view($data['template_path'], $data, TRUE);;
        $mail->Body = $mailContent;
        if($attachment!=''){
        $mail->AddAttachment($attachment);
        }
        // Send email
        if(!$mail->send()){
           // echo 'Message could not be sent.';
            return $mail->ErrorInfo;
        }else{
            return true;
        }
    }	

}
