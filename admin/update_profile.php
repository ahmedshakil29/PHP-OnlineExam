<?php
require_once('../index_model.php');
	$UserID=$_POST['UserID'];
	$UserName=$_POST['UserName'];
	$UserEmail=$_POST['UserEmail'];
    $Password=$_POST['Password'];
	$Status=$_POST['Status'];

	$indObj = new IndexModel();
	$rs = $indObj->update_profile($UserID,$UserName,$UserEmail,$Password,$Status);
	 if($rs==1)
	 {
	 	header('Location: admin_profile.php');
	 }
	 else
	 {
		header('Location: admin_profile.php?error=1');
	 }
