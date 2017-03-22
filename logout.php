<?php
session_start ();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";



function login ()
{
require ("./config.php");
/*$_SESSION['auth'] = FALSE;*/
$_SESSION = array(); // clean up session vars
session_destroy();   // destroy session
echo "<wml>";
echo "<card id=\"login\" title=\"$hostname - login\">"
."<p>"
."<a href=\"./login.php\">logged out!</a><br/>"
."</p>"
."</card>";
echo "</wml>";
}

login ();
?>
