<div id="container">
	<div id="left-sidebar">
		<div id="top">
			<h1><?php echo getSettingFromDB("site_name", $conn); ?></h1>
		</div>
		<div id="menu">
			<?php displayMenu("adminmenu", $conn); ?>
		</div>
	</div>
</div>