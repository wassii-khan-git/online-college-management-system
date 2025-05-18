<?php

// include("admin/admin-login.php");


if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){

    echo
    '


<div class="dlabnav">
 <div class="dlabnav-scroll">
     <ul class="metismenu" id="menu">
         <li class="nav-label first">Main Menu</li>
         <li><a class="nav-link" href="admin-dashboard.php" aria-expanded="false">
                 <i class="la la-home"></i>
                 <span class="nav-text">Dashboard</span>
             </a>
         </li>
         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                 <i class="la la-user"></i>
                 <span class="nav-text">Professors</span>
             </a>
             <ul aria-expanded="false">
                 <li><a href="all-professors.php">All Professor</a></li>
                 <li><a href="add-professor.php">Add Professor</a></li>
             </ul>
         </li>
         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                 <i class="la la-users"></i>
                 <span class="nav-text">Students</span>
             </a>
             <ul aria-expanded="false">
                 <li><a href="all-students.php">All Students</a></li>
                 <li><a href="add-student.php">Add Students</a></li>
             </ul>
         </li>
         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                 <i class="la la-graduation-cap"></i>
                 <span class="nav-text">Courses</span>
             </a>
             <ul aria-expanded="false">
                 <li><a href="all-courses.php">All Courses</a></li>
                 <li><a href="add-courses.php">Add Courses</a></li>
             </ul>
         </li>
         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                 <i class="la la-book"></i>
                 <span class="nav-text">Library</span>
             </a>
             <ul aria-expanded="false">
                 <li><a href="all-library.php">All Books</a></li>
                 <li><a href="add-library.php">Add Book</a></li>
             </ul>
         </li>
         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                 <i class="la la-check-circle "></i>
                 <span class="nav-text">Attendance</span>
             </a>
             <ul aria-expanded="false"> 
                 <li><a href="all-grade.php">All Attendance</a></li>
             </ul>
         </li>
         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                 <i class="la la-comment "></i>
                 <span class="nav-text">Messages</span>
             </a>
             <ul aria-expanded="false"> 
                 <li><a href="all-messages.php">All Messages</a></li>
             </ul>
         </li>

         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                 <i class="fa fa-bullhorn"></i>
                 <span class="nav-text">Annoucements</span>
             </a>
             <ul aria-expanded="false"> 
                 <li><a href="all-annoucements.php">All Annoucements</a></li>
                 <li><a href="add-annoucement.php">Add Annoucement</a></li>
             </ul>
         </li>

         

         <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                 <i class="la la-dollar"></i>
                 <span class="nav-text">Fees</span>
             </a>
             <ul aria-expanded="false">
                 <li><a href="fees-collection.php">Fees Collection</a></li>
                 <li><a href="add-fees.php">Add Fees</a></li>
             </ul>
         </li>
         <li class="nav-label"></li>
         <li>
             <a class="text-center" href="javascript:void()" aria-expanded="false">
                 <span class="nav-text">Version 1.0.0</span>
             </a>
         </li>
         <li>
             <a class="text-center" href="javascript:void()" aria-expanded="false">
                 <span class="nav-text">About</span>
             </a>
         </li>
         <li>
             <a class="text-center" href="javascript:void()" aria-expanded="false">
                 <span class="nav-text">Wassiikhan@gmail.com</span>
             </a>
         </li>
     </ul>
 </div>
</div>
<!--**********************************
         Sidebar end
***********************************

    ';
}else {
    echo 
    '
    <!--**********************************
    Teacher Sidebar start
***********************************-->
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="nav-link" href="teacher_dashboard.php" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Home</span>
                </a>
            </li>
            <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Professors</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-professors.php">All Professor</a></li>
                </ul>
            </li> -->
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Students</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-students-teacher.php">All Students</a></li>
                    <li><a href="add-student.php">Add Students</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Courses</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-courses-teacher.php">All Courses</a></li>
                    <li><a href="add-courses.php">Add Courses</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-check-circle "></i>
                    <span class="nav-text">Attendance</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-grade.php">All Grades</a></li>
                </ul>
            </li>
            <li class="nav-label"></li>
            <li>
                <a class="text-center" href="javascript:void()" aria-expanded="false">
                    <span class="nav-text">Version 1.0.0</span>
                </a>
            </li>
            <li>
                <a class="text-center" href="javascript:void()" aria-expanded="false">
                    <span class="nav-text">About</span>
                </a>
            </li>
            <li>
                <a class="text-center" href="javascript:void()" aria-expanded="false">
                    <span class="nav-text">Wassiikhan@gmail.com</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!--**********************************
            Sidebar end
***********************************-->
    ';
} 
?>



<!--  -->