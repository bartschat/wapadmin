<?php
session_start ();
header ("Cache-control: private");
header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";

require './functions.php';


function ping ($target)
{
	require ("./config.php");
	{$result=`$ping $target`;}
	echo "<wml>";
	echo ""
	."<card id=\"result\" title=\"ping $target\">"
	."<p>"
	."$result"
	."</p>"
	."<p>"
	."<a href=\"./portal.php\">menu</a>"
	."</p>"
	."</card>";
	echo "</wml>";
}

function tselect ($target)
{
	require ("./config.php");
	echo "<wml>"
	."<card id=\"ping\" title=\"$hostname - ping $target\"> "
	."<p>"
	."<b>ping</b>"
	."</p>"
	."<p>"
	."<input name=\"ptarget\" size=\"30\"/>"
	."</p>"
	."<p>"
	."<anchor>"
	."ping!"
	."<go href=\"./ping.php\" method=\"post\">"
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

/*****START****/
if ($_SESSION['auth']=="1")
{
if ($target != "")
{
	if (tests ($target)==0)
	{
		ping($target);
	}
}
else
{
	tselect ("no target");
}
}

else
{
	require ("./config.php");
        echo "<wml>";
        echo "<card id=\"auth\" title=\"$hostname - ping\">"
        ."<p>"
        ."<a href=\"./login.php\">Error - try again!</a>"
        ."</p>"
        ."</card>";
        echo "</wml>";
}

?>
