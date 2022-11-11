<?php
include_once "../conn.php";
include_once "../includes/functions.php";

if (isset($_POST) && count(array_keys($_POST)) && checkCSRF() === false) {
	// * Run a check to be sure the request is valid
	$status = 3;
	$message = 'Invalid Request';
} else {
	// * Categories
	isset($_POST['add_category']) ? extract(addCategory()) : false;

	// * Publications
	isset($_POST['add_publication']) ? extract(addPublication()) : false;
	isset($_POST['update_publication']) ? extract(updatePublication()) : false;
	isset($_POST['delete_publication']) ? extract(deletePublication()) : false;

	// * Services
	isset($_POST['add_service']) ? extract(addService()) : false;
	isset($_POST['update_service']) ? extract(updateService()) : false;
	isset($_POST['delete_service']) ? extract(deleteService()) : false;

}
