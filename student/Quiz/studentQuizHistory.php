<?php
if (isset($_GET['error'])) {
    echo "<script>alert('Can not delete course.')</script>";
}
include_once 'db.php';
$SectionID = $_GET["SectionID"];
// $QuizID = $_GET["eid"];

session_start();
$email = $_SESSION["email"];

?>
<html>

<head>
    <title>Student Exam History</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
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
                                <a class="nav-link btn btn-info mb-2 mt-2" href="#"><i class="fa fa-home" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="Home.php?q=1&SectionID=<?php echo ($SectionID) ?>">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-info mb-2" href="#">
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
                        <!-- home start  ok -->
                        <?php
                        //  if (@$_GET['q'] == 2) {
                        $q = mysqli_query($con, "SELECT * FROM history where UserEmail= '$email'  ORDER BY Score DESC ") or die('Error223');
                        echo
                        '<div class="panel title">
                    <div class="table-responsive">
                        <table class="table table-striped title1">
                            <tr style="color:red">
                                <td><b>SN</b></td>
                                <td><b>Quiz Title</b></td>
                                <td><b>Total Question</b></td>
                                <td><b>Right Mark</b></td>
                                <td><b>Wrong Mark</b></td>
                                <td><b>Total Right</b></td>
                                <td><b>Total Wrong</b></td>
                                <td><b> Total Score</b></td>
                                <td><b> Submitted Date</b></td>
                            </tr>';
                        $c = 0;
                        while ($row = mysqli_fetch_array($q)) {
                            $quizID = $row['QuizID'];
                            $e = $row['UserEmail'];
                            $r = $row['TRight'];
                            $w = $row['TWrong'];
                            $s = $row['Score'];
                            $date = $row['Date'];
                            $q11 = mysqli_query($con, "SELECT * FROM quiz WHERE QuizID='$quizID' ") or die('Error231');
                            while ($row = mysqli_fetch_array($q11)) {
                                $quizTitle = $row['QuizTitle'];
                                $rightMark = $row['Right'];
                                $wrongMark = $row['Wrong'];
                                $totalQuestion = $row['TotalQuestion'];
                            }
                            $q12 = mysqli_query($con, "SELECT * FROM users WHERE UserEmail='$e' ") or die('Error231');
                            while ($row = mysqli_fetch_array($q12)) {
                                $name = $row['UserName'];
                            }
                            $c++;
                            echo
                            '<tr>
                                <td style="color:#99cc32"><b>' . $c . '</b></td>
                                <td>' . $quizTitle . '</td>
                                <td>' . $totalQuestion . '</td>
                                <td>' . $rightMark . '</td>
                                <td>' . $wrongMark . '</td>
                                <td>' . $r . '</td>
                                <td>' . $w . '</td>
                                <td>' . $s . '</td>
                                <td>' . $date . '</td>
                            <tr>';
                        }
                        echo '
                        </table>
                    </div>
                </div>';
                        // }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<!-- <body style="background:#eee;"> -->