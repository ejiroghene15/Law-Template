<?php
$page_title = "| Publications";
$page = "pub";

$display_full_article = false;
$display_only_category = false;

// * display the full details of a publication article
if (isset($_GET['article']) && !is_numeric($_GET['article'])) {
	$article_slug = sanitizeData('article');
	$query = $db->query("SELECT publications.*, publication_category.name AS category, publication_category.slug AS category_slug FROM publications JOIN publication_category ON publications.category = publication_category.id WHERE publications.slug = '$article_slug'");
	$article = $query->fetch(PDO::FETCH_OBJ);
	if (!$article) {
		header("location: ./");
	}
	$page_title .= " - $article->title";
	$display_full_article = true;
	$share_link = "https://metalexlegal.com/publications/$article->slug";
}

// * get all publications belonging to a particular category
if (isset($_GET['category'])) {
	$category_slug = sanitizeData('category');
	$query = $db->prepare("SELECT * FROM `publication_category` WHERE `slug` = ?");
	$query->execute([$category_slug]);
	$category =  $query->fetch(PDO::FETCH_OBJ);
	if ($category) {
		$display_only_category = true;
		$query = $db->query("SELECT * FROM `publications` WHERE `category` = $category->id ORDER BY `time` DESC LIMIT 2 ");
		$articles = $query->fetchAll(PDO::FETCH_OBJ);
	}
}

// * get all publications
if (!$display_full_article && !$display_only_category) {
	$articles = getPublications(0);
}
