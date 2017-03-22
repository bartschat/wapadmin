<?php
session_start();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";


require ("./config.php");
function nmap ($target,$P0,$FF)
{
	require ("./config.php");
	$exec="$nmap";
	if ($P0=="P0")
	{
		$exec = $exec." -P0";
	}

	if ($FF=="FF")
	{
		$exec = $exec." -F";
	}
	$exec = $exec." $target";
	echo "<wml>";
	echo ""
	."<card id=\"result\" title=\"nmap $target\">"
	."<p>"
	."exec=$exec"
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

function tselect ($target,$P0,$FF)
{
	require ("./config.php");
	$P0="";
	$FF="";
	echo "<wml>"
	."<card id=\"nmap\" title=\"$hostname - nmap $target\"> "
	."<p>"
	."<b>nmap</b>"
	."</p>"
	."<p>"
	."-P0<input type=\"checkbox\" value=\"P0\" name=\"pP0\"/>"
	."-F<input type=\"checkbox\" value=\"FF\" name=\"pFF\"/>"
	."<input name=\"ptarget\" size=\"30\"/>"
	."</p>"
	."<p>"
	."<anchor>"
	."nmap!"
	."<go href=\"./nmap.php\" method=\"post\">"
	."<postfield name=\"target\" value=\"\$(ptarget)\"/>"
	."<postfield name=\"P0\" value=\"\$(pP0)\"/>"
	."<postfield name=\"FF\" value=\"\$(pFF)\"/>"
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
		nmap($target,$P0,$FF);
	}
	else
	{
		tselect ("no target","","");
	}
}
else
{
        echo "<wml>";
        echo "<card id=\"nmap\" title=\"$hostname - nmap\">"
        ."<p>"
        ."<a href=\"./login.php\">Error - try again!</a>"
        ."</p>"
        ."</card>";
        echo "</wml>";
}

?>
