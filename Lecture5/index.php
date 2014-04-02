<?php echo "<pre>";

$upload_dir = 'D:/eFcx/XAMPP/htdocs/Lecture5/files/';
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if(!empty ($_FILES['userfile'])){
    $user_file = $_FILES['userfile'];
}

$fileType = exif_imagetype($_FILES['userfile']["tmp_name"]);
$allowed = array(IMAGETYPE_JPEG);
if (!in_array($fileType, $allowed)) {
    $file_name = preg_replace("/[^A-Z0-9._-]/i", "_",$user_file["name"] );
    if($user_file['type']=== 'text/plain'){
        echo "he-he-he ^^, .txt file ^^,";
        $new_file_name = preg_replace('"\.txt$"', '.md', $file_name);

        if(move_uploaded_file($user_file["tmp_name"], $upload_dir.$new_file_name )){
            echo "Success";
        }
        else{
            echo " Fail";
        }
    }
    else{
        echo" file is no .txt";
        if(move_uploaded_file($user_file["tmp_name"], $upload_dir.$file_name )){
            echo "Success";
        }
        else{
            echo " Fail";
        }
    }

}
else{
    $file_name = preg_replace("/[^A-Z0-9._-]/i", "_",$user_file["name"] );
    $new_file_name = preg_replace('"\.(jpg|jpeg)$"', '.png', $file_name);

    if(move_uploaded_file($user_file["tmp_name"], $upload_dir.$new_file_name )){
        echo "Success";
        echo '<img src=" $upload_dir.$new_file_name " /><br />';


    }
    else{
        echo " Fail";
    }
}






?>
<html>
    <head>
    </head>
        <body>
        <form enctype="multipart/form-data" action="" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="300000">
            <input type = "file" name = "userfile"/><br>
            <input type = "submit" value = "Send File">
        </body>
</html>


