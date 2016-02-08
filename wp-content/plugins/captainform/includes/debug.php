<?php
session_start();

// debug flag
if ($_REQUEST['setdebug']=='ON') 
    $_SESSION['devdebug']="ON";
elseif ($_REQUEST['setdebug']=='OFF')	
    $_SESSION['devdebug']="OFF";

echo "DEBUG is ";
if ($_SESSION['devdebug']=="ON") 
    echo "<b>ON</b> | <a href=\"debug.php?setdebug=OFF\">off</a>";
else 
    echo "<a href=\"debug.php?setdebug=ON\">on</a> | <b>OFF</b>";
							
?>