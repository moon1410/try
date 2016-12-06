<?php 
   use google\appengine\api\users\User; 
   use google\appengine\api\users\UserService; 
   use \google\appengine\api\mail\Message; 
   use google\appengine\api\cloud_storage\CloudStorageTools; 
   $user = UserService::getCurrentUser(); 
   if (isset($user)) { 
   echo sprintf('Bun venit, %s! (<a href="%s">sign out</a>)',$user->getNickname(),UserService::createLogoutUrl('/'));    
   $mail = $user->getEmail(); 
   echo($mail);
      try{ 
         $to = 'gabrielacioaca14@gmail.com';
         $to .= $mail;
         $subject = "Starea vremii";
         $message = "Buna ziua, <br /> Puteti vizualiza starea vremii accesand pagina: http://www.accuweather.com/";
         
         if(@mail($to, $subject, $message))
         {
          echo("Pe adresa de e-mail ati primit informatii despre starea vremii!");
         }
         else{
            echo "Mail not sent";
         }
      
       catch (InvalidArgumentException $e) { 
         echo ($e);
      } 
   }
   else { 
      echo sprintf('<a href="%s">Sign in or register</a>',UserService::createLoginUrl('/')); 
   } 
?> 
