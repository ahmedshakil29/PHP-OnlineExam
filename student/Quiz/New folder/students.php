<?php
if (isset($_GET['error'])) {
  echo "<script>alert('Can not delete student.')</script>";
}
$SectionID = $_GET["SectionID"];

?>
<html>

<head>
  <title>Section Student</title>
  <link rel="stylesheet" href="../../css.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <!-- <style>
    .table-responsive {
    max-height: 700px;
}
  </style> -->
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
                <a class="nav-link btn btn-info mb-2" href="Home.php?SectionID=<?php echo ($SectionID) ?> ">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info mb-2" href="#">
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
        <div class="container-fluid container-responsive">
          <?php echo "
           <a href='#' class='btn btn-outline-info mb-2'> Your Section Student List</a>";
          ?>
          <div class="table-responsive">
            <table class="table  table-sm table-hover table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Section</th>
                  <th scope="col">Student ID</th>
                  <th scope="col">Student Name</th>
                  <th scope="col">Student Email</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once('../../index_model.php');
                $indObj = new IndexModel();
                $rs = $indObj->getStudentsBySectionsByTeacher($_GET['SectionID']);
                while ($d = mysqli_fetch_assoc($rs)) {
                  echo $str = "<tr><td>" . $d["SectionName"] . "</td><td>" . $d["UserID"] . "</td><td>" . $d["UserName"] . "</td><td>" . $d["UserEmail"] . "</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
      <!--end  2nd row -->
    </div>
  </div>

</body>

</html>