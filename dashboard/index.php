<?php
require "../conn.php";
$page_title = "Dashboard";
$allowed_pages = ['profile', 'publications', 'categories', 'services'];
$page = strtolower(trim($_GET['page'] ?? ""));
$page_title = in_array($page, $allowed_pages) ? ucfirst($page) : 'Dashboard';

if (!isset($_SESSION['_csrf'])) {
	$_SESSION['_csrf'] = bin2hex(random_bytes(10));
}

include_once "./query_actions.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Metalex Legal | <?php echo $page_title ?></title>
	<script src="https://cdn.tiny.cloud/1/6xw6fzwqei9pwuwv8q3ksfk8elhwe85tcg8i1lvhnbi30qix/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="<?php echo BASE_PATH ?>assets/css/dashboard.css">
	<link rel="shortcut icon" href="<?php echo BASE_PATH ?>assets/imgs/logos/lg.png" type="image/x-icon">
</head>

<body>
	<section id="app-dashboard">
		<aside id="menu-bar">
			<header>
				<a href="../">
					<img id="logo" src="<?php echo BASE_PATH ?>/assets/imgs/logos/full_logo.png" alt="logo">
				</a>
			</header>

			<nav>
				<ul>
					<li>
						<span class="icon">
							<i class='bx bx-home-alt'></i>
						</span>
						<a href="<?php echo BASE_PATH ?>">Home</a>
					</li>
					<li>
						<span class="icon">
							<i class='bx bx-user-pin'></i>
						</span>
						<a href="./profile">My Profile</a>
					</li>
					<li>
						<span class="icon">
							<i class='bx bx-book-content'></i>
						</span>
						<a href="./publications">Publications</a>
					</li>
					<li>
						<span class="icon">
							<i class='bx bx-category-alt'></i>
						</span>
						<a href="./categories">Categories</a>
					</li>
					<li>
						<span class="icon">
							<i class='bx bx-wrench'></i>
						</span>
						<a href="./services">Services</a>
					</li>
				</ul>
			</nav>
		</aside>

		<main id="content">
			<nav>
				<h3><?php echo $page_title ?></h3>
				<p id="auth-admin">
					<span>Hello Admin</span>
					<a href="../logout" id="logout-btn"><i class='bx bx-power-off'></i></a>
				</p>
			</nav>

			<div id="alert">
				<?php
				if (isset($message) && isset($status)) :
					$color = $status == 1 ? "success" : ($status == 2 ? "info" : "danger");
				?>
					<div class="alert alert-<?php echo $color ?>" role="alert" style="height: max-content;">
						<small style="font-size: 14px;"><strong class=""><?php echo $message ?></strong></small>
					</div>
				<?php endif; ?>
			</div>

			<section id="content-body">
				<?php if ($page) include_once "./pages/index.php" ?>
			</section>
		</main>
	</section>

	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script>
		tinymce.init({
			menubar: false,
			selector: '#editor',
			plugins: 'anchor autolink charmap emoticons link lists searchreplace table visualblocks wordcount',
			toolbar: 'blocks | bold italic underline strikethrough | link | numlist bullist | emoticons charmap',
		});

		tinymce.init({
			menubar: false,
			selector: '#service-editor',
			plugins: 'lists',
			toolbar: 'bullist',
		});
	</script>
</body>

</html>