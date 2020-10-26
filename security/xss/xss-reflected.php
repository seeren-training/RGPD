
<?php
$page = filter_input(INPUT_GET, "page");
?>

<h1>

<?= filter_var($page, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "Pas de page" ?>

</h1>