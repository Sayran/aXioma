<?php echo "<pre>"; error_reporting(E_ALL);ini_set('display_errors', true);
include("news.php");
include("page.php");



//$news = new News(4272);
//$news->setTitle("hello world");
//$news->setContent("do you hear me ?");
//$news->setDate(date('m/d/Y h:i:s a', time()));
//var_dump($news);
//$news->save();
//$list = new FileHelper();
//var_dump($list->get($news->getFile()));
$slug = new Slug();
$slug->setSlug("filehelper.php");
$slug -> redirect($slug->slug);



