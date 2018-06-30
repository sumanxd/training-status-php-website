<?php
session_start();
unset($_SESSION['username']);
session_destroy();

header("Location: index.php");
exit;
?>


/*
session_start();
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
header("Location: login.php");
}
?>*/