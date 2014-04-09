<?php
//logika vivoda edita, dostajom i izmenjaem, peresohranenie izmenennogo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current = $_GET['id'];
    newsEdit($current);
//    header("Location: ?action=list");
}
$edited_news = getNewsList();
$current = $_GET['id'];
$current_array = currentArray($edited_news,$current);
//newsEdit($current);
echo $current;
?>


<html>
<head>
    <title>News edit</title>
</head>
<body>
<?php include(TEMPLATE_PATH . 'form.php'); ?>
</body>
</html>