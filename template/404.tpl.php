<div id="container">
	<div id="left-sidebar">

		<div id="top">
			<h1><?php echo getSettingFromDB("site_name", $conn); ?></h1>
		</div>
		<div id="menu">
			<?php displayMenu("adminmenu", $conn); ?>
		</div>
	</div>
	
	<div id="content-narrow">
	<div id="top-bar"><p><i class="fa fa-bars fa-3" aria-hidden="true"></i></p></div>
	<div style="width:90%;margin:0 auto;">
		<h1 class="404">404</h1>
		<h2 class="404">Not Found!</h1>
	 </div>
	</div>
</div>