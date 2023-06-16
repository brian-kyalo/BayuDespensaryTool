<?php
session_start();

$content = <<<_HTML
<div style = "text-align: center;">
<h1 style = "color: brown;" >{$_SESSION["name"]}</h1>
<h2 style = "color: green;" >{$_SESSION["email"]}</h2>
<p style = "color: red; font-family: Calibri;">{$_SESSION["serviceNo"]}</p>
<a href = "logout.php">Log Out</a>
</div>
_HTML;

echo $content;
?>