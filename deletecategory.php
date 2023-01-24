<?php
require "dbconnect.php";
try {
    $sql = 'DELETE FROM calendar WHERE id_event=:id; DELETE FROM event WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->execute(["id"=>$_GET['id']]);
    echo ("Категория успешно удалена");
    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    echo ("Ошибка удаления категории: " . $error->getMessage());
}
// перенаправление на главную страницу приложения
header('Location: http://localhost');
exit( );