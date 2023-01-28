<?php
require "dbconnect.php";
try {
    $sql = 'INSERT INTO user(`name`, surname, email, password) VALUES(:name, :surname, :email, :password)';
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name', $_GET['name']);
    $stmt->bindValue(':surname', $_GET['surname']);
    $stmt->bindValue(':email', ($_GET['email']));
    $stmt->bindValue(':password', $_GET['password']);

    $stmt->execute();
    echo  "Пользователь успешно добавлен";
} catch (PDOexception $error) {
    echo "Ошибка добавления пользователя: " . $error->getMessage();
}
// Перенаправление на главную страницу приложения
header('Location: http://localhost');
exit();
