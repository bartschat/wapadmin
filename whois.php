<?php
session_start();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";


require ("./config.php");
function whois ($target)
{
	require ("./config.php");
	$result=`$whois $target`;
	echo "<wml>";
	echo ""
	."<card id=\"result\" title=\"whois $target\">"
	."<p>"
	."$result"
	."</p>"
	."<p>"
	."<a href=\"./portal.php\">menu</a>"
	."</p>"
	."</card>";
	echo "</wml>";
}

function check_target ($target)
{
	$args = preg_match ('/^-/',$target); 
	if ($args!=0) {$check_target=0;}
}

function tselect ($target)
{
	require ("./config.php");
	echo "<wml>"
	."<card id=\"whois\" title=\"$hostname - whois $target\"> "
	."<p>"
	."<b>whois</b>"
	."</p>"
	."<p>"
	."<input name=\"ptarget\" size=\"30\"/>"
	."</p>"
	."<p>"
	."<anchor>"
	."whois!"
	."<go href=\"./whois.php\" method=\"post\">"
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
		whois($target);
	}
	else
	{
		tselect ("no target");
	}
}
else
{
        echo "<wml>";
        echo "<card id=\"whois\" title=\"$hostname - whois\">"
        ."<p>"
        ."<a href=\"./login.php\">Error - try again!</a>"
        ."</p>"
        ."</card>";
        echo "</wml>";
}

?>
