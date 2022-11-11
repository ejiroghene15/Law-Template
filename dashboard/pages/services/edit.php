<?php
$service_id = sanitizeData("service_id");
$service = editService();
if (!$service) :
	$status = 3;
	$message = "Service not found";
	return;
endif;

?>
<header id="header">
	<h3>Edit Service</h3>
	<a href="./services">My Services</a>
</header>

<form method="post">
	<input type="hidden" name="_csrf" value="<?php echo $_SESSION['_csrf'] ?>">
	<input type="hidden" name="service_id" value="<?php echo $service_id ?>">

	<fieldset>
		<label for="">Service Name</label>
		<input type="text" name="service_name" value="<?php echo $service->display_name ?>">
	</fieldset>

	<fieldset>
		<label for="">Description</label>
		<textarea id="service-editor" name="description" rows="5"><?php echo $service->full_description ?></textarea>
	</fieldset>

	<fieldset>
		<button name="update_service" class="success" type="submit">Update Service</button>
	</fieldset>
</form>