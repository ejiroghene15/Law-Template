<?php
require_once "./conn.php";
require_once "./includes/functions.php";
require_once "./query_actions/publications.php";

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "./includes/head.php" ?>

<body>
	<div class="aggr__container">
		<main>
			<div class="content">

				<nav class="aggr__nav">
					<header id="logo">
						<a href="/">
							<img src="<?php echo BASE_PATH ?>assets/imgs/logos/full_logo.png" height="40" style="object-position: -11px 0;" />
						</a>
					</header>

					<div class="menu_container">
						<p id="mobile-trigger">
							<img src="<?php echo BASE_PATH ?>assets/imgs/icons/hamburger.svg" alt="" />
						</p>
						<input type="checkbox" data-target="mobile" />
						<ul>
							<li class="category">
								<span>Categories</span>
							</li>
							<li>
								<a href="./">All</a>
							</li>
							<?php
							$categories = getCategories()->fetchAll(PDO::FETCH_OBJ);
							// shuffle($categories);
							foreach ($categories as $cat) : ?>
								<li>
									<a href="./?category=<?php echo $cat->slug ?>">
										<?php if (isset($_GET['category']) && $_GET['category'] === $cat->slug) : ?>
											<span class="tag">
												<i class="bx bxs-tag-alt"></i>
											</span>
										<?php endif; ?>
										<span><?php echo ucwords($cat->name) ?></span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</nav>

				<?php
				include $display_only_category ? "./articles/category.php" : ($display_full_article ? "./articles/single.php" : "./articles/all.php");
				?>

			</div>
		</main>
		<footer></footer>
	</div>

	<?php include_once "./includes/scripts.php" ?>
</body>

</html>