<?php
require_once('../index_model.php');
	$indObj = new IndexModel();
	$rs = $indObj->reset_password($_GET['UserID']);
	if($rs==1)
	{
		header('Location: users.php');
	}
	else
	{
		header('Location: users.php?error=1');
	}
