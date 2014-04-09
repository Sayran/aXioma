<?php echo"<pre>";
//funcii obrabotki

function getNewsList()
{
    $news = getNews();
    $news_array = array();
    unset($news[count($news) - 1]);
    foreach($news as $key => $value)
    {
        $item = explode("|",$news[$key]);
        array_push($news_array,array('id'=> $item[0],
                                     'title'=> $item[1],
                                     'content'=> $item[2],
                                     'isActive'=> $item[3]));
    }
//    saveNews("\n");
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

    $new_news = implodeArray($new_news_array);
    saveNews($new_news);
  return  $new_news;
}
function newsEdit($news_id)
{
    $current_news_id = $news_id;
    $current_news_title = $_POST['title'];
    $current_news_content = $_POST['content'];
    $current_news_title = clearInput($current_news_title);
    $current_news_content= clearInput($current_news_content);
    if($_POST['active']==="inactive"){
        $current_news_status = 'false';
    }
    else{
    $current_news_status = 'true';
    }

    $temp_array = arrayExistence(currentArray(getNewsList(),$current_news_id),$current_news_title,$current_news_content,$current_news_status);
    var_dump($temp_array);
    $buffer = implodeArray($temp_array);
    saveNews($buffer);
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
    file_put_contents( $path, $buffer, FILE_APPEND );
}
function arrayExistence($base_array,$new_title,$new_content,$new_status){
            $base_array['title'] = $new_title;
            $base_array['content'] = $new_content;
            $base_array['isActive'] = $new_status;

            return $base_array;
}
function currentArray($base_array,$id){
    foreach ($base_array as $key => $value) {
        if($base_array[$key]['id'] == $id){
            return $base_array[$key];
        }
        else{
            unset ($base_array[$key]);
        }
    }
}
function implodeArray($array){
    $news = implode("|" , $array);
    $news .= "\n";
    return $news;
}