<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <body>
 
 
 

 <?php
  require_once'config.php';
  require_once'lib/funzioni.php';
  require_once'lib/DbManager.php';
	 require_once'lib/Query.php'; 
    if(extension_loaded('mysqli'))
	{
		require_once 'lib/DbManager.php';
	} else {
		require_once 'lib/DbManager_mysql.php';
	}
	$loginOk = "";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
			
		
		$nome = PostVal('nome');
		
	    

		$s= "SELECT * FROM `utenti` WHERE  nome= '$nome'"; 
        
        $db = new DbMan(DB_HOST, DB_NAME,DB_USER, DB_PASS);
         
		$db->Esegui($s);
		$ris = $db->Recupera();
	     
     	if($ris->num_rows == 0){
		   $loginOk = false;
		 
	     } 	
        else{
			$loginOk = true;
			
		}	

		if($loginOk == "true")
			{
				header('location:home.php');
			}
		else{
			
			header('location:index.php');
		}
			
			
	
	}
		
  	
	
	class QueryMan
	{
		
		
		
		public function Login($nome)
		{
			$flag = false;
			
			$s= "SELECT * FROM `utenti` WHERE  nome= '$nome'"; 
 
			$db = new DbMan(DB_HOST, DB_NAME,DB_USER, DB_PASS);
			 
			$db->Esegui($s);
			$ris = $db->Recupera();
		
			if($ris->num_rows == 0){
			   $flag = false;
			 
			 } 	
			else{
				$flag = true;
				
			}	
			
			return $flag;
			
		}
		
	}
	
	
  echo("non è registrato");


?>
 
 
 
 

 </body> 
 </html>