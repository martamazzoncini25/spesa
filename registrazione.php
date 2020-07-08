<?php
   session_start();//avvio un sessione in cui posso salvare i dati 
    require_once 'lib/QueryManager.php';
	require_once 'lib/Query.php'; 
	require_once 'lib/funzioni.php'; 
	//controllo se ci sono parametri passati in post

		 if($_SERVER['REQUEST_METHOD']=='POST')
		 {
		$nome = PostVal("nome");
		
		$QueryMan= new QueryMan();//alloco un oggetto con classe query

       if($QueryMan->Registra($nome)) //chiamo la funzione registra e ne gestisco il ritorno
			{
				header("location:index.php");//setto a no la variabile reg per gestire la stampa dell'errore
				
			}
			else//atrimenti registrazione non sarà corretta
			{
				$message = "questa email è già inserita";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}


		 }   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SPESA</title>
		
		<link href="css/stile.css" rel="stylesheet" type="text/css"/>
    </head>
	<body>
	<h3>FAI PURE LA SPESA</h3>
	
	
   <div class="formattare">
	 <form class="struttura" action="registrazione.php" method="post">
		
      <h2><span>Effettua la registrazione</span></h2>
	 
		<h2><span>NOME:</span></h2>
		<input type="text" name="nome" style="width:120px;height:20px">
	    
     	<br>
	   
		 <input type="submit" name="registrati" value="registrati" size="40">
	   <button onclick="indietro()">Indietro</button>
		
		</form>
		</div>
</html>



