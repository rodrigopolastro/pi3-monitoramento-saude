<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /pi3-monitoramento-saude/views/pages/login.php");
    exit();
}
