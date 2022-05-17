<?php
if (isset($_GET['error'])) {
  echo "<script>alert('Can not delete .')</script>";
}
include_once 'db.php';
$SectionID = $_GET["SectionID"];
session_start();
$email = $_SESSION["email"];

?>
<html>

<head>
  <title>Student feedback</title>
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <!--alert message-->
  <?php
  if (@$_GET['a'] == 1) {
    echo '<script>alert("Feedback submitted successfully");</script>';
  } elseif (@$_GET['a'] == 2) {
    echo '<script>alert("Feedback not submitted ");</script>';
  }
  ?>
  <!--alert message end-->

  <!--alert message end-->
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
                <a class="nav-link btn btn-info mb-2" href="studentQuizHistory.php?SectionID=<?php echo ($SectionID) ?>">
                  History
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="#">
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
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8 panel" style="background-image:url(image/bg1.jpg); min-height:430px;">
                <h2 align="center" style="font-family:'typo'; color:#000066">FEEDBACK </h2>
                <p> submit your feedback by filling the entries below:-</p>
                <form role="form" method="post" action="insertFeedback.php?">
                  <div class="form-group">
                    <textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..." required></textarea>
                    <input type="hidden" name="SectionID" id="SectionID" value=<?php echo $_GET["SectionID"] ?>>
                  </div>
                  <div class="form-group" align="center">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                  </div>
                </form>
                <?php if (count($_POST) > 0) echo "Form Submitted!"; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


<!-- <body style="background:#eee;"> -->