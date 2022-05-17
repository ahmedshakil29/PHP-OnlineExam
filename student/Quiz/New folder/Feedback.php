<?php
session_start();
require_once('AdminLayout.php');
include_once '../dbConnection.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php
    $AdminNavbar = new AdminNavbar();
    $AdminNavbar->HeadLayout();
    ?>
</head>

<body style="background:#eee;">
    <!--upper side menu-->
    <?php
    $AdminNavbar = new AdminNavbar();
    $AdminNavbar->UpperSideLayout();
    ?>
    <!--navigation menu-->
    <?php
    $AdminNavbar = new AdminNavbar();
    $AdminNavbar->NavigationLayout();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--feedback start-->
                <?php if (@$_GET['q'] == 3) {
                    $result = mysqli_query($con, "SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
                    echo '
                        <div class="panel">
                            <div class="table-responsive">
                                <table class="table table-striped title1">
                                    <tr>
                                        <td><b>S.N.</b></td>
                                        <td><b>Subject</b></td>
                                        <td><b>Email</b></td>
                                        <td><b>Date</b></td>
                                        <td><b>Time</b></td>
                                        <td><b>By</b></td>
                                        <td></td><td></td>
                                    </tr>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $date = $row['date'];
                        $date = date("d-m-Y", strtotime($date));
                        $time = $row['time'];
                        $subject = $row['subject'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $id = $row['id'];
                        echo '<tr><td>' . $c++ . '</td>';
                        echo
                        '<td><a title="Click to open feedback" href="dash.php?q=3&fid=' . $id . '">' . $subject . '</a></td>
                            <td>' . $email . '</td>
                            <td>' . $date . '</td>
                            <td>' . $time . '</td>
                            <td>' . $name . '</td>
                        	<td><a title="Open Feedback" href="Feedback.php?q=3&fid=' . $id . '"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
                        echo '<td><a title="Delete Feedback" href="update.php?fdid=' . $id . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>
	                </tr>';
                    }
                    echo '</table></div></div>';
                }
                ?>
                <!--feedback closed-->
                <!--feedback reading portion start-->
                <?php if (@$_GET['fid']) {
                    echo '<br />';
                    $id = @$_GET['fid'];
                    $result = mysqli_query($con, "SELECT * FROM feedback WHERE id='$id' ") or die('Error');
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['name'];
                        $subject = $row['subject'];
                        $date = $row['date'];
                        $date = date("d-m-Y", strtotime($date));
                        $time = $row['time'];
                        $feedback = $row['feedback'];
                        echo
                        '<div class="panel"
              <a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a>
              <h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>' . $subject . '</b></h1>';
                        echo
                        '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;">
            <span style="line-height:35px;padding:5px;">-&nbsp;
            <b>DATE:</b>&nbsp;' . $date . '</span>
            <span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;' . $time . '</span>
            <span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;' . $name . '</span><br />' . $feedback . '</div></div>';
                    }
                }
                ?>
                <!--Feedback reading portion closed-->
            </div>
        </div>
</body>

</html>