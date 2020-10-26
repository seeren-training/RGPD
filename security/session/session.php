<?php

session_start();

if (!array_key_exists('token', $_SESSION)) {
    // L'identité de celui qui créé la session
    $_SESSION['token'] = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
}

// L'identifiant de celui qui utilise actuellement la session
$token = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

// Si je ne suis pas le créateur de la session
if ($token !== $_SESSION['token']) {
    echo "Session hijack per fixation";
    session_regenerate_id();
    session_destroy();
}


