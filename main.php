<?php 
   use google\appengine\api\users\User; 
   use google\appengine\api\users\UserService; 
   use \google\appengine\api\mail\Message; 
   use google\appengine\api\cloud_storage\CloudStorageTools; 
   $user = UserService::getCurrentUser(); 
   if (isset($user)) { 
   echo sprintf('Bun venit, %s! (<a href="%s">sign out</a>)',$user->getNickname(),UserService::createLogoutUrl('/')); 
   $mail = $user->getEmail(); 
   try 
   { 

$to      = 'g.oanaiuliana@gmail.com';
$to=  $mail;
$subject = 'Starea vremii';
$message = 'Buna ziua, <br /> Puteti vizualiza starea vremii accesand pagina: http://www.accuweather.com/';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
}
catch (InvalidArgumentException $e) { 
   echo "Exception";
} 
echo ' Pe adresa de e-mail ati primit informatii despre starea vremii! ';
}
else { 
   echo sprintf('<a href="%s">Sign in or register</a>',UserService::createLoginUrl('/')); 
   } 
?> 
