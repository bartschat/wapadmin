<?php
function dbconnect ()
{
	require ("./config.php");
	$link=mysql_connect ("$dbhost","$dbuser","$dbpass");
	$select=mysql_select_db("$dbname",$link);
	return $link;
}

function query ($query,$link)
{

	$resource = mysql_query ($query, $link);
	$result = mysql_fetch_array($resource);
	return ($result);
}
?>
