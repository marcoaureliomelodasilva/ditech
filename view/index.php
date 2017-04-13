<?php
	require '../AutoLoader.php';
	$autoLoader = new AutoLoader();
	$ctrl = new controller\Controller();
	$ctrl->loadController();
	session_start();
	if (isset($_SESSION["idUser"])) {
		$login=1;
	}else{
		$login=0;
	}
?>
<?php
	if ($login==1) {
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
<?php }else{ ?>
<html>
	<head>
		<?php 
		$ctrl->includeStructure('head'); 
		?>
	</head>
	<body class="pace-done skin-blue bg-black">
	<?php $ctrl->includeContent('login', 'index'); ?>
	</body>
</html>
<?php } ?>
