<?php
	function PostVal($name)
	{
		$valore = '';
		if(isset($_POST[$name]))
		{
			$valore = $_POST[$name];
		}
		return $valore;
	}
	function GetVal($name)
	{
		$valore = '';
		if(isset($_GET[$name]))
		{
			$valore = $_GET[$name];
		}
		return $valore;
	}
	
	function SQLSafe($valore)
	{
		$valore = stripslashes($valore);
		$valore = addslashes($valore);
		
		return $valore;
	}