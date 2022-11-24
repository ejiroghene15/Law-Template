<section class="aggr__main_content">
	<h3 class="__heading"><?php echo $category->name ?></h3>
	<p class="__about">
		<?php echo $category->description ?>
	</p>

	<p>
		Interested in having your article published on Metalex?
		<a class="__link" href="#">Send us a draft.</a>
	</p>

	<?php if ($articles) : ?>
		<section id="container">
			<div id="category-article" class="_article_list">
				<?php foreach ($articles as $article) : ?>
					<article class="category_article" data-post_id="<?php echo $article->id ?>">
						<figure>
							<img src="<?php echo $article->image ?>" alt="thumbnail">
						</figure>
						<footer>
							<a href="#" id="author">
								<img src="<?php echo BASE_PATH ?>assets/imgs/icons/linkedin_2.png" height="20" alt="">
								<span><?php echo $article->posted_by ?></span>
								<span id="date">
									<i class='bx bx-calendar-check'></i>
									<span><?php echo date("dS M", $article->time) ?></span>
								</span>
							</a>
							<a id="title" href="<?php echo "./$article->slug" ?>" target="_blank">
								<?php echo $article->title ?>
							</a>
						</footer>
					</article>
				<?php endforeach; ?>
			</div>
		</section>

		<div style="text-align: center">
			<button class="__more" id="load_more" data-for="category" value="<?php echo $article->category ?>">Discover More</button>
		</div>
	<?php else : ?>
		<h3>No publication for this category, kindly check back at a later time.</h3>
	<?php endif; ?>

</section>