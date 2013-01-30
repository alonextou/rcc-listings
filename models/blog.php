<?php

	include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

	try{
		$sql = "SELECT * FROM blogs";
		$result = $db->query($sql);
		$cols = $result->fetchAll();
		$blogs = $cols;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
