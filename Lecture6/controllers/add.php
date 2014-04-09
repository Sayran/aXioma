<?php
//logica dobavlenia
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $new_news =
        newsAdd();
    header("Location: ?action=list");
}
//if(isset($_POST['save'])){
//$new_news = newsAdd();
//}
?>


<html>
<head>
    <title>News add</title>
</head>
<body>
<?php include(TEMPLATE_PATH . 'form.php'); ?>
</body>
</html>