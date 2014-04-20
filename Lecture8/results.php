<?php
require_once 'functions.php';
session_start();
if (isset($_POST['answer'])) {
    $_SESSION['answers'][$_POST['id']] = array('answer' => $_POST['answer'], 'rightAnswer' => getRightAnswerId($_POST['id']));
}
$answers = $_SESSION['answers'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
</head>
<body>
<?php foreach($answers as $key => $answer): ?>
Question ID: <?php echo $key; ?><br>
Your answer: <?php echo $answer['answer']; ?><br>
Right answer: <?php echo $answer['rightAnswer']; ?><br><br>
<?php endforeach;?>
</body>
</html>