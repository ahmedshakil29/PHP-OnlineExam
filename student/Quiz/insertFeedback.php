<?php
require_once('../../index_model.php');
session_start();
$StudentID = $_SESSION["UserID"];
$SectionID = $_POST["SectionID"];
$Feedback = $_POST['feedback'];
$s = "2";


$indObj = new IndexModel();
$rs = $indObj->insert_feedback($StudentID, $Feedback, $SectionID, $s);
if ($rs == 1) {
    $_SESSION['success_message'] = "Contact form saved successfully.";
    header("location:feedback.php?a=1&SectionID=$SectionID");
} else {
    header("location:feedback.php?a=2&SectionID=$SectionID");
}
