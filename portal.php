<?php
session_start();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";




function portal ()
{
	require ("./config.php");
	echo "<wml>"
	."<card id=\"start\" title=\"$hostname\">"
	."<p>"
	."<b>$hostname - main menu</b>"
	."</p>"
	."<p align=\"left\">"
	."<a href=\"./status.php\">server stats</a><br/>"
	//."<a href=\"./todo.php\">todo list</a><br/>"
	."<a href=\"./explore.php\">explore network</a><br/>"
	."<a href=\"./chpass.php\">change password</a><br/>"
	.""
	."</p>"
	."<p>"
	."<a href=\"./logout.php\">logout</a>"
	."</p>"
	."<p>"
	."<do type=\"refresh\" label=\"reload\">"
	."<refresh/></do>"
	."</p>"
	."</card> "
	."</wml>";
}

if ($_SESSION['auth']=="1")
{
	portal();
}
else
{
	require ("./config.php");
        echo "<wml>";
        echo "<card id=\"start\" title=\"$hostname - start\">"
        ."<p>"
        ."<a href=\"./login.php\">Error - try again!</a>"
        ."</p>"
        ."</card>";
        echo "</wml>";
}


?>

