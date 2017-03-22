<?php
/**************************************************/
function tests ($target)
{
	$test=preg_match("/\|/",$target);
	//if ($test!=0){echo "<p>a \"|\" has been included!</p>";}
	$test=preg_match("/\-/",$target);
	//if ($test!=0){echo "<p>a \"-\" has been included!</p>";}
	$test=preg_match("/>/",$target);
	$test=preg_match("/</",$target);
	if ($test!=0)
	{
		//echo "<p>you have entered invalid arguments!</p>";
		//echo "<p><a href=\"./portal.php\">menu</a></p>";
		return(1);
	}
	else
	{
		return(0);
	}
}
/**************************************************/
?>
