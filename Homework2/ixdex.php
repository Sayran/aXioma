<?php 

$date_formats = array('0' => $today = date("F j, Y, g:i a"),
					  '1' => $today = date("m.d.y"),
					  '2' => $today = date("Y.m.d"),
					  '3' => $today = date("D M j G:i:s "),
					  '4' => $today = date("Y-m-d H:i:s"));
$date_type_count = count($date_formats) -1;
$news_array  = array('news' => 
						array('isActive' => true ,
							   'news_date' => $date_formats[mt_rand(0 , $date_type_count)],
							   'news_tag' => "Hello, fella",
							   'news_content' => "Some content" ),
					 'next_news' => 
					 	array('isActive' => false ,
							   'news_date' => $date_formats[mt_rand(0 , $date_type_count)],
							   'news_tag' => "Hello, fella",
							   'news_content' => "Some content" ),
					 'next_news1' => 
					 	array('isActive' => true ,
							   'news_date' => $date_formats[mt_rand(0 , $date_type_count)],
							   'news_tag' => "Brogue kick",
							   'news_content' => "Some content" ),
					 'next_news2' => 
					 	array('isActive' => false ,
							   'news_date' => $date_formats[mt_rand(0 , $date_type_count)],
							   'news_tag' => "Hello, fella",
							   'news_content' => "Some content" ),
					 'next_news3' => 
					 	array('isActive' => true ,
							   'news_date' => $date_formats[mt_rand(0 , $date_type_count)],
							   'news_tag' => "Irish curse Back-Breaker",
							   'news_content' => "Some content" ));


?>

<html>
	<head>
		<title>PHP TSI</title>
	</head>
	<body>
		<?php  foreach($news_array as $options => $value): ?>
			<?php if ($news_array[$options]['isActive'] == true): ?>
			<h1><?php echo $news_array[$options]['news_tag']; ?></h1>
			<p><?php echo " " . $news_array[$options]['news_content']; ?></p>
			<p><i><?php echo " " . $news_array[$options]['news_date']; ?></i></p>
		<?php endif; ?>
		<?php endforeach; ?>
	</body>
</html>
