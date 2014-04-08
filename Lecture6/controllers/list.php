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
</body>
</html>