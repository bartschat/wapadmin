<?php
session_start();
header ("Cache-control: private");

header("Content-Type: text/vnd.wap.wml");
echo "<?xml version='1.0'?>";
echo "<!DOCTYPE wml PUBLIC '-//WAPFORUM//DTD WML 1.1//EN' 'http://www.wapforum.org/DTD/wml_1.1.xml'>";

function standard ()
{
require ("./config.php");
}

standard ();
?>
