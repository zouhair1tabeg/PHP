<?php
session_start();
session_destroy();
header('Location: login_Form_client.php');
exit();
?>
