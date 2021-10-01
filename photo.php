<?php
/* upload one file */
$upload_dir = 'C:\xampp\htdocs\uploads';
$name = basename($_FILES["myfile"]["name"]);
$target_file = "$upload_dir/$name";
if (!move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file))
    echo 'error: '.$_FILES["myfile"]["error"].' see apache error.log for permission reason';
else {
    if (isset($_POST['data'])) print_r($_POST['data']);
    echo "\n filename : {$name}";
}
?>