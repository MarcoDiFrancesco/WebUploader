<?php
$link = $_POST["linkToUpload"];
$filename = basename($link);
$filename = str_replace('%20', ' ', $filename);
$upload = file_put_contents("../file/".$filename, fopen($link, 'r'));

// https://drive.google.com/uc?authuser=0&id=1Cphvdy85UnC4ne2UtioRJ1YNkxc4RQpl&export=download
// https://marcodifrancesco.com/upload/uploads/100%20mega.txt
header("Location: index.php");
?>
