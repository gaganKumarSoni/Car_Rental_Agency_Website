<?php session_start();
if(isset($_SESSION['usertype'])){
    unset($_SESSION['username']);
    unset($_SESSION['useremail']);
    unset($_SESSION['usertype']);

    session_unset();
    session_destroy();
    
    header('Location: index.php');
    exit;
}
else
    header("Location: index.php");
?>