		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="?action=index">Shorty</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li <?php HtmlHelper::printCssIfActive('index'); ?>><a href="?action=index">Show all</a></li>
						<li <?php HtmlHelper::printCssIfActive('add'); ?>><a href="?action=add">Add</a></li>
						<li><a href="?action=signout">Signout</a></li>
					</ul>
				</div>
			</div>
		</div>