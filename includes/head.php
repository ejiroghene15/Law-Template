<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo  isset($page_title) ? "Metalex Legal $page_title" : 'Metal Legal' ?></title>
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="<?php echo BASE_PATH ?>assets/css/style.css" />
	<?php if (isset($page) && $page == "pub") : ?>
		<link rel="stylesheet" href="<?php echo BASE_PATH ?>assets/css/publication.css" />
		<link
			href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet"
		/>
	<?php endif; ?>
	<link rel="shortcut icon" href="<?php echo BASE_PATH ?>assets/imgs/logos/lg.png" type="image/x-icon">
</head>