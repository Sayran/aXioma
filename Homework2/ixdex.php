<?php 

$news_array  = array('news' => 
						array('isActive' => true ,
							  // 'news_date' => date(),
							   'news_tag' => "Hello, fella",
							   'news_content' => "Some content" ),
					 'next_news' => 
					 	array('isActive' => false ,
							 //  'news_date' => date(),
							   'news_tag' => "Hello, fella",
							   'news_content' => "Some content" ),
					 'next_news1' => 
					 	array('isActive' => true ,
							 //  'news_date' => date(),
							   'news_tag' => "Brooogue kick",
							   'news_content' => "Some content" ),
					 'next_news2' => 
					 	array('isActive' => false ,
							 //  'news_date' => date(),
							   'news_tag' => "Hello, fella",
							   'news_content' => "Some content" ),
					 'next_news3' => 
					 	array('isActive' => true ,
							 //  'news_date' => date(),
							   'news_tag' => "Irish curse Back-Breaker",
							   'news_content' => "Some content" ));
var_dump($news_array);
						 




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
		<?php endif; ?>
		<?php endforeach; ?>
	</body>
</html>
