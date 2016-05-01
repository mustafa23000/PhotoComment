<?php
include('connection.php');
session_start();
$user_check=$_SESSION['username'];

$ses_sql = mysqli_query($db,"SELECT username, admin FROM users WHERE username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['username'];
if($row['admin']==1){
    $adminuser = true;
}

if(!isset($user_check))
{
header("Location: index.php");
}

if(isset($_SESSION[timein]))
{
    $timeout = time()-$_SESSION['timein'];

    if($timeout >= 60)
    {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    else
    {
        $_SESSION['timein'] = time();
    }
}
else
{
    $_SESSION['timein'] = time();
}

?>