<?php
require_once "../conn.php";
require_once "../includes/functions.php";
$type = sanitizeData('type');
$offset = (int) sanitizeData('offset');

if ($type === "category") :
	$category = (int) sanitizeData('category_id');
	if (!is_int($category) || !is_int($offset)) return;

	$query = $db->query("SELECT * FROM `publications` WHERE `category` = $category ORDER BY `time` DESC LIMIT 2 OFFSET $offset");

	$articles = $query->fetchAll(PDO::FETCH_OBJ);

	if ($articles) :
		foreach ($articles as $article) :
?>
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
		<?php
		endforeach;
	endif;
endif;

if ($type === "all") :
	$articles = getPublications($offset);
	foreach ($articles as $article) :
		?>
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
<?php
	endforeach;
endif;
