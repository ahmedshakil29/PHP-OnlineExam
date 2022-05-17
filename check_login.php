<?php
require_once('index_model.php');
session_start();
$indObj = new IndexModel();
$rs = $indObj->check_login($_POST['email'], $_POST['password']);
if ($rs == 0) {
	header('Location: login.php?error=1');
} else {
	while ($d = mysqli_fetch_assoc($rs)) {
		$_SESSION["UserID"] = $d['UserID'];
		$_SESSION["email"] = $_POST['email'];
		if ($d['UserTypeID'] == 1) {
			$_SESSION['key'] = 'student';
			header('Location: student.php');
		} else if ($d['UserTypeID'] == 2) {
			$_SESSION["key"] = 'teacher';
			header('Location: teacher.php');
		} else if ($d['UserTypeID'] == 3) {
			header('Location: admin.php');
		}
	}
}
