<header id="header">
	<h3>Your Services</h3>
	<a href="./services&action=new">Add Service</a>
</header>

<table class="table" cellspacing=0>
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Action</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = getServices();
		while ($ser = $query->fetch(PDO::FETCH_ASSOC)) :
			$modal_id = uniqid("service_");
		?>
			<tr>
				<td><?php echo $ser['display_name']; ?></td>
				<td><?php echo $ser['full_description']; ?></td>
				<td>
					<?php echo "<a class='table-link info' href='./services&action=edit&service_id={$ser['id']}'>Edit Service</a>" ?>
					<?php echo "<a href='#$modal_id' class='table-link danger'>Delete Service</a>" ?>
				</td>
				<td>
					<div id="<?php echo $modal_id ?>" class="modal">
						<div class="modal__content">
							<h1><?php echo $ser['display_name'] ?></h1>

							<p>
								Are you sure you want to delete this Service?
							</p>

							<form method="post">
								<input type="hidden" name="_csrf" value="<?php echo $_SESSION['_csrf'] ?>">
								<input type="hidden" name="service_id" value="<?php echo $ser['id'] ?>">
								<input type="hidden" name="service_name" value="<?php echo $ser['display_name'] ?>">

								<fieldset>
									<button name="delete_service" class="success" type="submit">Yes Delete!!</button>
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