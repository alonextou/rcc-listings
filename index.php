<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';
	
	include_once $_SERVER['DOCUMENT_ROOT'].'/models/job.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'RCC Job Listings';
	
	include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php';

?>

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

			<img src="images/logo.jpg">
		
		</div>
		<div class="three columns">
			<a class=" button twelve" href="/users/new.php">Register</a>
			
			<div class="panel">
			<h5>Latest Job Listings</h5>
			<?php foreach (latestJobs($db) as $job) { ?>
				<hr>
				<h5><a href="Jobs.php"><?php echo $job['title']; ?></a></h5>
				<a href="Jobs.php"><strong>Listed:</strong> <?php echo $job['listed']; ?></a>					
			<?php } ?>
			</div>
		</div>
	</div>
	
	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

</body>
</html>

