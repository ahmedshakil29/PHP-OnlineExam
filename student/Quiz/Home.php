<?php
if (isset($_GET['error'])) {
    echo "<script>alert('Can not delete course.')</script>";
}
include_once 'db.php';
$SectionID = $_GET["SectionID"];
session_start();
$email = $_SESSION['email'];

?>
<html>

<head>
    <title>Student Quiz Home</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</head>

<body>
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
                                <a class="nav-link btn btn-info mb-2 mt-2" href="../../student.php"><i class="fa fa-home" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="#">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="studentQuizHistory.php?SectionID=<?php echo ($SectionID) ?> ">
                                    History
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="feedback.php?SectionID=<?php echo ($SectionID) ?>">
                                    Feedback
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="../../student.php">
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
                        <!--home start-->
                        <?php
                        // $SectionID = $_GET["SectionID"];
                        if (@$_GET['q'] == 1) {
                            $result = mysqli_query($con, "SELECT * FROM quiz where `SectionID`= " . $SectionID . " ORDER BY date DESC") or die('Error01 ');
                            echo
                            '<div class="panel">
                            <div class="table-responsive">
                                <table class="table table-striped title1">
                                    <tr>
                                        <td><b>S.N.</b></td>
                                        <td><b>Topic</b></td>
                                        <td><b>Total question</b></td>
                                        <td><b> Total Marks</b></td>
                                        <td><b> Your Marks</b></td>
                                        <td><b>Time limit</b></td>
                                        <td></td>
                                    </tr>';
                            $c = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $title = $row['QuizTitle'];
                                $total = $row['TotalQuestion'];
                                $right = $row['Right'];
                                $time = $row['Time'];
                                $quizID = $row['QuizID'];
                                $q12 = mysqli_query($con, "SELECT Score FROM history WHERE QuizID='$quizID' AND UserEmail='$email'") or die('Error98');
                                $rowcount = mysqli_num_rows($q12);
                                while ($row = mysqli_fetch_array($q12)) {
                                    $score = $row['Score'];
                                }
                                if ($rowcount == 0) {
                                    echo
                                    '<tr>
                                        <td>' . $c++ . '</td>
                                        <td>' . $title . '</td>
                                        <td>' . $total . '</td>
                                        <td>' . $right * $total . '</td>
                                        <td></td>
                                        <td>' . $time . '&nbsp;min</td>
                                        <td><b><a href="quizLogin.php?q=quiz&step=2&quizID=' . $quizID . '&n=1&t=' . $total . '&SectionID= ' . $SectionID . '" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td>
                                    </tr>';
                                } else {
                                    echo
                                    '<tr style="color:#99cc32">
                                        <td>' . $c++ . '</td>
                                        <td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td>' . $total . '</td>
                                        <td>' . $right * $total . '</td>
                                        <td> ' . $score . '</td>
                                        <td>' . $time . '&nbsp;min</td>
                                        <td><b><a href="#" class="pull-right btn sub1" style="margin:0px;background:yellow"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Done</b></span></a></b></td>
                                    </tr>';
                                }
                            }
                            $c = 0;
                            echo '
                                </table>
                            </div>
                        </div>';
                        } ?>
                        <!--quiz start-->
                        <?php
                        if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
                            $quizID = @$_GET['quizID'];
                            $sn = @$_GET['n'];
                            $total = @$_GET['t'];
                            $q = mysqli_query($con, "SELECT * FROM questions WHERE QuizID='$quizID' AND SerialNumber='$sn' ");
                            echo '<div class="panel" style="margin:5%">';
                            while ($row = mysqli_fetch_array($q)) {
                                $qns = $row['Question'];
                                $qid = $row['QuestionID'];
                                echo '<b>Question &nbsp;' . $sn . '&nbsp;::<br/>' . $qns . '</b> <br /><br />';
                            }
                            $q = mysqli_query($con, "SELECT * FROM options WHERE QuestionID= '$qid' ");
                            echo '<form action="update.php?q=quiz&step=2&quizID=' . $quizID . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '&SectionID= ' . $SectionID . '" method="POST"  class="form-horizontal"><br />';
                            while ($row = mysqli_fetch_array($q)) {
                                $option = $row['Option'];
                                $optionid = $row['OptionID'];
                                echo '<input type="radio" name="ans" value="' . $optionid . '">' . $option . '<br /><br />';
                            }
                            echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form>
                        </div>';
                        }
                        //result display
                        if (@$_GET['q'] == 'result' && @$_GET['quizID']) {
                            $quizID = @$_GET['quizID'];
                            $q = mysqli_query($con, "SELECT * FROM history WHERE QuizID='$quizID' AND UserEmail='$email' ") or die('Error157');
                            echo '
                        <div class="panel">
                            <center>
                                <h1 class="title" style="color:#660033">Result</h1>
                                <center><br />
                                    <table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
                            while ($row = mysqli_fetch_array($q)) {
                                $s = $row['Score'];
                                $w = $row['TWrong'];
                                $r = $row['TRight'];
                                $qa = $row['Level'];
                                echo '
                                        <tr style="color:#66CCFF">
                                            <td>Total Questions</td>
                                            <td>' . $qa . '</td>
                                        </tr>
                                        <tr style="color:#99cc32">
                                            <td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td>
                                            <td>' . $r . '</td>
                                        </tr>
                                        <tr style="color:red">
                                            <td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td>
                                            <td>' . $w . '</td>
                                        </tr>
                                        <tr style="color:#66CCFF">
                                            <td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
                                            <td>' . $s . '</td>
                                        </tr>';
                            }
                            // $q = mysqli_query($con, "SELECT * FROM rank WHERE UserEmail='$email' ") or die('Error157');
                            // while ($row = mysqli_fetch_array($q)) {
                            //     $s = $row['Score'];
                            //     echo '<tr style="color:#990000">
                            //                 <td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td>
                            //                 <td>' . $s . '</td>
                            //             </tr>';
                            // }
                            echo '
                                    </table>
                        </div>';
                        }
                        ?>
                        <!--quiz end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>