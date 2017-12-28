<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post">
    <p>Enter you name</p>
    <input name= "name" >
    <p>Enter you comment</p>
    <textarea name="comments" id="" cols="30" rows="10" ></textarea>
    <button type="Submit">Submit</button>
    <?php
    comments();
    ?>
</form>
</body>
</html>

<?php

function comments(){
    if(!empty($_POST['name']) && !empty($_POST['comments'])) {
        $fo = fopen("/var/www/SomeSite.com/function_basics_tasks/comments.txt", "a");
        if ($fo !== false) {
                $fwrite = fwrite($fo, "\n Пользователь: " . $_POST['name']);
                $fwrite = fwrite($fo, "\n" . $_POST['comments']);
                $fwrite = fwrite($fo, "<hr>");
                fclose($fo);
                redirect();
        }
    }
    elseif(!empty($_POST['name']) || !empty($_POST['comments'])) {
        echo "<br><b>"."Введите имя или комментарий.Зачем же нам ваш комментарий без имени.</b>";
    }
}

function showComments() {
    $fo = fopen("/var/www/SomeSite.com/function_basics_tasks/comments.txt", "r");
    $read = file("/var/www/SomeSite.com/function_basics_tasks/comments.txt");
    foreach ($read as $item) {
        echo $item . "<br>";

    }
    fclose($fo);
}

showComments();

function redirect(){
    $url = '7.php';
    header("Location: $url");
}