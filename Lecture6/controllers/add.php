<?php
//logica dobavlenia
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location: ?action=list");
}

?>


<html>
<head>
    <title>News add</title>
</head>
<body>
<?php include(TEMPLATE_PATH . 'form.php'); ?>
</body>
</html>