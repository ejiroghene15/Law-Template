<?php
require_once dirname(__DIR__) . "/conn.php";
require_once dirname(__DIR__) . "/includes/functions.php";

//? Sanitize the data sent in
$name = sanitizeData("name");
$email = sanitizeData("email");
$message = sanitizeData("message");

if (!!$name && !!$email && !!$message) {
	//? Check if the email address is valid
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo json_encode(["status" => 3, "message" => "Please enter a valid email address"]);
		return;
	}

	//? Prepare the query and save the data to the database
	$date_sent = time();
	$query = $db->prepare("INSERT INTO contact_us (`name`, `email`, `message`, `date_sent`) VALUES (?, ?, ?, ?) ");
	if ($query->execute([$name, $email, $message, $date_sent])) {
		echo json_encode(["status" => 1, "message" => "Your message has been received, we'll respond back to you as soon as possible"]);
		return;
	}
}

echo json_encode(["status" => 3, "message" => "All fields are required"]);
return;
