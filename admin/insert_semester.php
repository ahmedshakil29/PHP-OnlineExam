<?php
require_once('../index_model.php');

$SemesterTitle = $_POST['SemesterTitle'];
$Status = $_POST['Status'];

$indObj = new IndexModel();
$rs = $indObj->insert_semester($SemesterTitle, $Status);
if ($rs == 1) {
	header('Location: semesters.php');
} else {
	header('Location: new_semester.php');
}
