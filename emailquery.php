<?php

$databasePath = 'I:\htdocs\listings\listings.mdb';

try{
	$db = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$databasePath;");
	$db ->setATTRIBUTE(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
}catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}
?>