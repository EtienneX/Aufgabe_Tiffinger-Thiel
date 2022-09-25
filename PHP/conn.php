<?php
	function open_database_connection()
	{
		$link=new mysqli("#####","#####","#####","#####");
		$link->query("SET NAMES 'utf8'");
		return $link;
	}
	function close_database_connection($link)
	{
		mysqli_close($link);
	}
 ?>
