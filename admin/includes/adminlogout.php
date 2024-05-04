<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header('location:http://localhost/SP/includes/');
exit;
?>