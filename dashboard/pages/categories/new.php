<header id="header">
	<h3>Add New Category</h3>
	<a href="./categories">My Categories</a>
</header>

<form method="post">
	<input type="hidden" name="_csrf" value="<?php echo $_SESSION['_csrf'] ?>">
	<fieldset>
		<label for="">Category Name</label>
		<input type="text" name="category_name">
	</fieldset>

	<fieldset>
		<label for="">Description</label>
		<textarea name="description" rows="5">It should be an excerpt about the category</textarea>
	</fieldset>

	<fieldset>
		<label for="">Set Active</label>
		<select name="make_active">
			<option value="yes">Yes, make this category active</option>
			<option value="no">No, don't make active</option>
		</select>
	</fieldset>

	<fieldset>
		<button name="add_category" class="success" type="submit">Add Category</button>
	</fieldset>
</form>