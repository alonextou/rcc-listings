<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

// We give our form's submit input a name:
// <input type="submit" name="create" value="List Job" />
// and we use if statements to know which function to call.

if (isset($_POST['create'])) {
	// We call the create function and store the value it returns at the same time:
	$success = create($db); // Our function needs $db, which comes from libraries/connect.php
	header("Location: /jobs.php?success=".$success); // Redirect to jobs, with a success parameter in the URL
}

if (isset($_POST['update'])) {
	update($db, $_POST['id']);
	header("Location: /jobs.php?success=".$success);
}

if (isset($_POST['delete'])) {
	$success = delete($db);
	header("Location: /jobs.php?success=".$success);
}

function getJobs($db){
	try{
	
		if (isset($_GET['sort'])) {
			switch ($_GET['sort']) {
				case 'alpha':
					$sql = "SELECT * FROM `jobs` ORDER BY title";
					break;
				case 'zulu':
					$sql = "SELECT * FROM `jobs` ORDER BY title DESC";
					break;
				case 'old':
					$sql = "SELECT * FROM `jobs` ORDER BY listed";
					break;
				default:
					$sql = "SELECT * FROM `jobs` ORDER BY listed DESC";
					break;
			}
		} else {
			$sql = "SELECT * FROM `jobs` ORDER BY listed DESC";
		}
		$result = $db->query($sql);
		$jobs = $result->fetchAll();
		return $jobs;
	} catch (PDOException $e) {
		//die($e->getMessage());
		return array();
	}
}

function getJobById($db, $id){
	try{
		$sql = "SELECT * FROM jobs WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id);
		$result = $stmt->execute();
		$job = $stmt->fetch();
		return $job;
	} catch (PDOException $e) {
		//die($e->getMessage());
		return array();
	}
}

function create($db){
    try{
    	$sql = "INSERT INTO jobs (title, description, company, contact, location, telecommute, contact_email, pays)
			VALUES (:title, :description, :company, :contact, :location, :telecommute, :contact_email, :pays)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':title', $_POST['title']);
		$stmt->bindParam(':description', $_POST['description']);
		$stmt->bindParam(':company', $_POST['company']);
		$stmt->bindParam(':contact', $_POST['contact']);
		$stmt->bindParam(':location', $_POST['location']);
		$stmt->bindParam(':telecommute', $_POST['telecommute']);
		$stmt->bindParam(':contact_email', $_POST['contact_email']);
		$stmt->bindParam(':pays', $_POST['pays']);
		$stmt->execute();
		return true;
	} catch (PDOException $e) {
		die($e->getMessage());
		return false;
	}
}

function delete($db){
    try{
    	$sql = "DELETE FROM jobs WHERE id = :id";
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
    	$sql = "UPDATE jobs SET title = :title, content = :content  WHERE id = :id";
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

function latestJobs($db){
    try{
    	$sql = "SELECT * FROM `jobs` ORDER BY listed DESC LIMIT 3";
		$result = $db->query($sql);
		$latestJobs = $result->fetchAll();
		return $latestJobs;
		return true;
	} catch (PDOException $e) {
		//die($e->getMessage());
		return array();
	}
}


