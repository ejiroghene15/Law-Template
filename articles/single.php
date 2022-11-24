<section class="aggr__main_content">
	<a href="<?php echo "./?category=$article->category_slug" ?>" class="category tag-label">
		<i class="bx bxs-tag-alt"></i>
		<span class="title"><?php echo ucwords($article->category) ?></span>
	</a>

	<h3 class="__heading alt"><?php echo $article->title ?></h3>

	<p class="__meta_info">
		<a href="#">
			<img src="<?php echo BASE_PATH ?>assets/imgs/icons/linkedin_2.png" height="20" alt="">
			<span>
				<?php echo "By $article->posted_by" ?>
			</span>
			- <span><?php echo date("l, dS M Y", $article->time); ?></span>
		</a>

	</p>

	<article id="full-article">
		<figure>
			<img src="<?php echo $article->image ?>" alt="thumbnail">
		</figure>

		<div id="content">
			<?php echo $article->body ?>
		</div>

		<footer>
			<h3>Share this article</h3>
			<a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=$share_link" ?>" target="_blank">
				<img src="<?php echo BASE_PATH ?>assets/imgs/icons/facebook-r.png" alt="">
			</a>
			<a href="<?php echo "https://twitter.com/intent/tweet?text=$share_link" ?>" target="_blank">
				<img src="<?php echo BASE_PATH ?>assets/imgs/icons/twitter-r.png" alt="">
			</a>
			<a href="<?php echo "whatsapp://send?text=$share_link" ?>" target="_blank">
				<img src="<?php echo BASE_PATH ?>assets/imgs/icons/whatsapp.png" alt="">
			</a>
		</footer>
	</article>
</section>

<aside id="side-bar">
	<div>
		<h3 id="info">Interested in having your article published on Metalex? Send us a draft</h3>
		<header>
			<h3>Related Posts</h3>
		</header>

		<ul id="more-articles">
			<?php
			$random_articles = getRandomArticle($article->id);
			foreach ($random_articles as $ra) :
			?>
				<li>
					<a href="<?php echo "./$ra->slug" ?>">
						<section>
							<h4><?php echo $ra->title ?></h4>
							<span for=""><?php echo $ra->category ?></span>
						</section>
						<figure>
							<img src="<?php echo $ra->image ?>" alt="thumbnail">
						</figure>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</aside>