<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/models/blog.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'Blog';

?>

<!DOCTYPE html>

<!-- 
	TODO: seperate everything below this comment, but above the <body> tag,
	and put it into partials/head.php, then include it here. 
-->

<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="css/foundation.min.css">
	<link rel="stylesheet" href="css/default.css">
	<script src="/js/foundation/modernizr.foundation.js"></script>
</head>

<body>

	<div class="row">
		<div class="twelve columns panel">
			<h2><?php echo $title; ?></h2>
			<p><?php echo $dbStatus; ?></p>
		</div>
	</div>

	<!-- TODO: seperate the following menu into partials/menu.php, and include it here. -->
	<div id="menu" class="row">
		<ul class="nav-bar">
			<li class=""><a href="/index.php">Home</a></li>
			<li class="active"><a href="/blogs.php">Blog</a></li>
		</ul>
	</div>

	<div class="row">
		<ul class="button-group radius right">
			<li>
				<a href="#" data-reveal-id="createBlog" class="button success">Create New Blog</a>
			</li>
		</ul>
	</div>

	<div class="row">
		<div class="twelve columns">
			<?php foreach (getBlogs($db) as $blog){ ?>
				<div class="row">
					<div class="six columns panel">
						<form action="/models/blog.php" method="post">
							<a href="/blogs/edit.php?id=<?php echo $blog['id']; ?>" class="button small">Edit</a>
							<input type="submit" name="delete" value="Delete" class="button alert small"></input>
							<input type="hidden" name="id" value="<?php echo $blog['id']; ?>" />
						</form>
						<a href="/blogs/blog.php?id=<?php echo $blog['id']; ?>"><h3><?php echo $blog['title']; ?></h3></a>
						<div class="content">
							<?php echo $blog['content']; ?>
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

	<script src="/js/foundation/foundation.min.js"></script>

</body>
</html>

