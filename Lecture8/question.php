<?php echo "<pre>";
session_start();
$questions = file('questions.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($questions as &$question) {
//    var_dump($question);
    $question = explode('|',$question);
//    var_dump($question);
}
$id = $_GET['id'];
if($id < count($questions)){
$answers = file('answer'.$id.'.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($answers  as &$answer) {
     $answer  = explode('|',$answer);
    }
//    var_dump($answers);


}
else{
    header('Location: result.php');
}


?>
<html>
<head>
    <title>PHP TSI</title>
</head>
<body>

<form method="post" action="question.php?id=<?php echo $id + 1; ?>">
<h2><?php echo $questions[$id][1]; ?></h2>
    <?php foreach($answers as $key => $value):?>
       <?php echo ($key+1).'.'.$value[0]; ?><br>
    <?php endforeach;?>
    <input type="number" name="answer" value="">
    <input type="submit" value="next" >
    kirills.tolkuns
    mikhail mihailicenko
    natuksa

</body>
</html>