<?php
require "dbconnect.php";
use scr;
use scr\Container;

//$file = fopen($_FILES['img']['tmp_name'], 'r+');
//var_dump($file);
//if ($file = fopen($_FILES['img']['tmp_name'], 'r+')){
    //получение расширения
 //   $ext = explode('.', $_FILES["img"]["name"]);
 //   $ext = $ext[count($ext) - 1];
 //   $filename = 'file' . rand(100000, 999999) . '.' . $ext;

  //  $resource = Container::getFileUploader()->store($file, $filename);


   // $picture_url = $resource['ObjectURL'];
//}
//else
//{
 //   $picture_url = '/../calendar.png';
//}
try {
    $sql = 'INSERT INTO event(`appointment date`, `meeting time`) VALUES(:appointment_date, :meeting_time)';
    $stmt = $conn->prepare($sql);
    var_dump($stmt->bindValue(':appointment_date', $_POST['appointment_date'], PDO::PARAM_STR));
    var_dump($stmt->bindValue(':meeting_time', $_POST['meeting_time'], PDO::PARAM_STR));
    $stmt->execute();

    $sql = 'INSERT INTO calendar(id_user, id_event) VALUES(:id_user, (SELECT MAX(`id`) FROM event))';
    $stmt = $conn->prepare($sql);
    var_dump($stmt->bindValue(':id_user', $_SESSION['id'], PDO::PARAM_INT));
    $stmt->execute();

    echo ("Категория успешно добавлена");

} catch (PDOexception $error) {
    echo ("Ошибка добавления категории: " . $error->getMessage());
}
// перенаправление на главную страницу приложения
header('Location: http://localhost');
exit( );