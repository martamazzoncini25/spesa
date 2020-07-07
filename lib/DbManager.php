<?php

class DbManager
{
	
	private $dbc = NULL;
	private $res = NULL;
	
	private $mDbHost = '';
	private $mDbname = '';
	private $mDbUser = '';
	private $mDbPassword = '';
        
         
	public function __construct($host,$dbname,$user,$password) 
	{
		
		$this->mDbHost = $host;
		$this->mDbname = $dbname;
		$this->mDbUser = $user;
		$this->mDbPassword = $password;
		
	}
        
	public function Apri()
	{
		
		$this->dbc = mysqli_connect($this->mDbHost, $this->mDbUser, $this->mDbPassword,  $this->mDbname) or die("Connessione a ".$this->mDbHost." fallita !".mysqli_connect_error());
		//mysqli_select_db( $this->mDbname, $this->dbc) or die ("Impossibile trovare il database <strong>".$this->mDbname."</strong>");
		mysqli_set_charset ( $this->dbc , 'utf8' );
		
	}
	
	public function Esegui($sSQL)
	{
		if(!is_resource($this->dbc) || !mysqli_thread_id($this->dbc) )
		{
			$this->Apri();
		}
		$res = mysqli_query($this->dbc,$sSQL) or die("<pre>$sSQL</pre><br/>".mysqli_error($this->dbc));
		$this->res = $res; 
		
	}
	
	public function Recupera()
	{
		
		return mysqli_fetch_assoc($this->res);
	}
	
	private function Chiudi()
	{
		@mysqli_close($this->dbc);
        $this->dbc = NULL;
        $this->res = NULL;
	}
	
	public function __destruct()
	{
		$this->Chiudi();
	}
}

?>