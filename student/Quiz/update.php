<?php
include_once 'db.php';
session_start();
$email = $_SESSION['email'];
$SectionID = $_GET['SectionID'];

//quiz start
// if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
$quizID = @$_GET['quizID'];
$sn = @$_GET['n'];
$total = @$_GET['t'];
$ans = $_POST['ans'];
$qid = @$_GET['qid'];
$q = mysqli_query($con, "SELECT * FROM answer WHERE QuestionID='$qid' ");
while ($row = mysqli_fetch_array($q)) {
  $ansid = $row['AnswerID'];
}
if ($ans == $ansid) {
  $q = mysqli_query($con, "SELECT * FROM quiz WHERE QuizID='$quizID' ");
  while ($row = mysqli_fetch_array($q)) {
    $right = $row['Right'];
  }
  if ($sn == 1) {
    $q = mysqli_query($con, "INSERT INTO history VALUES(Null,'$email','$quizID' ,'0','0','0','0',NOW())") or die('Error');
  }
  $q = mysqli_query($con, "SELECT * FROM history WHERE QuizID='$quizID' AND UserEmail='$email' ") or die('Error115');
  while ($row = mysqli_fetch_array($q)) {
    $s = $row['Score'];
    $r = $row['TRight'];
  }
  $r++;
  $s = $s + $right;
  $q = mysqli_query($con, "UPDATE `history` SET `Score`=$s,`Level`=$sn,`TRight`=$r, date= NOW()  WHERE  UserEmail = '$email' AND QuizID = '$quizID'") or die('Error124');
} else {
  $q = mysqli_query($con, "SELECT * FROM quiz WHERE QuizID='$quizID' ") or die('Error129');
  while ($row = mysqli_fetch_array($q)) {
    $wrong = $row['Wrong'];
  }
  if ($sn == 1) {
    $q = mysqli_query($con, "INSERT INTO history VALUES(NULL,'$email','$quizID' ,'0','0','0','0',NOW() )") or die('Error137');
  }
  $q = mysqli_query($con, "SELECT * FROM history WHERE QuizID='$quizID' AND UserEmail='$email' ") or die('Error139');
  while ($row = mysqli_fetch_array($q)) {
    $s = $row['Score'];
    $w = $row['TWrong'];
  }
  $w++;
  $s = $s - $wrong;
  $q = mysqli_query($con, "UPDATE `history` SET `Score`=$s,`Level`=$sn,`TWrong`=$w, date=NOW() WHERE  UserEmail = '$email' AND QuizID = '$quizID'") or die('Error147');
}
if ($sn != $total) {
  $sn++;
  header("location:Home.php?q=quiz&step=2&quizID=$quizID&n=$sn&t=$total&SectionID= ' . $SectionID . '") or die('Error152');
}
// else if ($_SESSION['key'] != 'sunny7785068889') {
//   $q = mysqli_query($con, "SELECT Score FROM history WHERE QuizID='$quizID' AND UserEmail='$email'") or die('Error156');
//   while ($row = mysqli_fetch_array($q)) {
//     $s = $row['Score'];
//   }
//   $q = mysqli_query($con, "SELECT * FROM rank WHERE UserEmail='$email'") or die('Error161');
//   $rowcount = mysqli_num_rows($q);
//   if ($rowcount == 0) {
//     $q2 = mysqli_query($con, "INSERT INTO rank VALUES(Null,'$email','$s',NOW(),'$quizID')") or die('Error165');
//   } else {
//     while ($row = mysqli_fetch_array($q)) {
//       $sum = $row['Score'];
//     }
//     $sum = $s + $sum;
//     $q = mysqli_query($con, "UPDATE `rank` SET   Score='$sum ',Date=NOW() WHERE UserEmail= '$email' and QuizID='$quizID'") or die('Error174');
//   }
//   header("location:Home.php?q=result&quizID=$quizID&SectionID= ' . $SectionID . '");
// } 
else {
  header("location:Home.php?q=result&quizID=$quizID&SectionID= ' . $SectionID . '");
}
// }

//restart quiz
// if (@$_GET['q'] == 'quizre' && @$_GET['step'] == 25) {
//   $quizID = @$_GET['quizID'];
//   $n = @$_GET['n'];
//   $t = @$_GET['t'];
//   $q = mysqli_query($con, "SELECT score FROM history WHERE quizID='$quizID' AND email='$email'") or die('Error156');
//   while ($row = mysqli_fetch_array($q)) {
//     $s = $row['score'];
//   }
//   $q = mysqli_query($con, "DELETE FROM `history` WHERE quizID='$quizID' AND email='$email' ") or die('Error184');
//   $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error161');
//   while ($row = mysqli_fetch_array($q)) {
//     $sun = $row['score'];
//   }
//   $sun = $sun - $s;
//   $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die('Error174');
//   header("location:StudentHome.php?q=quiz&step=2&quizID=$quizID&n=1&t=$t");
// }
