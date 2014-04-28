<?php echo "<pre>"; error_reporting(E_ALL);
include("news.php");


$news = new News();
$news->setTitle("hello world");
$news->setContent("do you hear me ?");
$news->setDate(date('m/d/Y h:i:s a', time()));
var_dump($news);
$news->save();


