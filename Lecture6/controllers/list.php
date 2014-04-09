<?php
//logica vivoda, dostajom iz vaila
 $news = getNewsList();
?>


<html>
<head>
    <title>News list</title>
</head>
<body>
<?php include(TEMPLATE_PATH . 'list.php'); ?>
<br>
<a href="?action=add">Add</a>
</body>
</html>