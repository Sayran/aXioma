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
<a href="?action=add">Add</a>
</body>
</html>