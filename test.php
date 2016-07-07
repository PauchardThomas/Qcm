<?php

    $to      = 'thomaspauch@hotmail.fr';
    $subject = 'Resultat Qcm';
    $message = 'Test';
    $headers = 'From: thomaspauch@hotmail.fr' . "\r\n" .
        'Reply-To: thomaspauch@hotmail.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);
	
	