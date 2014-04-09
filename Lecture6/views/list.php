<!--File for text(view) print.-->
<?php foreach ($news as $item => $value): ?>
<?php if($news [$item]['isActive'] == 'true'): ?>
<h2><?php print $news [$item]['title']; ?></h2>
<p><?php print $news [$item]['content']; ?></p><br>
<a href="?action=edit&id=<?php echo $news[$item]['id']?>">Edit</a>   <a href="?action=delete&id=<?php echo $news[$item]['id']?>">Delete</a>
<?php endif; ?>
<?php endforeach; ?>