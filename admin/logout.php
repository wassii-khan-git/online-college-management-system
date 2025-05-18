<?php

session_start();

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true)
{
    unset($_SESSION['logged']);
    header("Location: ../index.php");
    // header("Location: ../admin-login-page.php");
    
}
elseif(isset($_SESSION['teacher_logged']) && $_SESSION['teacher_logged'] === true)
{
    unset($_SESSION['teacher_logged']);
    header("Location: ../index.php");

    // header("Location: ../teacher-login-page.php");
} else {
    header("Location: ..index.php");
}
// if(isset($_SESSION['student_logged']) && $_SESSION['student_logged'] === true)
// {

//     unset($_SESSION['student_logged']);
//     header("Location: ../user-login-page.php");
// }





// session_destroy();
// header("Location: ../page-login.php");
