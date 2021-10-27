<?php
	use phpmailer\phpmailer\PHPMailer;
	use phpmailer\phpmailer\Exception;

	require'phpmailer/src/Exception.php';
	require'phpmailer/src/PHPMailer.php';
	require'phpmailer/src/SMTP.php';

	if($_POST['name'] && $_POST['email']  && $_POST['phone'] && $_POST['message']){
		submit_data();
	}else{
	  echo "";
  	}
	
	function submit_data(){
		
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $message = $_POST['message'];
      
	$mail = new PHPMailer(true);

    $text = '<html>
	            <head><head>
	            <body>
	                <p><b>Full Name :</b> '.$name.'</p>
	                <p><b>Email :</b> '.$email.'</p>
	                <p><b>Phone :</b> '.$phone.'</p>
	                <p><b>Message :</b> '.$message.'</p>
	            </body>
	        </html>';
	try {
			//server setting
			$mail->IsSMTP();
			$mail->SMTPDebug  = 0;  
			$mail->SMTPAuth   = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Port       = 587;
			$mail->Host       = "smtp.gmail.com";
			$mail->Username   = "atulajinkya071@gmail.com";
			$mail->Password   = "atul0903";
	        
			//Recipients
		    $mail->setFrom('atulajinkya071@gmail.com', 'indiTESP');
		    $mail->addAddress('vaibhavpelne@gmail.com');     //Add a recipient waratkaravanti@gmail.com
		    $mail->addReplyTo('atulajinkya071@gmail.com', 'Atul');
	  
		     //Content
	    	$mail->isHTML(true);                                  //Set email format to HTML
	 	    $mail->Subject = "Enquiry came from contact us page";
	         
	    	$mail->Body = $text;
	    
	    	$mail->send();
			echo "success";
			
		}
		 catch (Exception $e) {
    		echo'';
		}
	}
 ?>
