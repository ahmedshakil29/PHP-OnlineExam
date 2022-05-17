<?php
class StudentLayout
{

    public function StudentLayout()
    {
    }
    public function Sidebar()
    {
?>
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link btn btn-info mb-2 mt-2" href="../student.php"><i class="fa fa-home" aria-hidden="true"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-info mb-2" href="semesterToSections.php">
                        Exam
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-info mb-2" href="Profile.php">
                        Profile
                    </a>
                </li>
            </ul>
        </div>
<?php
    }
}
