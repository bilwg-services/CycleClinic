<?php 
setcookie("login", "", time() + (-86400 * 30), "/");
setcookie("email", "", time() + (-86400 * 30), "/");
setcookie("name", "", time() + (-86400 * 30), "/");

header('Location: index.php');
?>