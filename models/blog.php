<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

if (isset($_POST['create'])) {
	save($db);
	header("Location: /blogs.php?success=".$success);
}

if (isset($_POST['update'])) {
	update($db, $_POST['id']);
	header("Location: /blogs.php?success=".$success);
}

if (isset($_POST['delete'])) {
	delete($db);
	header("Location: /blogs.php?success=".$success);
}

function getBlogs($db){
	try{
		$sql = "SELECT * FROM blogs";
		$result = $db->query($sql);
		$blogs = $result->fetchAll();
		return $blogs;
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
    	$sql = "INSERT INTO blogs (title, content) VALUES (:title, :content)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':title', $_POST['title']);
		$stmt->bindParam(':content', $_POST['content']);
		$stmt->execute();
		return true;
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


