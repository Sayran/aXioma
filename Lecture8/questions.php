<?php
require_once 'functions.php';
session_start();
if (isset($_POST['answer'])) {
    $_SESSION['answers'][$_POST['id']] = array('answer' => $_POST['answer'], 'rightAnswer' => getRightAnswerId($_POST['id']));
}
$questions = getQuestions();
$id = $_GET['id'];
$nextID = array_shift($_SESSION['order']);
$question = $questions[$id];
$answers = getAnswers($id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
</head>
<body>
<h2><?php echo $question['text']?></h2>
<?php if ($nextID): ?>
    <form action="questions.php?id=<?php echo $nextID ?>" method="post">
<?php else: ?>
    <form action="results.php" method="post">
<?php endif; ?>
    <?php foreach($answers as $key => $answer): ?>
        <input type="radio" name="answer" value="<?php echo $key; ?>" checked/>
        <?php echo $answer[0]; ?><br>
    <?php endforeach; ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit"/>
</form>
</body>
</html>
