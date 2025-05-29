<?php
require(dirname(__DIR__).'/header.php');

if (isset($_SESSION['user']) && !empty($_SESSION['user']->nickname)) {
    $nickname = htmlspecialchars($_SESSION['user']->nickname);
    echo "Привет, {$nickname}";
} else {
    echo "С незнакомцами не разговариваю";
}

require(dirname(__DIR__).'/footer.html');
?>
<script src="/student-241/Project/www/script.js"></script>