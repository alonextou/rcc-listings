<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/models/job.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'New Job';
	
	include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php';
?>

<!DOCTYPE html>

<body>

	<div class="row">
		<div class="twelve columns panel">
			<h2><?php echo $title; ?></h2>
			<p><?php echo $dbStatus; ?></p>
		</div>
	</div>

	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/menu.php'; ?>

	<div class="row">
		<div class="nine columns">
			
			<form action="/models/job.php" method="post">                
                	<label>Job Title:</label>
					<input name="title" type="text" value="">
                    <label>Contact Name:</label>
					<input name="contact" type="text" value="">
                    <label>Contact Email:</label>
					<input name="contact_email" type="email" value="">
                    <label>Is this a paid position? If so, how much?:</label>
					<input name="pays" type="text" value="">
                    <label>Location:</label>
					<input type="text" name="location" value="">
					<label>Telecommute?</label>
					<input type="radio" name="telecommute" value="yes">Yes
					<input type="radio" name="telecommute" value="no">No
					<input type="radio" name="telecommute" value="maybe">Maybe
					<hr>
                    <label>Job Description:</label>
					<textarea name="description"></textarea>
                	<div class="panel">
						<input type="submit" name="create" value="List Job" class="success button radius" />
                    	<a href="/jobs.php" class="alert button radius right" />Cancel</a>
                    </div>
                </form>
		</div>
	</div>
	
	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

</body>
</html>

