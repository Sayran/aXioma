<?php echo"<pre>";
//funcii obrabotki

function getNewsList()
{
    $news = getNews();
    $news_array = array();
    foreach($news as $key => $value)
    {
        $item = explode("|",$news[$key]);
        array_push($news_array,array('id'=> $item[0],
                                     'title'=> $item[1],
                                     'content'=> $item[2],
                                     'isActive'=> $item[3]));
    }
   return $news_array;
}
function newsAdd()
{
    $news_id = count(getNews())+1;
    $news_title = $_POST['title'];
    $news_content = $_POST['content'];
    $news_status = 'true';
    $news_title = clearInput($news_title);
    $news_content = clearInput($news_content);
    $new_news_array = array($news_id,$news_title,$news_content,$news_status);

    $new_news = implode("|" , $new_news_array);
    $new_news .= "\n";
    saveNews($new_news);
  return  $new_news;
}
function newsEdit()
{

}
function deleteNews()
{

}
function clearInput($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);

    return $data;
}
function getNews(){
    $news = explode("\n",file_get_contents("news.txt"));
    return $news;
}
function saveNews($buffer){
    $path = 'news.txt';
//    file_get_contents($path,$buffer,);
//
//    $fn = fopen($path,"w") or die("fail to open file");
//    fclose( $fn );

    file_put_contents( $path, $buffer, FILE_APPEND );
}