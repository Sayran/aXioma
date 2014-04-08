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
    $news_id = count(getNews()+1);
    $news_title = $_POST['title'];
    $news_content = $_POST['content'];
    $news_status = true;
}
function newsEdit()
{

}
function deleteNews()
{

}
function clearInput($data)
{
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}
function getNews(){
    $news = explode("\n",file_get_contents("news.txt"));
    return $news;
}