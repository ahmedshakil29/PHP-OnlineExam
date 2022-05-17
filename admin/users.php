<?php
if (isset($_GET['error'])) {
  echo "<script>alert('Can not delete user.')</script>";
}
?>
<html>

<head>
  <title>Users</title>
  <link rel="stylesheet" href="css.css">
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
          <?php
          require_once('sidebar.php');
          $adminLayout = new AdminLayout();
          $adminLayout->Sidebar();
          ?>
        </nav>
      </div>

      <!-- col 2 -->
      <div class="col-10 bg-transparent">
        <div class="container-fluid container-responsive">

          <a href="new_user.php" class="btn btn-outline-info mb-2"> Add to New User</a>
          <div class="table-responsive">
            <table class="table  table-sm table-hover table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Status</th>
                  <th scope="col">User Type</th>
                  <th scope="col">Department</th>
                  <th scope="col"> Action Button </th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once('../index_model.php');
                $indObj = new IndexModel();
                $rs = $indObj->getAllUsersInfo();
                while ($d = mysqli_fetch_assoc($rs)) {
                  echo $str = "<tr><td>" . $d["UserName"] . "</td><td>" . $d["UserEmail"] . "</td>";
                  if ($d["Status"] == 1) {
                    echo $str = " <td>Active</td>";
                  } else {
                    echo $str = " <td>Deactivated</td>";
                  }
                  echo  $str = "<td>" . $d["UserTypeTitle"] . "</td> <td>" . $d["DepartmentName"] . "</td><td>
                      <a href='edit_user.php?UserID=" . $d["UserID"] . "' class='btn btn-outline-dark'>Edit</a> 
                      <a href='delete_user.php?UserID=" . $d["UserID"] . "' class='btn btn-outline-danger'>Delete</a>
                      <a href='reset_password.php?UserID=" . $d["UserID"] . "' class='btn btn-outline-danger'>Reset </a>

                      </td></tr>";
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