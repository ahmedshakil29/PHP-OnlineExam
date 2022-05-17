<?php
// require_once('../index_model.php');
require_once('db.php');

if (@$_GET['q'] == 'rmquiz') {
    $eid = @$_GET['eid'];
    $result = mysqli_query($con, "SELECT * FROM questions WHERE QuizID='$eid' ") or die('Error');
    while ($row = mysqli_fetch_array($result)) {
        $qid = $row['QuestionID'];
        $r1 = mysqli_query($con, "DELETE FROM options WHERE QuestionID='$qid'") or die('Error');
        $r2 = mysqli_query($con, "DELETE FROM answer WHERE QuestionID='$qid' ") or die('Error');
    }
    $r3 = mysqli_query($con, "DELETE FROM questions WHERE QuizID='$eid' ") or die('Error');
    $r4 = mysqli_query($con, "DELETE FROM quiz WHERE QuizID='$eid' ") or die('Error');
    $r4 = mysqli_query($con, "DELETE FROM history WHERE QuizID='$eid' ") or die('Error');

    header("location:../../teacher.php?");
}
