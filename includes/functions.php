<?php
function sanitizeData($data)
{
	switch ($_SERVER['REQUEST_METHOD']) {
		case 'POST':
			return htmlspecialchars(trim(strip_tags($_POST[$data])));
			break;

		case 'GET':
			return htmlspecialchars(trim(strip_tags($_GET[$data] ?? null)));
			break;
	}
}

function checkCSRF()
{
	return sanitizeData('_csrf') === $_SESSION['_csrf'];
}

function sanitizeQueryString($data)
{
	return htmlspecialchars(trim(strip_tags($_GET[$data] ?? '')));
}

function getCategories()
{
	global $db;
	return $db->query("SELECT * FROM `publication_category`");
}

function addCategory()
{
	global $db;
	$category = sanitizeData("category_name");
	$description = sanitizeData("description");
	$active = sanitizeData("make_active");

	$query = $db->prepare("INSERT INTO `publication_category` (`name`, `description`, `active`) VALUES (?, ?, ?)");
	if ($query->execute([$category, $description, $active])) return ["status" => 1, "message" => "Category <q>$category</q> Added"];
}

function getPublications()
{
	global $db;
	return $db->query("SELECT publications.*, publication_category.name AS category FROM publications JOIN publication_category ON publications.category = publication_category.id ORDER BY publications.time DESC");
}

function addPublication()
{
	global $db;
	$title = sanitizeData("title");
	$category = sanitizeData("category");
	$body = $_POST['body'];
	$time = time();
	$author = "Admin";

	$query = $db->prepare("INSERT INTO `publications` (`title`, `body`, `category`, `time`, `posted_by`) VALUES (?, ?, ?, ?, ?)");

	if ($query->execute([$title, $body, $category, $time, $author])) return ["status" => 1, "message" => "New Publication <q>$title</q> Added"];
}

function editPublication()
{
	global $db;
	$publication_id = sanitizeData("publication_id");
	$query = $db->query("SELECT * FROM `publications` WHERE `id` =  '$publication_id'");
	return $query->fetch(PDO::FETCH_OBJ);
}

function updatePublication()
{
	global $db;
	$publication_id = sanitizeData("publication_id");
	$title = sanitizeData("title");
	$category = sanitizeData("category");
	$body = $_POST['body'];
	// $author = "Admin";

	$query = $db->prepare("UPDATE `publications` SET `title` = ?, `category` = ?, `body` = ? WHERE  id = ?");

	if ($query->execute([$title, $category, $body, $publication_id])) return ["status" => 1, "message" => "Publication <q>$title</q> has been updated"];
}

function deletePublication()
{
	global $db;
	$publication_id = sanitizeData("publication_id");
	$query = $db->exec("DELETE FROM `publications` WHERE `id` = '$publication_id'");
	if ($query) return ["status" => 1, "message" => "Publication has been deleted"];
}

function getServices()
{
	global $db;
	return $db->query("SELECT * FROM `services`");
}

function addService()
{
	global $db;
	$name = sanitizeData("service_name");
	$description = sanitizeData("description");
	$slug = strtolower(str_replace(" ", "-", $name));
	$date_created = time();

	$query = $db->prepare("INSERT INTO `services` (`display_name`, `slug`, `full_description`, `date_created`) VALUES (?, ?, ?, ?)");

	if ($query->execute([$name, $slug, $description, $date_created])) return ["status" => 1, "message" => "New Service <q>$name</q> Added"];
}

function editService()
{
	global $db;
	$service_id = sanitizeData("service_id");
	$query = $db->query("SELECT * FROM `services` WHERE `id` =  '$service_id'");
	return $query->fetch(PDO::FETCH_OBJ);
}

function updateService()
{
	global $db;
	$service_id = sanitizeData("service_id");
	$name = sanitizeData("service_name");
	$description = $_POST["description"];
	$slug = strtolower(str_replace(" ", "-", $name));

	$query = $db->prepare("UPDATE `services` SET `display_name` = ?, `slug` = ?, `full_description` = ? WHERE `id` = ?");
	if ($query->execute([$name, $slug, $description, $service_id])) return ["status" => 1, "message" => "Service <q>$name</q> has been updated"];
}

function deleteService()
{
	global $db;
	$service_id = sanitizeData("service_id");
	$service_name = sanitizeData("service_name");
	$query = $db->exec("DELETE FROM `services` WHERE `id` = '$service_id'");
	if ($query) return ["status" => 1, "message" => "Service <q>$service_name</q> has been deleted"];
}
