<?php
$SectionID = $_GET["SectionID"];
?>
<html>

<head>
  <title>Add Quiz</title>
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
                <a class="nav-link btn btn-info mb-2" href="students.php?SectionID=<?php echo ($SectionID) ?>">
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
        <div class="container-fluid container-responsive">
          <div class="row"><span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form class="form-horizontal title1" name="form" action="insert_Quiz.php" method="POST">
                <fieldset>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="name"></label>
                    <div class="col-md-12">
                      <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="time"></label>
                    <div class="col-md-12">
                      <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="right"></label>
                    <div class="col-md-12">
                      <input type="" id="right" name="right" value="" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="tag"></label>
                    <div class="col-md-12">
                      <input id="tag" name="tag" placeholder="Enter #Password which is used for Opening" class="form-control input-md" type="text">
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="desc"></label>
                    <div class="col-md-12">
                      <!-- <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea> -->
                      <input type="hidden" id="desc" name="desc" value="Best of Luck" placeholder="Write description here..." class="form-control input-md">
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="total"></label>
                    <div class="col-md-12">
                      <input type="hidden" id="total" name="total" value="10" placeholder="Enter 10 number of questions" class="form-control input-md" type="number">
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="wrong"></label>
                    <div class="col-md-12">
                      <input type="hidden" id="wrong" name="wrong" value="0" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
                    </div>
                  </div>
                  <input type="hidden" name="SectionID" id="SectionID" value=<?php echo $_GET["SectionID"] ?>>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12">
                      <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary" />
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
            <!--add quiz end-->
          </div>
        </div>
      </div>
      <!--end  2nd row -->
    </div>
  </div>

</body>

</html>