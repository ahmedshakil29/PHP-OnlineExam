<?php
// require_once('../../index_model.php');
require_once('../../index_model.php');
// require_once('db.php');
session_start();
$total = $_POST['t'];
$eid = $_POST['quizID'];
$SectionID = $_POST['SectionID'];
$Password = $_POST['password'];


$indObj = new IndexModel();
$rs = $indObj->check_Exam_login($eid, $Password);
if ($rs == 0) {
    header('Location: QuizLogin.php?error=1&q=quiz&step=2&quizID=' . $eid . '&n=1&t=' . $total . '&SectionID= ' . $SectionID . '');
} else {
    header('Location:Home.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&SectionID= ' . $SectionID . '');
}
