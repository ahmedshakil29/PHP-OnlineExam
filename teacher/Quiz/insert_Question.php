<?php
// require_once('../index_model.php');
require_once('db.php');

//add question
// if (@$_GET['q'] == 'addqns') {
$n = @$_GET['n'];
$QuizID = @$_GET['eid'];
$ch = @$_GET['ch'];

for ($i = 1; $i <= $n; $i++) {
    $QuestionID = uniqid();
    $Question = $_POST['qns' . $i];
    $q3 = mysqli_query($con, "INSERT INTO questions VALUES  ('" . $QuizID . "','" . $QuestionID . "','" . $Question . "' ," . $ch . "," . $i . ")");
    $a = uniqid();
    $oaid = uniqid();
    $obid = uniqid();
    $ocid = uniqid();
    $odid = uniqid();
    // $oaid = $a + '100';
    // $obid = $a + '200';
    // $ocid = $a + '300';
    // $odid = $a + '400';
    $a = $_POST[$i . '1'];
    $b = $_POST[$i . '2'];
    $c = $_POST[$i . '3'];
    $d = $_POST[$i . '4'];
    $qa = mysqli_query($con, "INSERT INTO options VALUES  (Null,'" . $QuestionID . "','" . $oaid . "','" . $a . "')") or die('Error61');
    $qb = mysqli_query($con, "INSERT INTO options VALUES  (Null,'" . $QuestionID . "','" . $obid . "','" . $b . "')") or die('Error62');
    $qc = mysqli_query($con, "INSERT INTO options VALUES  (Null,'" . $QuestionID . "','" . $ocid . "','" . $c . "')") or die('Error63');
    $qd = mysqli_query($con, "INSERT INTO options VALUES  (Null,'" . $QuestionID . "','" . $odid . "','" . $d . "')") or die('Error64');
    $e = $_POST['ans' . $i];
    switch ($e) {
        case 'a':
            $ansid = $oaid;
            break;
        case 'b':
            $ansid = $obid;
            break;
        case 'c':
            $ansid = $ocid;
            break;
        case 'd':
            $ansid = $odid;
            break;
        default:
            $ansid = $oaid;
    }


    $qans = mysqli_query($con, "INSERT INTO answer VALUES  ('" . $QuestionID . "','" . $ansid . "')");
}
header("location:../Profile.php");
// }
