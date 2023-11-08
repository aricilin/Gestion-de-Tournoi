<?php
session_start();
ob_start();
session_destroy();
echo "<center>Redirection a la page principal</center>";
header("Refresh: 0.5; url=Index.html");
ob_end_flush();
?>