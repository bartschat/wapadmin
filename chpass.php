<?php
session_start();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";

function change ($password,$newpassword,$newpassword2)
{
	require ("./config.php");
	if ($_SESSION['pass'] != md5($password))
	{
        	echo "<wml>";
	        echo "<card id=\"chpass\" title=\"$hostname - chpass\">";
		echo "<p>old password incorrect!<br/>"
		."<a href=\"./chpass.php\">try again!</a></p>";
		echo "</card></wml>";
	}
	elseif ($newpassword != $newpassword2)
	{
        	echo "<wml>";
	        echo "<card id=\"chpass\" title=\"$hostname - chpass\">";
		echo "<p>new passwords not identical!<br/>"
		."<a href=\"./chpass.php\">try again!</a></p>";
		echo "</card></wml>";
	}
	else
	{
		require ("./db.inc.php");
		$name=$_SESSION['name'];
		$newpassword=md5($newpassword);
		$link = dbconnect ();
		$query = ("UPDATE user SET pass=\"$newpassword\" where user=\"$name\"");
		$resource = mysql_query ($query, $link);
        	echo "<wml>";
	        echo "<card id=\"chpass\" title=\"$hostname - chpass\">";
		echo "<p>"
		."password changed!"
		."</p>"
		."<p><a href=\"./portal.php\">menu</a></p>"
		."</card></wml>";
	}
}
function input ()
{
	require ("./config.php");
        echo "<wml>";
        echo "<card id=\"chpass\" title=\"$hostname - chpass\">"
        ."<p>"
	."old pass: <input name=\"password\" size=\"10\" type=\"password\"/><br/>"
	."new pass: <input name=\"newpassword\" size=\"10\" type=\"password\"/><br/>"
	."retype: <input name=\"newpassword2\" size=\"10\" type=\"password\"/><br/>"
        ."</p>"
	."<p>"
	."<do type=\"accept\" label=\"change!\">"
	."<go href=\"./chpass.php\" method=\"post\">"
	."<postfield name=\"func\" value=\"change\"/>"
	."<postfield name=\"name\" value=\"$(name)\"/>"
	."<postfield name=\"password\" value=\"$(password)\"/>"
	."<postfield name=\"newpassword\" value=\"$(newpassword)\"/>"
	."<postfield name=\"newpassword2\" value=\"$(newpassword2)\"/>"
	."</go>"
	."</do>"
	."</p>"
	."<p><a href=\"./portal.php\">menu</a></p>"
        ."</card>";
        echo "</wml>";
}



if ($_SESSION['auth']=="1")
{
	switch ($func)
	{
		default: input ();break;
		case "change": change($password,$newpassword,$newpassword2);break;
	}
}
else
{
        echo "<wml>";
        echo "<card id=\"chpass\" title=\"$hostname - chpass\">"
        ."<p>"
        ."<a href=\"./login.php\">Error - try again!</a>"
        ."</p>"
        ."</card>";
        echo "</wml>";
}



?>
