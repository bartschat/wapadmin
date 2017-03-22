<?php
session_start();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";


function conns ($from,$to)
{
	require ("./config.php");
	$netstat = `$netstat --numeric-ports | $grep ESTABLISHED`;
	$lines = split ("\n",$netstat);
	echo "<wml>"
	."<card id=\"services\" title=\"$hostname - connections\">"
	."<p>"
	."connections $from to $to:<br/><br/>"
	."";
	for ($i=$from;$i<=$to;$i++)
	{
		echo "$lines[$i]<br/>";
	}
	echo "</p>";
	$from+=5;
	if ($from>=count($lines)) {$from=count($lines)-5;}
	$to+=5;
	if ($to>count($lines)) {$to=count($lines);}
	echo "<p>"
	."from:<input name=\"pfrom\" size=\"2\" value=\"$from\"/>"
	."to:<input name=\"pto\" size=\"2\" value=\"$to\"/>"
	."<anchor>show"
	."<go href=\"./conns.php\" method=\"post\">"
	."<postfield name=\"from\" value=\"$(pfrom)\"/>"
	."<postfield name=\"to\" value=\"$(pto)\"/>"
	."</go></anchor>"
	."</p>"
	."<p>"
	."<do type=\"refresh\" label=\"reload\">"
	."<refresh/></do>"
	."<do type=\"prev\" label=\"back\"><prev/></do>"
	."<a href=\"./portal.php\">menu</a>"
	."</p>"
	."</card> "
	."</wml>";
}

if ($_SESSION['auth']=="1")
{
	if ($from<1)
	{
		$from=0;
		$to=4;
	}
	conns($from,$to);
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

