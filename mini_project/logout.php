<?php
session_start();

session_unset();
session_destroy();
header('Location: login.html');
exit();
if (session_destroy()==true)
header('Location: t.html');
?>