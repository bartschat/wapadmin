<?php
$hostname="localhost"; //hostname of host on which wapadmin is running on
$ping="/bin/ping -c 4 "; // location of ping cmd do not forget -c COUNT !!!
$nslookup="/usr/bin/nslookup -silent "; // location of nslookup
$whois="/usr/bin/whois "; // location of whois
$lsof="/usr/bin/lsof"; //location of lsof
$netstat="/bin/netstat";
$grep="/bin/grep";
$traceroute="/usr/sbin/traceroute"; // location of traceroute
$nmap="/usr/local/bin/nmap"; // location of your nmap installation

/***********************************************************/

$dbhost="localhost"; // host where mysql db is running
$dbname="wapadmin";  // name of the db
$dbuser="wapadmin";  // user with sufficient rights on db
$dbpass="wapadmin";  // password ;)
$welcomemsg="Welcome to WapAdmin! :*)"; // message displayed on login screen
?>
