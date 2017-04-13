<?php
	require '../AutoLoader.php';
	$autoLoader = new AutoLoader();
	$ctrl = new controller\Controller();
	$ctrl->loadController();
	
?>
<html>
	<head>
		<?php 
		$ctrl->includeStructure('head'); 
		?>
	</head>
	<body class="pace-done skin-blue">

		<?php
		$ctrl->includeStructure('navHeader');
		$ctrl->includeStructure('navSideBar');
		?>
		<div id="main" class="container-fluid">
		    <div class="row-fluid">
				<?php
				$ctrl->includeStructure('content');
				?>
		    </div>
		</div>
	</body>
</html>
