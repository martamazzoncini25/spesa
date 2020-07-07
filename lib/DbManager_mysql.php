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
		
            $this->dbc = mysql_connect($this->mDbHost, $this->mDbUser, $this->mDbPassword) or die("Connessione a ".$this->mDbHost." fallita !".mysql_error());
            mysql_select_db($this->mDbname, $this->dbc) or die ("Impossibile trovare il database <strong>".$this->mDbname."</strong>");
	
	}
	
	public function Esegui($sSQL)
	{
            if(!is_resource($this->dbc) || !mysql_thread_id($this->dbc) )
            {
                $this->Apri();
            }
            $res = mysql_query($sSQL,$this->dbc) or die("<pre>$sSQL</pre><br/>".mysql_error());
            $this->res = $res; 
	}
	
	public function Recupera()
	{
            if(!is_resource($this->res))
            {
                return false;
            }
            return mysql_fetch_assoc($this->res);
	}
	
	public function Chiudi()
	{
		@mysql_close($this->dbc);
                $this->dbc = NULL;
                $this->res = NULL;
	}
}

?>