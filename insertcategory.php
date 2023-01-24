<?php
require "dbconnect.php";
try {
    $sql = 'INSERT INTO event(`appointment date`, `meeting time`) VALUES(:appointment_date, :meeting_time)';
    $stmt = $conn->prepare($sql);
    $stmt->execute(["appointment_date"=>$_GET['adate'], "meeting_time"=>$_GET['mtime']]);
    echo ("Категория успешно добавлена");
    // return generated id
    // $id = $pdo->lastInsertId('id');

} catch (PDOexception $error) {
    echo ("Ошибка добавления категории: " . $error->getMessage());
}
// перенаправление на главную страницу приложения
header('Location: http://localhost');
exit( );