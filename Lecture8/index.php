<?php
require_once 'functions.php';
session_start();
session_unset();
$_SESSION['order'] = questionsOrder();
$_SESSION['answers'] = array();
header('Location: questions.php?id=' . array_shift($_SESSION['order']));

