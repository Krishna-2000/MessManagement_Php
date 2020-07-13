<?php 
	echo "Hello";
	try
	{
		$con = pg_connect("pgsql:host=localhost;dbname=mess_management_development","krishnakichu1907@gmail.com","vichukichu");
		echo "Connection Established!";
	}	
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>
