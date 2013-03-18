<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/models/blog.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'Blog';

    $blog = getBlogById($db, $_GET['id']);
	
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
		<div class="twelve columns">
			<form action="/models/blog.php" method="post">
				<input type="text" name="title" placeholder="Title" value="<?php echo $blog['title']; ?>" />
				<textarea name="content" placeholder="Content"><?php echo $blog['content']; ?></textarea>
				<input type="hidden" name="id" value="<?php echo $blog['id']; ?>" />
				<input type="submit" name="update" value="Update" class="button success"></input>
			</form>
		</div>
	</div>
	
	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

</body>
</html>

