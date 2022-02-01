<?php
namespace vasco;

use Rain\Tpl;

class Mailer{
    const USERNAME= "twprojeto11@gmail.com";
    const PASSWORD= "Vasco55968016";
    const NAME_FROM= "TW";
    private $mail;

    public function __construct($toAddress, $toName, $subject, $tplName, $data=array()){
        
		$config = array(
            "base_url"      => null,
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/ecommerce/views/email/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/ecommerce/views-cache/",
            "debug"         => false // set to false to improve the speed
        );

        Tpl::configure( $config );

        $tpl = new Tpl;

        foreach ($data as $key => $value){
            $tpl->assign($key, $value);
        }

        $html= $tpl->draw($tplName, true);

        $this->mail = new \PHPMailer;
        $this->mail->isSMTP();

        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $this->mail->SMTPDebug = 0;
        
        $this->mail->Debugoutput = 'html';
        
        $this->mail->Host = 'smtp.gmail.com';
        
        $this->mail->Port = 587;
        
        $this->mail->SMTPSecure = 'tls';
        
        $this->mail->SMTPAuth = true;
        
        $this->mail->Username = Mailer::USERNAME;
        
        $this->mail->Password = Mailer::PASSWORD;

        $this->mail->SetFrom(Mailer::USERNAME, Mailer::NAME_FROM);

        $this->mail->addAddress($toAddress, $toName);

        $this->mail->Subject = $subject;

        $this->mail->msgHTML($html);

        $this->mail->AltBody = 'This is a plain-text message body';
    }

    public function send(){
        return $this->mail->send();
    }
   
}