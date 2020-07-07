<?php
  require_once'./config.php';
  require_once'funzioni.php';
  require_once'DbManager.php';
	  
	class QueryManager
	{
		
		public function __construct() 
		{
			if(extension_loaded('mysqli'))
			{
				require_once 'DbManager.php';
			} else {
				require_once 'DbManager_mysql.php';
			}
		}
  	
		public function Login($email,$password)
		{
			$s= "SELECT * FROM `utenti` WHERE email= '$email' and password = '$password'"; 
 
			$dbMan = new DbManager(DB_HOST, DB_NAME,DB_USER, DB_PASS);
			$dbMan->Esegui($s);
			$ris = $dbMan->Recupera();
           
		  
			if(count($ris) == 0){
			   return '';
			 } 	
			else{
				return $ris['nome'];
			}	
			

			
		}
		public function Registra($email,$password,$nome,$cognome)
		{
			if($this->ControllaEmail($email))
			{
				
				return false;
			}
			 $s="INSERT INTO `utenti`
                        (`email`
						,`password`
						,nome
						,cognome)
	                     VALUES('$email','$password','$nome','$cognome')";
	
	        $dbMan = new DbManager(DB_HOST,DB_NAME,DB_USER,DB_PASS);
			
			$dbMan->Esegui($s);
			
			return true;
		}
		
		private function ControllaEmail($email)
		{
			$s= "SELECT * FROM `utenti` WHERE email= '$email'"; 
 
			$dbMan = new DbManager(DB_HOST, DB_NAME,DB_USER, DB_PASS);
			$dbMan->Esegui($s);
			$ris = $dbMan->Recupera();

			if(count($ris) == 0){
			   return false;
			 } 	
			else{
				return true;
			}	
			
			
		}
		
	}
	
	



?>


