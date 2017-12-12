<?php

require_once('../model/init.php');
require_once('../model/db_model.php');

$googleClient = new Google_Client;
$db = new DB();
$auth =  new GoogleAuth($db, $googleClient);

if ($auth->checkRedirectCode()) {
	
	header('Location:user_controller.php');
	
}

?>