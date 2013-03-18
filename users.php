<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/models/blog.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'Users';
	
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
		<div class="three columns">
			<a class="radius button twelve" href="/users/new.php">Add New User</a>
		</div>
		<div class="nine columns">
		</div>
	</div>
	
	<div class="row">
		<div class="three columns">
		</div>
	</div>
	
	<!-- Create a click to see users list?? Or possibly put this button on the home page and do it from there and completely remove users from the navigation bar -->	
	<div class="row">
		<div class="three columns">
			<a class="radius button twelve" href="/users/user_list.php">View Users</a>
		</div>
		<div class="nine columns">
		</div>
	</div>
	
	<script type="text/javascript">
		var pageTitle = '<?php echo strtolower($title); ?>';
	</script>
	
	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

</body>
</html>

