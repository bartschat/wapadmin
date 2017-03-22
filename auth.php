<?php
session_start ();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";



function auth ($name,$pass)
{
require ("./config.php");

$_SESSION['name']=$name;
$_SESSION['pass']=md5($pass);


/** DB stuff **/

if ($link=mysql_connect ("$dbhost","$dbuser","$dbpass"))
{
	$select=mysql_select_db("$dbname",$link);
	$query = "SELECT pass from user where user = \"$name\"";
	$resource = mysql_query ($query, $link);
	$cpass = mysql_fetch_array($resource);
}
else die ("<wml><card id=\"error\" title=\"mysql error\"><p>error - could not connect to db</p></card></wml>");

/*************/

if ($_SESSION['pass'] == $cpass[0])
{
	$_SESSION['auth']="1";
	echo "<wml>";
	echo "<card id=\"auth\" title=\"$hostname - auth\">"
	."<p>"
	."You are now logged in!<br/>"
	."<a href=\"./portal.php\">continue...</a>"
	."</p>"
	."</card>";
	echo "</wml>";
}

else
{
	echo "<wml>";
	echo "<card id=\"auth\" title=\"$hostname - auth\">"
	."<p>"
	."<a href=\"./login.php\">Error - try again!</a>"
	."</p>"
	."</card>";
	echo "</wml>";
}
}

$name=$_POST['name'];
$pass=$_POST['password'];
auth ($name,$pass);
?>
