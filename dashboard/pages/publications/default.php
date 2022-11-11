<header id="header">
	<h3>My Publications</h3>
	<a href="./publications&action=new">Add Publication</a>
</header>

<table class="table" cellspacing=0>
	<thead>
		<tr>
			<th>Title</th>
			<th>Category</th>
			<th>Author</th>
			<th>Date Posted</th>
			<th>Action</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = getPublications();
		while ($pub = $query->fetch(PDO::FETCH_ASSOC)) :
			$modal_id = uniqid("post_");

		?>
			<tr>
				<td><?php echo $pub['title']; ?></td>
				<td><?php echo $pub['category']; ?></td>
				<td><?php echo $pub['posted_by']; ?></td>
				<td><?php echo date("l jS \of F Y", $pub['time']); ?></td>
				<td>
					<?php echo "<a class='table-link info' href='./publications&action=edit&publication_id={$pub['id']}'>Edit Post</a>" ?>
					<?php echo "<a href='#$modal_id' class='table-link danger'>Delete Post</a>" ?>
				</td>
				<td>
					<div id="<?php echo $modal_id ?>" class="modal">
						<div class="modal__content">
							<h1><?php echo $pub['title'] ?></h1>

							<p>
								Are you sure you want to delete this publication?
							</p>

							<form method="post">
								<input type="hidden" name="_csrf" value="<?php echo $_SESSION['_csrf'] ?>">
								<input type="hidden" name="publication_id" value="<?php echo $pub['id'] ?>">

								<fieldset>
									<button name="delete_publication" class="success" type="submit">Yes Delete!!</button>
								</fieldset>
							</form>

							<a href="#" class="modal__close">&times;</a>
						</div>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>