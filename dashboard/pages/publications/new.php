<header id="header">
	<h3>New Publication</h3>
	<a href="./publications">My Publications</a>
</header>

<form method="post">
	<input type="hidden" name="_csrf" value="<?php echo $_SESSION['_csrf'] ?>">
	<fieldset>
		<label for="">Title of your Article</label>
		<input type="text" name="title">
	</fieldset>

	<fieldset>
		<label for="">Choose Category</label>
		<select name="category">
			<?php
			$query = getCategories();
			while ($cat = $query->fetch(PDO::FETCH_ASSOC)) :
				echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
			endwhile;
			?>
		</select>
	</fieldset>

	<fieldset>
		<label for="">Article Body</label>
		<textarea id="editor" name="body" rows="5"></textarea>
	</fieldset>

	<fieldset>
		<button name="add_publication" class="success" type="submit">Add Publication</button>
	</fieldset>
</form>