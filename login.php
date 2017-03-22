<?php
session_start ();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";



function login ()
{
require ("./config.php");
echo "<wml>";
echo "<card id=\"login\" title=\"$hostname - login\">"
."<p>"
."$welcomemsg<br/>"
."user: <input name=\"name\" size=\"10\" type=\"text\"/><br/>"
."pass: <input name=\"password\" size=\"10\" type=\"password\"/><br/>"
."</p>"
."<do type=\"accept\" label=\"login!\">"
."<go href=\"./auth.php\" method=\"post\">"
."<postfield name=\"name\" value=\"$(name)\"/>"
."<postfield name=\"password\" value=\"$(password)\"/>"
."</go>"
."</do>"
."</card>";
echo "</wml>";
}

login ();
?>
