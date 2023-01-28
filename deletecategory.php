<?php
require "dbconnect.php";
$id_event = $_GET['id_event'];
try {
    $sql = 'DELETE FROM calendar WHERE calendar.id_event=:id_event';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id_event', $id_event);
    $stmt->execute();
    $sql = 'DELETE FROM event WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id_event);
    $stmt->execute();
} catch (PDOexception $error) {
    echo ("Ошибка удаления категории: " . $error->getMessage());
}
// перенаправление на главную страницу приложения
header('Location: http://localhost');
exit( );