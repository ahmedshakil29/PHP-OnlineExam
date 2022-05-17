<?php
if (isset($_GET['error'])) {
    echo "<script>alert('Can not delete course.')</script>";
}
include_once 'db.php';
$SectionID = $_GET["SectionID"];
session_start();
?>
<html>

<head>
    <title>Teacher Quiz Home</title>
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
                    <a class="btn btn-warning ml-2" href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
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
                                <a class="nav-link btn btn-info mb-2 mt-2" href="#"><i class="fa fa-home" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="#">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="students.php?SectionID=<?php echo ($SectionID) ?> ">
                                    Student
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="2addQuiz.php?SectionID=<?php echo ($SectionID) ?> ">
                                    Add Quiz
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="2addQuiz.php?SectionID=<?php echo ($SectionID) ?> ">
                                    Marking
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
                        <!-- home start  ok -->
                        <?php
                        $SectionID = $_GET["SectionID"];
                        if (@$_GET['q'] == 0) {
                            $result = mysqli_query($con, "SELECT * FROM quiz where `SectionID`= " . $SectionID . "  ORDER BY date DESC") or die('Error');
                            echo
                            '<div class="panel">
                            <div class="table-responsive">
                                <table class="table table-striped title1">
                                    <tr>
                                        <td><b>S.N.</b></td>
                                        <td><b>Topic</b></td>
                                        <td><b>Total question</b></td>
                                        <td><b>Marks</b></td>
                                        <td><b>Time limit</b></td>
                                        <td><b>Action</b></td>
                                        <td></td>
                                    </tr>';
                            $c = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $title = $row['QuizTitle'];
                                $total = $row['TotalQuestion'];
                                $right = $row['Right'];
                                $time = $row['Time'];
                                $quizID = $row['QuizID'];
                                // $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
                                // $rowcount = mysqli_num_rows($q12);
                                // if ($rowcount == 0) {
                                echo
                                '<tr>
                                        <td>' . $c++ . '</td>
                                        <td>' . $title . '</td>
                                        <td>' . $total . '</td>
                                        <td>' . $right * $total . '</td>
                                        <td>' . $time . '&nbsp;min</td>
                                        <td><b><a href="account.php?q=quiz&step=2&eid=' . $quizID . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Show</b></span></a></b></td>
                                        <td><b><a href="Ranking.php?q=quiz&step=2&eid=' . $quizID . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Marking</b></span></a></b></td>
                                        </tr>';
                                // } else {
                                // echo
                                // '<tr style="color:#99cc32">
                                // <td>' . $c++ . '</td>
                                // <td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                // <td>' . $total . '</td>
                                // <td>' . $sahi * $total . '</td>
                                // <td>' . $time . '&nbsp;min</td>
                                // <td><b><a href="account.php?q=1" class="pull-right btn sub1" style="margin:0px;background:yellow"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Done</b></span></a></b></td>
                                // </tr>';
                                // }
                            }
                            $c = 0;
                            echo '
                                </table>
                            </div>
                        </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>