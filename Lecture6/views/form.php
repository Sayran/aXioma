<h1><?php print $_GET['action'] == 'edit' ? 'Edit "' . $current . '" news' : 'Add new' ; ?></h1>
<form method="post" action="">
    <?php if ($_GET['action'] == 'edit'):?>
    News Title: <br>
    <input type="text" name="title" value="<?php echo $current_array['title'];?>"/> <br>
    News Content: <br>
    <input type="text" name="content"  value="<?php echo $current_array['content'];?>" /> <br>
    Type: <br>
    <input type=radio name="active" value=active  checked/>Active
    <input type=radio name="active" value=inactive  />Inactive <br>
    <input type="submit" value="Save changes">
    <?php endif; ?>
    <?php if($_GET['action'] == 'add'):?>
        News Title: <br>
        <input type="text" name="title" value=""/> <br>
        News Content: <br>
        <input type="text" name="content"  value="" /> <br>
        <input type="submit" name="save" value="Save changes">

    <?php endif; ?>
</form>

<!--forma dlja dobavlenia i formatirovania-->