<header id="header">
	<h3>Add New Service</h3>
	<a href="./services">My Services</a>
</header>

<form method="post">
	<input type="hidden" name="_csrf" value="<?php echo $_SESSION['_csrf'] ?>">
	<fieldset>
		<label for="">Service Name</label>
		<input type="text" name="service_name">
	</fieldset>

	<fieldset>
		<label for="">Description</label>
		<textarea name="description" rows="5"></textarea>
	</fieldset>

	<fieldset>
		<button name="add_service" class="success" type="submit">Add Service</button>
	</fieldset>
</form>