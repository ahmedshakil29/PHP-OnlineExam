<?php
require_once('../../index_model.php');
$QuizID = uniqid();
$QuizTitle = $_POST['name'];
// $QuizTitle = ucwords(strtolower($QuizTitle));
$TotalQuestion = $_POST['total'];
$Right = $_POST['right'];
$Wrong = $_POST['wrong'];
$QuizTime = $_POST['time'];
$QuizPassword = $_POST['tag'];
$Details = $_POST['desc'];
// $Date = date('h:i:s');
$SectionID = $_POST["SectionID"];

$indObj = new IndexModel();
$rs = $indObj->insert_quiz($QuizID, $QuizTitle, $TotalQuestion, $Right, $Wrong, $QuizTime, $QuizPassword, $Details, $SectionID);
if ($rs == 1) {
    header("location:addQuestion.php?q=4&step=2&eid=$QuizID&n=$TotalQuestion");
} else {
    header("location:2addQuiz.php?error=1&SectionID=$SectionID");
}
