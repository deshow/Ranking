<?php
class Mailler extends CApplicationComponent{
	
	/**
	 * send a mail
	 */
	public function sendMail($to,$text){
		// Render view and get content
		// Notice the last argument being `true` on render()
		/*
		 $content = $this->render('mail', array(
		 		'Test' => 'TestText 123',), true);
		*/
		// Plain text content
		$plainTextContent = $text;
	
		// Get mailer
		$SM = Yii::app()->swiftMailer;
	
		// Get config
		$mailHost = SQEX_SMTP_HOST;//SQEX SMTP
		$mailPort = SQEX_SMTP_PORT; // Optional
		// New transport
		$Transport = $SM->smtpTransport($mailHost, $mailPort,null);
		//$Transport->domain = 'jp.co.square-enix.com';
		$Transport->setLocalDomain(SQEX_DOMAIN);
		// Mailer
		$Mailer = $SM->mailer($Transport);
		// New message
		$Message = $SM
		->newMessage('Master System ')
		->setFrom(array('MasterSystem@square-enix.com' => 'Administrator'))
		->setTo(array($to.'@square-enix.com' => 'Recipient Name'))
		//->addPart($content, 'text/html')
		->setBody($plainTextContent,"text/html");
		// Send mail
		$result = $Mailer->send($Message);
	}
}