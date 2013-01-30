<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    echo '<h4>'.$dbStatus.'</h4>';

    try{
	    $sql = "DROP TABLE IF EXISTS blogs";
		$result = $db->query($sql);
		var_dump($result);
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try{
		$sql = "CREATE TABLE IF NOT EXISTS blogs (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			title VARCHAR(200) NOT NULL,
			content TEXT NOT NULL
		)";
		$result = $db->query($sql);
		var_dump($result);
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	/* Put your SQL installation code here:

    try{
	    $sql = "DROP TABLE IF EXISTS your_table_here";
		$result = $db->query($sql);
		var_dump($result);
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try{
		$sql = "CREATE TABLE IF NOT EXISTS your_table_here (
			your_fields_here
		)";
		$result = $db->query($sql);
		var_dump($result);
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	*/

	





	// Temporary sample data

    try{
	    $sql = "INSERT INTO blogs (title, content) VALUES ('My First Blog Title', '<p>Blog Content!</p>')";
		$result = $db->query($sql);
		var_dump($result);
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try{
	    $sql = "INSERT INTO blogs (title, content) VALUES ('My Second Blog Title', '<p>More Blog Content!</p>')";
		$result = $db->query($sql);
		var_dump($result);
	} catch (PDOException $e) {
		die($e->getMessage());
	}

?>