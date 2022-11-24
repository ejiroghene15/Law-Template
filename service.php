<?php
require_once "./conn.php";
$service_slug = htmlspecialchars(trim(strip_tags($_GET['slug'])));
$service_query = $db->query("SELECT * FROM `services` WHERE `slug` = '$service_slug'");
$service = $service_query->fetch(PDO::FETCH_OBJ);
if ($service) :
	$page_title = " | Services - $service->display_name";
?>
	<!DOCTYPE html>
	<html lang="en">

	<?php include_once "./includes/head.php" ?>

	<body>
		<section id="grid-page-container">
			<!-- // * Navbar  -->
			<?php include_once "./includes/services.nav.php" ?>

			<!-- // * Main Body -->
			<main id="services-page">
				<aside>
					<article>
						<img src="<?php echo BASE_PATH ?>assets/imgs/icons/<?php echo $service->logo ?>" alt="<?php echo $service->logo ?>" height="50" />
						<h3 class="headings"><?php echo $service->display_name ?></h3>
					</article>
				</aside>
				<article>
					<h1><span>Our</span> Services</h1>
					<?php echo htmlspecialchars_decode($service->full_description) ?>
				</article>
			</main>

			<!-- // * Footer  -->
			<?php include_once "./includes/footer.php" ?>
		</section>
		<!-- // * Scripts  -->
		<?php include_once "./includes/scripts.php" ?>
	</body>

	</html>
<?php endif; ?>