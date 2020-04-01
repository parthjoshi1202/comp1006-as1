<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$file = $_FILES['file1'];

$name = $file['name'];
echo "Name: $name<br />";

$tmp_name = $file['tmp_name'];
echo "Tmp Name: $tmp_name<br />";

//image/png
/*
 * Name: u9i84ha4c95161gp4ooaimlb6m-black-bean-soup.jpg
Tmp Name: C:\xampp\tmp\php5FFC.tmp
Type: image/jpeg
Size: 248294

Name: images.png
Tmp Name: C:\xampp\tmp\php2B11.tmp
Type: image/png
Size: 6003
 */


$type = mime_content_type($tmp_name);
echo "Type: $type<br />";

$size = $file['size'];
echo "Size: $size<br />";


session_start();
$name = session_id() . '-' . $name;

move_uploaded_file($tmp_name, "gym_upload/$name");
?>

</body>
</html>
