<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$file = file_get_contents($root . '/mailers/contactemail.html', 'r');

$file = str_replace('#email', $data['email'], $file);
$file = str_replace('#password', $data['password'], $file);

echo $file;
?>
