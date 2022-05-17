<?php
if (isset($_GET['error'])) {
    echo "<script>alert('Can not delete course.')</script>";
}
include_once 'db.php';
$SectionID = $_GET["SectionID"];
// $QuizID = $_GET["eid"];

session_start();
?>
<html>

<head>
    <title>Feedback</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"> </script>


    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="css/bootstrap-theme.min.css" /> -->
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <!-- <link rel="stylesheet" href="css/font.css"> -->
    <!-- <script src="js/jquery.js" type="text/javascript"></script> -->

    <!-- <script src="js/bootstrap.min.js" type="text/javascript"></script> -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> -->

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

    <!-- <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet"> -->
    <link href="/open-iconic/font/css/open-iconic.css" rel="stylesheet">


</head>

<body style="background:#eee;">
    <div class="container mt-2">
        <div class="row">
            <!-- first row -->
            <div class="col-12 mb-2 bg-light">
                <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
                    <a class="btn btn-warning ml-2" href="../../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
                        Logout
                    </a>
                </nav>
            </div>
            <!-- end first row -->
            <!-- 2nd row -->
            <!-- col 1 -->
            <div class="col-2 bg-light border">
                <nav class=" d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2 mt-2" href="../../teacher.php"><i class="fa fa-home" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="Home.php?SectionID=<?php echo ($SectionID) ?>">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="student.php?SectionID=<?php echo ($SectionID) ?>">
                                    Student
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="2addQuiz.php?SectionID=<?php echo ($SectionID) ?> ">
                                    Add Quiz
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="Feedback.php?SectionID=<?php echo ($SectionID) ?> ">
                                    Feedback
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="../../teacher.php">
                                    Main Page
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- col 2 -->
            <div class="col-10 bg-transparent">
                <div class="container-fluid">
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
                                        <td><b>Date</b></td>
                                        <td><b>By</b></td>
                                        <td></td><td></td>
                                    </tr>';
                            $c = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $date = $row['date'];
                                // $date = date("d-m-Y", strtotime($date));
                                // $time = $row['time'];
                                $SectionID = $row['SectionID'];
                                $name = $row['feedback'];
                                // $email = $row['email'];
                                $id = $row['feedbackID'];
                                echo '<tr><td>' . $c++ . '</td>';
                                echo
                                // '<td><a title="Click to open feedback" href="dash.php?q=3&fid=' . $id . '">' . $subject . '</a></td>
                                // '<td>' . $email . '</td>
                                // <td>' . $date . '</td>

                                '
                            <td><a title="Click to open feedback" href="feedback.php?SectionID=' . $SectionID . '&q=3&fid=' . $id . '">' . $name . '</a></td>
                            <td>' . $date . '</td>
                        	<td><a title="Open Feedback" href="Feedback.php?q=3&fid=' . $id . '"><b><span class="oi oi-folder" title="folder aria-hidden="true"></span></b></a></td>';
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
                            $result = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackID='$id' ") or die('Error');
                            while ($row = mysqli_fetch_array($result)) {
                                $subject = $row['feedback'];
                                $SectionID = $row['SectionID'];
                                $date = $row['date'];
                                $time = $row['date'];
                                $feedback = $row['feedback'];
                                $result2 = mysqli_query($con, "SELECT * FROM section WHERE SectionID='$SectionID' ") or die('Error');
                                while ($row = mysqli_fetch_array($result2)) {
                                    $SectionName = $row['SectionName'];
                                    $TeacherID = $row['TeacherID'];
                                }
                                echo
                                '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;">
            <span style="line-height:35px;padding:5px;">-&nbsp;
            <b>DATE:</b>&nbsp;' . $date . '</span>
            <b>DATE:</b>&nbsp;' . $TeacherID . '</span>
            <span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;' . $SectionName . '</span><br />' . $feedback . '</div></div>';
                            }
                        }
                        ?>
                        <!--Feedback reading portion closed-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<!-- <body style="background:#eee;"> -->