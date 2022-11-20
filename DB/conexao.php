<?php
	try {
		$dsn = 'mysql:host=127.0.0.1;dbname=GFP';
		$usuarioDB = 'root';
		$senhaDB = '';

	    $pdo = new PDO($dsn, $usuarioDB, $senhaDB);
	    
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e){
	    echo 'DB Error '.$e->getMessage();
	} catch (Exception $e){
	    echo 'Error '.$e->getMessage();
	}
?>
