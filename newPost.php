<?php

$text = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);
$user = $_COOKIE['user'];
//addslashes  Возвращает строку с обратным слешом перед символами, которые нужно экранировать.
//file_get_contents() возвращает содержимое файла в строке, начиная с указанного смещения offset и до length байт

if ($_FILES && $_FILES['file']['error']== UPLOAD_ERR_OK) {
    $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));

    $mysql_posts = new mysqli('localhost', 'root', 'root', 'login_form');
    $mysql_posts->query("INSERT INTO `posts` (`user`,`text`, `likes`, `dislikes`, `image`) VALUES ('$user', '$text', '0', '0', '$image')");

    header('Location: /lab_2_anton/main.php');

} else {
    $mysql_posts = new mysqli('localhost', 'root', 'root', 'login_form');
    $mysql_posts->query("INSERT INTO `posts` (`user`,`text`, `likes`, `dislikes`, `image`) VALUES ('$user', '$text', '0', '0', '')");

    header('Location: /lab_2_anton/main.php');
}
?>
