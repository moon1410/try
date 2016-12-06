<?php

use google\appengine\api\users\User;
use google\appengine\api\users\UserService;
use \google\appengine\api\mail\Message;
use google\appengine\api\cloud_storage\CloudStorageTools;

$user = UserService::getCurrentUser();
if (isset($user)) {
  echo sprintf('Bine ai venit in contul tau, %s! (<a href="%s">sign out</a>)',
               $user->getNickname(),
		UserService::createLogoutUrl('/'))  ;

echo "<br>", "<br>", "<br>";
$mail = $user->getEmail();

try
{$user = UserService::getCurrentUser();
  $message = new Message();
  $message->setSender("g.oanaiuliana@gmail.com");
  $message->addTo("$mail, gitman_oana@yahoo.com");
  $message->setSubject("Informatii despre starea vremii");
  $message->setTextBody('Buna ziua, 
Puteti vizualiza starea vremii accesand pagina: http://www.accuweather.com/');
   $message->send();
} catch (InvalidArgumentException $e) {
  // ...
}

echo ' Pe adresa de e-mail ai primit informatii despre starea vremii!';
		

} else {
  echo sprintf('<a href="%s">Sign in or register</a>',
               UserService::createLoginUrl('/'));
		
}

?>
