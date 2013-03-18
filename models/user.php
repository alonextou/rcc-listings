<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

if (isset($_POST['create'])) {
	$success=save($db);
	header("Location: /users.php?success=".$success);
}

if (isset($_POST['update'])) {
	update($db, $_POST['id']);
	header("Location: /blogs.php?success=".$success);
}

if (isset($_POST['delete'])) {
	delete($db);
	header("Location: /blogs.php?success=".$success);
}
// changed function to getUsers *********************************************************
function getUsers($db){
	try{
		$sql = "SELECT * FROM users";
		$result = $db->query($sql);
		$blogs = $result->fetchAll();
		return $users;
	} catch (PDOException $e) {
		//die($e->getMessage());
		return array();
	}
}

function getBlogById($db, $id){
	try{
		$sql = "SELECT * FROM blogs WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id);
		$result = $stmt->execute();
		$blog = $stmt->fetch();
		return $blog;
	} catch (PDOException $e) {
		//die($e->getMessage());
		return array();
	}
}

function save($db){
    try{
    	$sql = "INSERT INTO users (name, address, city, state, zip, phone, email) VALUES (:name, :address, :city, :state, :zip, :phone, :email)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':name', $_POST['name']);
		$stmt->bindParam(':address', $_POST['address']);
		$stmt->bindParam(':city', $_POST['city']);
		$stmt->bindParam(':state', $_POST['state']);
		$stmt->bindParam(':zip', $_POST['zip']);
		$stmt->bindParam(':phone', $_POST['phone']);
		$stmt->bindParam(':email', $_POST['email']);
		$stmt->execute();
		return "Success";
	} catch (PDOException $e) {
		//die($e->getMessage());
		return false;
	}
}

function delete($db){
    try{
    	$sql = "DELETE FROM blogs WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $_POST['id']);
		$stmt->execute();
		return true;
	} catch (PDOException $e) {
		//die($e->getMessage());
		return false;
	}
}

function update($db){
    try{
    	$sql = "UPDATE blogs SET title = :title, content = :content  WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $_POST['id']);
		$stmt->bindParam(':title', $_POST['title']);
		$stmt->bindParam(':content', $_POST['content']);
		$stmt->execute();
		return true;
	} catch (PDOException $e) {
		//die($e->getMessage());
		return false;
	}
}


