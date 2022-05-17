<?php
require_once('../index_model.php');
$UserID = $_POST['UserID'];
$UserName = $_POST['UserName'];
$UserEmail = $_POST['UserEmail'];
$Password = $_POST['Password'];
$Status = $_POST['Status'];

$indObj = new IndexModel();
$rs = $indObj->update_profile($UserID, $UserName, $UserEmail, $Password, $Status);
if ($rs == 1) {
	header('Location: Profile.php');
} else {
	header('Location: Profile.php?error=1');
}
