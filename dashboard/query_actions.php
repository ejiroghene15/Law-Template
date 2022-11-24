<?php
include_once "../conn.php";
include_once "../includes/functions.php";
require "./vendor/autoload.php";

// * Cloudinary global configuration
use Cloudinary\Configuration\Configuration;

// * Use the UploadApi class for uploading assets
use Cloudinary\Api\Upload\UploadApi;

Configuration::instance([
	'cloud' => [
		'cloud_name' => 'jiroghene',
		'api_key' => '231733456129326',
		'api_secret' => 'afbgethh1Qr2U18NFmxJSuxlpCQ'
	],
	'url' => [
		'secure' => true
	]
]);

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
	if (isset($_FILES['thumbnail']) && !empty($_FILES['thumbnail']['name'])) {
		$upload = new UploadApi();
		$thumbnail_id = sanitizeData('thumbnail_id');
		$thumbnail_url = $upload->upload($_FILES['thumbnail']['tmp_name'], [
			'public_id' => "metalex/$thumbnail_id",
			'use_filename' => true,
			'overwrite' => true
		])['secure_url'];

		extract(updatePublicationThumbnail($thumbnail_url, $thumbnail_id));
	}

	// * Services
	isset($_POST['add_service']) ? extract(addService()) : false;
	isset($_POST['update_service']) ? extract(updateService()) : false;
	isset($_POST['delete_service']) ? extract(deleteService()) : false;
}
