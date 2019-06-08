<section class="header_block">	
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">MATCHA</a>
			</div>
			<div class="navbar-collapse collapse">
				<div class="search">
					<form method="GET" action="/account/search">
						<input type="text" name="poisk" class="form-control" placeholder="Search someone">
					</form>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<?php if (isset($account)) { ?>
						<li><a href="/account/profile">Profile</a></li>
						<li><a href="/account/chat">Chat</a></li>
						<li><a href="/account/search">Search</a></li>
						<li><a href="/account/settings">Settings</a></li>
						<li><a href="/account/logout">Logout</a></li>
					<?php } else { ?>
						<li><a href="/signup">Sign up</a></li>
						<li><a href="/login">Login</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</section>
