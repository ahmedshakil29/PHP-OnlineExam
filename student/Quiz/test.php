<?php
include_once 'db.php';
session_start();
$email = $_SESSION['email'];
//quiz start
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {

  while ($row = mysqli_fetch_array($q)) {
  }
  if ($ans == $ansid) {
    while ($row = mysqli_fetch_array($q)) {
    }
    if ($sn == 1) {
    }

    while ($row = mysqli_fetch_array($q)) {
    }
  } else {

    }
    if ($sn == 1) {
    }
    while ($row = mysqli_fetch_array($q)) {
     
    }
  }
  if ($sn != $total) {
  } else if ($_SESSION['key'] != 'teacher') {
    while ($row = mysqli_fetch_array($q)) {
    }
    } else {
      while ($row = mysqli_fetch_array($q)) {
      }
    }
    header("location:Home.php?q=result&eid=$eid");
  } else {
    header("location:Home.php?q=result&eid=$eid");
  }
}

//restart quiz
if (@$_GET['q'] == 'quizre' && @$_GET['step'] == 25) {
  $eid = @$_GET['eid'];
  $n = @$_GET['n'];
  $t = @$_GET['t'];
  $q = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error156');
  while ($row = mysqli_fetch_array($q)) {
    $s = $row['score'];
  }
  $q = mysqli_query($con, "DELETE FROM `history` WHERE eid='$eid' AND email='$email' ") or die('Error184');
  $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error161');
  while ($row = mysqli_fetch_array($q)) {
    $sun = $row['score'];
  }
  $sun = $sun - $s;
  $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die('Error174');
  header("location:StudentHome.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
}
