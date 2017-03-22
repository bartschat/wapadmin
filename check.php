<?php
session_start ();
header ("Cache-control: private");
header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";

/**************************************************/
function tests ($target)
{
	$test=preg_match("/\|/",$target);
	if ($test!=0){echo "<p>a \"|\" has been included!</p>";}
	$test=preg_match("/\-/",$target);
	if ($test!=0){echo "<p>a \"-\" has been included!</p>";}
	if ($test!=0)
	{
		return(1);
	}
	else
	{
		return(0);
	}
}
/**************************************************/

function check ($target)
{


	require ("./config.php");
	echo "<wml>";
	echo ""
	."<card id=\"result\" title=\"check $target\">"
	."<p>"
	."<input name=\"ptarget\" size=\"30\" value=\"$target\"/>"
	."</p>"
	."<p>"
	."<anchor>"
	."check!"
	."<go href=\"./check.php\" mehtod=\"post\">"
	."<postfield name=\"target\" value=\"$(ptarget)\"/>"
	."</go></anchor>"
	."</p>"
	."<p>"
	."<a href=\"./portal.php\">menu</a>"
	."</p>"
	."<p>"
	."completed tests:<br/>";
	tests ($target);
	echo "</p>"
	."</card>";
	echo "</wml>";
}


/*****START****/
if ($_SESSION['auth']=="1")
{
	check ($target);
}
else
{
	require ("./config.php");
        echo "<wml>";
        echo "<card id=\"auth\" title=\"$hostname error\">"
        ."<p>"
        ."<a href=\"./login.php\">Error - try again!</a>"
        ."</p>"
        ."</card>";
        echo "</wml>";
}

?>
