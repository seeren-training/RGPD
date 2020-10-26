<?php

//CSRF init
session_start();
if (!array_key_exists('token', $_SESSION)) {
    $_SESSION['token'] = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
}

//CSRF check
if ($_POST && $_SESSION['token'] !== $_POST['token']) {
    die("Token non valid");
} 
$product = filter_input(INPUT_POST, "produit");
if ($product) {
    file_put_contents(__DIR__ ."/test.json", $product);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post">
    <input name="produit" />
    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>"/>
    <button>Create</button>
</form>

</body>
</html>


