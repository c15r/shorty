<?php include_once 'layout/header.php'; ?>

<h2>Create a new Shorty</h2>

<form role="form" class="form-add" action="" method="get">
	<?php HtmlHelper::flash($data); ?>
	<input type="hidden" name="action" value="save" />
	<div class="form-group">
		<label for="name">Key</label>
		<input type="text" class="form-control" id="name" name="name" value="<?php print $data['key']; ?>">
	</div>
	<div class="form-group">
		<label for="url">Url</label>
		<input type="text" class="form-control" id="url" name="url" value="<?php print $data['url']; ?>">
	</div>
	<button type="submit" class="btn btn-primary">Save</button>
</form>

<?php include_once 'layout/footer.php'; ?>