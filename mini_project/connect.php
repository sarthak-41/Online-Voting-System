<?php
//Connecting the database
$servername="localhost";
$username='root'; //by-default it's root
$password='';
$db='voterdatabase';//Database created in previous file

//Creating conncection
$con=mysqli_connect($servername,$username,$password,$db);
//Check connection
if($con->connect_error)
{
    die("Connection failed:".$con->connect_error);
}
echo "Connected Successfully";
echo"<br>";
?>