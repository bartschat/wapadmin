<?php
session_start();
header ("Cache-control: private");
header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";
function standard ($target)
{
require ("./config.php");
echo "<wml>"
."<card id=\"nslookup\" title=\"$hostname - nslookup $target\"> "
."<p>"
."<b>nslookup</b>"
."</p>"
."<p>"
."<input name=\"ptarget\" size=\"30\"/>"
."</p>"
."<p>"
."<anchor>"
."nslookup!"
."<go href=\"./nslookup.php\" method=\"post\">"
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

/*****START*****/

require ("./config.php");

if ($_SESSION['auth']=="1")
{
	if ($target != "")
	{
		$result=`$nslookup $target`;
		echo "<wml>";
		echo ""
		."<card id=\"result\" title=\"nslookup $target\">"
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
        echo "<card id=\"nslookup\" title=\"$hostname - nslookup\">"
        ."<p>"
        ."<a href=\"./login.php\">Error - try again!</a>"
        ."</p>"
        ."</card>";
        echo "</wml>";
}

?>
