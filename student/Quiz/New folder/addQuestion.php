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
    <!-- <style>
    .table-responsive {
    max-height: 700px;
}
  </style> -->
</head>

<body>
    <?php
    $SectionID = $_GET["eid"];
    echo "$SectionID"; ?>
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
                    // require_once('sidebar.php');
                    // $teacherLayout = new TeacherLayout();
                    // $teacherLayout->Sidebar();
                    ?>
                </nav>
            </div>
            <!-- col 2 -->
            <div class="col-10 bg-transparent">
                <div class="container-fluid container-responsive">
                    <?php
                    $SectionID = $_GET["eid"];
                    echo "$SectionID";
                    if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
                        echo ' 
                    <div class="row"><span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form class="form-horizontal title1" name="form" action="insert_Question.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 " method="POST">
                                <fieldset>
                                    ';
                        for ($i = 1; $i <= @$_GET['n']; $i++) {
                            echo '
                    <b>Question number&nbsp;' . $i . '&nbsp;:</><br/>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
                        <div class="col-md-12">
                        <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>  
                    </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="' . $i . '1"></label>  
                        <div class="col-md-12">
                        <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
                    </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-12 control-label" for="' . $i . '2"></label>  
                    <div class="col-md-12">
                        <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
                    </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-12 control-label" for="' . $i . '3"></label>  
                    <div class="col-md-12">
                        <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text"> 
                    </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-12 control-label" for="' . $i . '4"></label>  
                    <div class="col-md-12">
                        <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
                    </div>
                    </div>
                    <br/>
                    <b>Correct answer</b>:<br />
                    <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
                        <option value="a">Select answer for question ' . $i . '</option>
                        <option value="a">option a</option>
                        <option value="b">option b</option>
                        <option value="c">option c</option>
                        <option value="d">option d</option> </select><br /><br />';
                        }
                        echo '
                <div class="form-group">
                <label class="col-md-12 control-label" for=""></label>
                <div class="col-md-12"> 
                <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
            </div>
            </div>
                </fieldset>
                </form>
                </div>';
                    } ?>
                </div>
            </div>
        </div>
        <!--end  2nd row -->
    </div>
    </div>

</body>

</html>