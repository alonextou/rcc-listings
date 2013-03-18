<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/libraries/connect.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/models/job.php';

    if($db){
        $dbStatus = 'The database is connected.';
    } else {
    	$dbStatus = 'The database is NOT connected.';
    }

    $title = 'Jobs';
	
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
	
		<dl class="sub-nav left">
			<dt>Sorting:</dt>
			<dd class="active"><a href="/jobs.php">New - Old</a></dd>
			<dd><a href="/jobs.php?sort=old">Old - New</a></dd>
			<dd><a href="/jobs.php?sort=alpha">Alphabetical</a></dd>
			<dd><a href="/jobs.php?sort=zulu">Reverse Alphabetical</a></dd>
		</dl>

		<ul class="button-group radius right">
			<li>
				<a href="/jobs/new.php" class="button success">Post New Job Listing</a>
			</li>
		</ul>
	</div>

	<div class="row">
		<div class="nine columns">
			<?php foreach (getJobs($db) as $job){ ?>
				<form action="/models/job.php" method="post">
					<a href="/jobs/edit.php?id=<?php echo $job['id']; ?>" class="button small">Edit</a>
					<input type="submit" name="delete" value="Delete" class="button alert small"></input>
					<input type="hidden" name="id" value="<?php echo $job['id']; ?>" />
				</form>
				<h4><a href="/jobs/job.php?id=<?php echo $job['id']; ?>"><?php echo $job['title']; ?></a></h4>
				<div class="content">
					<table class="twelve">
						<tbody>
							<tr>
								<td><strong>Listed Date</strong></td>
								<td><?php echo $job['listed']; ?></td>
							</tr>
							<tr>
								<td><strong>Company / Owner</strong></td>
								<td><?php echo $job['company']; ?></td>
							</tr>
							<tr>
								<td><strong>Job Location</strong></td>
								<td><?php echo $job['location']; ?></td>
							</tr>
						</tbody>
					</table>						
				</div>
				<hr/>
			<?php } ?>
		</div>
		<div class="three columns right">
			<div class="row">
				<div class="panel callout radius">
					<p>Jobs and projects posted here are for registered RCC Student developers only.</p>
				</div>
			</div>
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

	<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

</body>
</html>

