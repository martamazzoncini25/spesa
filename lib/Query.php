<?php
  require_once'./config.php';
  require_once'funzioni.php';
  require_once'DbManager.php';
	  
	class QueryMan
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
 
		public function Login($nome)
		{
			$s= "SELECT * FROM `utenti` WHERE nome = '$nome'"; 
 
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
		public function Registra($nome)
		{
			if($this->ControllaEmail($nome))
			{
				
				return false;
			}
		  else{
			 $s="INSERT INTO `utenti`
                        (`nome`)
	                     VALUES('$nome')";
	
	        $dbMan = new DbManager(DB_HOST,DB_NAME,DB_USER,DB_PASS);
			
			$dbMan->Esegui($s);
			
			return true;
		     }
		}
		private function ControllaEmail($nome)
		{
			$s= "SELECT * FROM `utenti` WHERE nome= '$nome'"; 
 
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
