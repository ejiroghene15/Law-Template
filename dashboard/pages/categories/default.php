<header id="header">
	<h3>Publication Categories</h3>
	<a href="./categories&action=new">Add Category</a>
</header>

<table class="table" cellspacing=0>
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Is Active</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = getCategories();
		while ($cat = $query->fetch(PDO::FETCH_ASSOC)) :
		?>
			<tr>
				<td><?php echo $cat['name']; ?></td>
				<td><?php echo $cat['description']; ?></td>
				<td><?php echo $cat['active']; ?></td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>