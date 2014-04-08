<?php
//logika vivoda edita, dostajom i izmenjaem, peresohranenie izmenennogo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location: ?action=list");
}
$current = $_POST[$news['id']];
?>


<html>
<head>
    <title>News edit</title>
</head>
<body>
<?php include(TEMPLATE_PATH . 'form.php'); ?>
</body>
</html>