<?php
require '../AutoLoader.php';
$autoLoader = new AutoLoader();
$ctrl = new controller\Controller();
$ctrl->loadController();
var_dump($_GET);
?>