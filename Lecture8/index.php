<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = validate($_POST['name']);
    $surname = validate($_POST['surname']);
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && (($name != "")&&($surname != "")))
    {
        session_start();
        $_SESSION['name'] = $name . " " . $surname;
        header('Location: question.php?id=0');
    }
    else{
        echo "You have some problems in entered data";
    }

}

function validate($data){
    $data = trim(strip_tags($data));
    return $data;
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