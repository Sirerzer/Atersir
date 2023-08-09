<?php
session_start();
define("SERVER_NAME", $_SESSION['serveurselecte']);
define("SERVER_IP", "127.0.0.1");
define("SERVER_PORT", "25565");

define("SERVER_ROOT_DIR", "C:/xampp/htdocs/serveur/".$_SESSION['name'] ."/".$_SESSION['serveurselecte']);
if (file_exists('../serveur/'.$_SESSION['name'].'/'.$_SESSION['serveurselecte'] . '/logs/latest.log')) {
    define("SERVER_LOG_DIR", '../serveur/'.$_SESSION['name'].'/'.$_SESSION['serveurselecte'] . "/logs/latest.log");
}else{
	define("SERVER_LOG_DIR", '../serveur/'.$_SESSION['name'].'/'.$_SESSION['serveurselecte'] ."/proxy.log.0");
}


?>
