<?php
session_start();

session_unset();

session_destroy();

header('Location: /student-241/Project/www/index.php');
exit;
