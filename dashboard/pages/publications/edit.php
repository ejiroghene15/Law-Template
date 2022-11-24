<?php
$publication_id = sanitizeData("publication_id");
$publication = editPublication();

if (!$publication) :
	$status = 3;
	$message = "Publication not found";
	return;
endif;
?>

<header id="header">
	<h3>Edit Publication</h3>
	<a href="./publications">My Publications</a>
</header>

<form method="post" enctype="multipart/form-data" style="width: 320px; margin-inline: auto;">
	<input type="hidden" name="_csrf" value="<?php echo $_SESSION['_csrf'] ?>">
	<input type="hidden" name="publication_id" value="<?php echo $publication_id ?>">
	<input type="hidden" name="thumbnail_id" value="<?php echo $publication->thumbnail_id ?>">
	<fieldset>
		<input type="file" name="thumbnail" class="dropify" data-default-file="<?php echo $publication->image ?? BASE_PATH . "assets/imgs/logos/full_logo.png" ?>" />
	</fieldset>

	<fieldset style="text-align: center;">
		<button name="update_thumbnail" class="success" type="submit">Update Thumbnail</button>
	</fieldset>
</form>

<form method="post">
	<input type="hidden" name="_csrf" value="<?php echo $_SESSION['_csrf'] ?>">
	<fieldset>
		<label for="">Title of your Article</label>
		<input type="text" name="title" value="<?php echo $publication->title ?>">
		<input type="hidden" name="publication_id" value="<?php echo $publication_id ?>">
	</fieldset>

	<fieldset>
		<la for="">Choose Category</la bel>
		<select name="category">
			<?php
			$query = getCategories();
			while ($cat = $query->fetch(PDO::FETCH_ASSOC)) :
				$selected = $cat['id'] == $publication->category ? "selected" : false;
				echo "<option value='{$cat['id']}' $selected>{$cat['name']}</option>";
			endwhile;
			?>
		</select>
	</fieldset>

	<fieldset>
		<label for="">Article Body</label>
		<textarea id="editor" name="body" rows="5"><?php echo $publication->body ?></textarea>
	</fieldset>

	<fieldset>
		<button name="update_publication" class="success" type="submit">Update Publication</button>
	</fieldset>
</form>