<h1>Категории задач:</h1>
<table border='1'>
    <?php
    $result = $conn->query("SELECT * FROM event");
    while ($row = $result->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td><td>' . $row['appointment date'] . '</td><td>' . $row['meeting time'] . '</td>';
        echo '<td><a href=deletecategory.php?id='.$row['id'].'>Удалить</a></td>';
        echo '</tr>';
    }
    ?>
</table>
<h2>Создание категории</h2>
<form method="get" action="insertcategory.php">
    <input type="date" name="adate">
    <input type="time" name="mtime">
    <input type="submit" value="Создать">
</form>