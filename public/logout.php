<?php
require_once '/../core/Auth.php';

Auth::logout();
header('Location: ../views/auth/login.php');
exit;
?>