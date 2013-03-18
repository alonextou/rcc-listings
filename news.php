<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/models/blog.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'News';
	
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
		<ul class="button-group radius right">
			<li>
				<a href="#" data-reveal-id="createBlog" class="button success">Create News Item</a>
			</li>
		</ul>
	</div>

	<div class="row">
		<div class="twelve columns">
			<?php foreach (getBlogs($db) as $item){ ?>
				<div class="row">
					<div class="six columns panel">
						<form action="/models/item.php" method="post">
							<a href="/news/edit.php?id=<?php echo $item['id']; ?>" class="button small">Edit</a>
							<input type="submit" name="delete" value="Delete" class="button alert small"></input>
							<input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
						</form>
						<a href="/news/item.php?id=<?php echo $item['id']; ?>"><h3><?php echo $item['title']; ?></h3></a>
						<div class="content">
							<?php echo $item['content']; ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<div id="createBlog" class="reveal-modal">
		<h4>Create New Blog</h4>
		<form action="/models/blog.php" method="post">
			<input type="text" name="title" placeholder="Title" />
			<textarea name="content" placeholder="Content"></textarea>
			<input type="submit" name="create" value="Save" class="button success"></input>
		</form>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<script type="text/javascript">
		var pageTitle = '<?php echo strtolower($title); ?>';
	</script>

	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

</body>
</html>

