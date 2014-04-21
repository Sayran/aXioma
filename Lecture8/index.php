<?php
require_once 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$name = validate($_POST['name']);
$surname = validate($_POST['surname']);
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && (($name != "")&&($surname != "")))
{
        session_start();
        $_SESSION['order'] = questionsOrder();
        $_SESSION['answers'] = array();
        header('Location: questions.php?id=' . array_shift($_SESSION['order']));
        $_SESSION['name'] = $name . " " . $surname;
    }
    else{
        echo "You have some problems in entered data";
    }

}



?>




<html>
<head>
    <title>PHP TSI</title>
</head>
<body>
<form method="post" action="">
    Usernamer:<br>
    <input type="text" name="name"/><br>
    Surname: <br>
    <input type="text" name="surname"/><br>
    Email: <br>
    <input type="text" name="email"/><br>
    <input type="submit" value="go!">
</body>
</html>