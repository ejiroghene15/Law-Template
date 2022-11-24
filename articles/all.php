<section class="aggr__main_content">
	<h3 class="__heading">Aggregate: community driven content</h3>
	<p class="__about">
		Aggregate will search the web for quality content so you don't
		have to. We're scanning a curated list of quality content, and
		send you to it.
	</p>

	<p>
		Interested in having your article published on Metalex?
		<a class="__link" href="#">Send us a draft.</a>
	</p>

	<article class="__articles _article_list">
		<?php foreach ($articles as $article) : ?>
			<article>
				<a href="<?php echo "./$article->slug" ?>" class="__title">
					<?php echo $article->title ?>
				</a>
				<p id="meta">
					<!-- <a href="#" class="__site"> www.bram.us </a> -->
					<span class="__date_posted"> <?php echo date("D dS M Y", $article->time) ?></span>
					<span class="__author"> - <?php echo $article->posted_by ?></span>
				</p>

				<p class="labels">
					<!-- <a href="#" class="category"><i class="bx bxs-star"></i>
										<span class="title">php</span>
									</a> -->

					<a href="<?php echo "./$article->slug" ?>" class="category">
						<i class="bx bxs-tag-alt"></i>
						<span class="title"><?php echo ucwords($article->category) ?></span>
					</a>
				</p>
			</article>
		<?php endforeach; ?>
	</article>

	<div style="text-align: center">
		<button class="__more" id="load_more" data-for="all">Discover More</button>
	</div>
</section>