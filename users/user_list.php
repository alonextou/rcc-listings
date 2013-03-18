<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/models/blog.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'User List';
	
	include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php';

?>

<!DOCTYPE html>

	<div class="row">
		<div class="twelve columns panel">
			<h2><?php echo $title; ?></h2>
			<p><?php echo $dbStatus; ?></p>
		</div>
	</div>

	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/menu.php'; ?>

	<div class="row">
	</div>

	<!-- Back Button -->
	<div class="row">
		<div class="three columns">
			<a class="round button five" href="/users.php">Back</a>
		</div>
		<div class="nine columns">
		</div>
	</div>	

	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

</body>
</html>

