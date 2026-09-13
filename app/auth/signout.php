<?php
require_once __DIR__ . '/../../cofig/config.php';

$_SESSION =[];
session_destroy();

header('Locatio: ' . BASE_URL . '/index.php');
exit;
?>