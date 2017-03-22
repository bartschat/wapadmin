<?php
session_start();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";


require ("./config.php");
function standard ($target)
{
require ("./config.php");
echo "<wml>"
."<card id=\"traceroute\" title=\"$hostname - traceroute $target\"> "
."<p>"
."<b>traceroute</b>"
."</p>"
."<p>"
."<input name=\"ptarget\" size=\"30\"/>"
."</p>"
."<p>"
."<anchor>"
."traceroute!"
."<go href=\"./traceroute.php\" method=\"post\">"
."<postfield name=\"target\" value=\"\$(ptarget)\"/>"
."</go>"
."</anchor>"
."</p>"
."<p>"
."<do type=\"prev\" label=\"back\"><prev/></do>"
."<do type=\"refresh\" label=\"reload\">"
."<refresh/></do>"
."</p>"
."</card>"
."</wml>";
}



if ($_SESSION['auth']=="1")
	{
		if ($target != "")
	{
	require ("./config.php");
	$result=`$traceroute $target`;
	echo "<wml>";
	echo ""
	."<card id=\"result\" title=\"traceroute $target\">"
	."<p>"
	."$result"
	."</p>"
	."<p>"
	."<a href=\"./portal.php\">menu</a><br/>"
	."</p>"
	."</card>";
	echo "</wml>";
	}
		else
	{
		standard ($target);
	}
}
else
{
        echo "<wml>";
        echo "<card id=\"traceroute\" title=\"$hostname - traceroute\">"
        ."<p>"
        ."<a href=\"./login.php\">Error - try again!</a>"
        ."</p>"
        ."</card>";
        echo "</wml>";
}



?>
