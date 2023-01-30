<?php

require "src\Container.php";

require "dbconnect.php";
var_dump($_FILES);
//$file = fopen($_FILES['img']['tmp_name'], 'r+');
if ($_FILES['img']['tmp_name']!=""&&$file = fopen($_FILES['img']['tmp_name'], 'r+')){
    //получение расширения
    $ext = explode('.', $_FILES["img"]["name"]);
    $ext = $ext[count($ext) - 1];
    $filename = 'file' . rand(100000, 999999) . '.' . $ext;

    $resource = Container::getFileUploader()->store($file, $filename);


    $picture_url = $resource['ObjectURL'];
}
else
{
    $picture_url = '/../calendar.jpg';
}
try {
    $sql = 'INSERT INTO user(`name`, surname, email, password, img) VALUES(:name, :surname, :email, :password, :img)';
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':surname', $_POST['surname']);
    $stmt->bindValue(':email', ($_POST['email']));
    $stmt->bindValue(':password', $_POST['password']);
    $stmt->bindValue(':img', $picture_url);

    $stmt->execute();
    echo  "Пользователь успешно добавлен";
} catch (PDOexception $error) {
    echo "Ошибка добавления пользователя: " . $error->getMessage();
}
// Перенаправление на главную страницу приложения
header('Location: http://localhost');
exit();