<?php
session_start();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";




function portal ()
{
	require ("./config.php");
	$uptime=`uptime`;
	$users=`users`;
	echo "<wml>"
	."<card id=\"status\" title=\"$hostname - status\">"
	."<p>"
	."<b>$hostname - status</b>"
	."</p>"
	."<p>"
	."<a href=\"#load\">system load</a><br/>"
	."<a href=\"#users\">users</a><br/>"
	."<a href=\"./conns.php\">connections</a><br/>"
	."</p>"
	."<p>"
	."<do type=\"prev\" label=\"back\"><prev/></do>"
	."</p>"
	."</card> "
	."<card id=\"load\" title=\"system load\">"
	."Uptime:<p>$uptime</p>"
	."<do type=\"prev\" label=\"back\"><prev/></do>"
	."</card>"
	."<card id=\"users\" title=\"logged in users\">"
	."users on $hostname:<p>$users</p>"
	."<p>"
	."<do type=\"prev\" label=\"back\"><prev/></do>"
	."</p>"
	."</card>"
	."<card id=\"stats\" title=\"$hostname\">"
	."<p>"
	."<b>$hostname - server stats</b>"
	."</p>"
	."<p>"
	."<a href=\"#load\">load</a><br/>"
	."<a href=\"#users\">users</a><br/>"
	."</p>"
	."<p>"
	."<do type=\"prev\" label=\"back\"><prev/></do>"
	."</p>"
	."</card>"
	."<card id=\"explore\" title=\"$hostname\">"
	."<p>"
	."<b>$hostname - explore network</b>"
	."</p>"
	."<p>"
	."<a href=\"./ping.php\">ping</a><br/>"
	."<a href=\"./nslookup.php\">nslookup</a><br/>"
	."<a href=\"./traceroute.php\">traceroute</a><br/>"
	."<a href=\"./whois.php\">whois</a><br/>"
	."</p>"
	."<do type=\"prev\" label=\"back\"><prev/></do>"
	."</card>"
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

