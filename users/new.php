<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/models/blog.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'New User Registration';
	
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
		<div class="six columns">
			<form action="/models/user.php" method="POST">
				<label>Name</label>
					<input type="text" name="name" placeholder="Name" />
				<label>Address</label>
				<input type="text" class="twelve" name="address" placeholder="Street" />
				<div class="row">
					<div class="six columns">
						<input type="text" name="city" placeholder="City" />
					</div>
					<div class="three columns">
						<input type="text" name="state" placeholder="State" />
					</div>
					<div class="three columns">
						<input type="text" name="zip" placeholder="ZIP" />
					</div>
				</div>
				<label>Phone</label>
				<input type="text" name="phone" placeholder="Phone" />
				<label>Email</label>
				<input type="text" name="email" placeholder="E-mail" />
				<input type="submit" name="create" class="radius button three">
			</form>	
		</div>
	</div>

	<!-- Back Button -->
	<div class="row">
		<div class="three columns">
			<a class="radius button five" href="/users.php">Back</a>
		</div>
		<div class="nine columns">
		</div>
	</div>	

	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

</body>
</html>

