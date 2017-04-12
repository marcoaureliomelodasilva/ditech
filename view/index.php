<?php
	require '../AutoLoader.php';
	$autoLoader = new AutoLoader();
	$ctrl = new controller\Controller();
	$ctrl->loadController();

	if (isset($ctrl->get->param1)) {
		$ctrl->includeContent($ctrl->get->param1, $ctrl->get->param2);
	}else{
		$ctrl->includeContent('', '');
	}
?>