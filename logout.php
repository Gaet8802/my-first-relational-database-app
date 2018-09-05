<?php
require 'DBconnect.php';
session_unset ();
session_destroy ();
header ('location: log-in-form.php');
?>
