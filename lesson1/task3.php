<?php

session_start();

if (empty($_SESSION['path'])){
    $_SESSION['path'] = "/applications/mamp/htdocs/";
}
if(!empty($_GET['path'])){
    $_SESSION['path'] = $_SESSION['path'] . $_GET['path'] . '/';
}

$dir = new DirectoryIterator($_SESSION['path']);

foreach ($dir as $item) {
    echo "<a href='?path={$item}'>{$item}</a><br>";
}