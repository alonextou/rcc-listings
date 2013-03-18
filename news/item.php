<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/models/blog.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'Blog';

    $item = getBlogById($db, $_GET['id']);
	
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
			<h3><?php echo $item['title']; ?></h3>
			<div class="panel">
				<?php echo $item['content']; ?>
			</div>
		</div>
	</div>
	
	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

</body>
</html>

