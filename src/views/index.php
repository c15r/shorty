<?php include_once 'layout/header.php'; ?>

<h2>All Shorties</h2>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Key</th>
			<th>Url</th>
		</tr>
	</thead>
	<tbody>
<?php
	foreach ($data["urls"] as $url) {
		print "<tr>\n";
		print "	<td>".$url->getName()."</td>\n";
		print "	<td><a href=\"".$url->getUrl()."\" target=\"_blank\">".$url->getUrl()."</a></td>\n";
		print "	<td><a href=\"?action=delete&name=".$url->getName()."\" class=\"btn btn-danger\">Delete</button></td>";
		print "</tr>\n";
	}
?>
	</tbody>
</table>

<?php include_once 'layout/footer.php'; ?>