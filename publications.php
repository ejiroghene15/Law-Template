<?php
require_once "./conn.php";
require_once "./includes/functions.php";
$articles = getPublications();
$page_title = "| Publications";
$page = "pub";
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "./includes/head.php" ?>

<body>
	<div class="aggr__container">
		<main>
			<div class="content">
				<nav class="aggr__nav">
					<div class="menu_container">
						<p id="mobile-trigger"><i class="bx bx-menu"></i> Menu</p>
						<input type="checkbox" data-target="mobile" />
						<ul>
							<li class="active"><a href="/">Home</a></li>
							<li><a href="./register.html">Submit your feed</a></li>
						</ul>
					</div>
				</nav>
				<section class="aggr__main_content">
					<h3 class="__heading">Aggregate: community driven content</h3>
					<p class="__about">
						Aggregate will search the web for quality content so you don't
						have to. We're scanning a curated list of quality content, and
						send you to it.
					</p>
					<p>
						Are you a content creator?
						<a class="__link" href="#">Submit your feed.</a>
					</p>

					<article class="__articles">
						<article>
							<a href="#" class="__title">
								This website is a single HTML file
							</a>
							<p>
								<a href="#" class="__site"> www.bram.us </a>
								<span class="__date_posted">- 9 days ago</span>
								<span class="__views">- 20 views</span>
							</p>
							<p class="labels">
								<a href="#" class="category"><i class="bx bxs-star"></i>
									<span class="title">php</span></a>
								<a href="#" class="vote"><i class="bx bxs-heart"></i>
									<span class="title">vote</span></a>
							</p>
						</article>

						<article>
							<a href="#" class="__title">
								Migrate servers from Forge to Ploi
							</a>
							<p>
								<a href="#" class="__site"> robindirksen.nl </a>
								<span class="__date_posted">- 8 days ago</span>
								<span class="__views">- 16 views</span>
							</p>
							<p class="labels">
								<a href="#" class="category"><i class="bx bxs-star"></i>
									<span class="title">php</span></a>
								<a href="#" class="vote"><i class="bx bxs-heart"></i>
									<span class="title">vote</span></a>
							</p>
						</article>

						<article>
							<a href="#" class="__title">
								A mail driver to quickly preview mail in Laravel apps
							</a>
							<p>
								<a href="#" class="__site"> murze.be </a>
								<span class="__date_posted">- 8 days ago</span>
								<span class="__views">- 13 views</span>
							</p>
							<p class="labels">
								<a href="#" class="category"><i class="bx bxs-star"></i>
									<span class="title">php</span></a>
								<a href="#" class="vote"><i class="bx bxs-heart"></i>
									<span class="title">vote</span></a>
							</p>
						</article>

						<article>
							<a href="#" class="__title">
								The Holy Grail Layout with CSS Grid
							</a>
							<p>
								<a href="#" class="__site"> css-tricks.com </a>
								<span class="__date_posted">- 9 days ago</span>
								<span class="__views">- 11 views</span>
							</p>
							<p class="labels">
								<a href="#" class="category"><i class="bx bxs-star"></i>
									<span class="title">frontend</span></a>
								<a href="#" class="vote"><i class="bx bxs-heart"></i>
									<span class="title">vote</span></a>
							</p>
						</article>
					</article>

					<div style="text-align: center">
						<button class="__more">Discover More</button>
					</div>
				</section>
			</div>
		</main>
		<footer></footer>
	</div>
</body>

</html>