<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Checkout - пользовательская форма заказа, показывающая компоненты формы и функции проверки. Версия v4.0.0">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="../../../../favicon.ico">

    <style>
        .center{
            margin-left:auto;
            margin-right:auto;
        }

        .btn{
            justify-content:center;
            font-size: 16px;
        }
        th{
            text-align: center;
            padding:10px 75px;
            border:1px solid black;
        }
        td {
            text-align: center;
            padding:10px 75px;
            border:1px solid black;
        }
        table{
            margin-left:auto;
            margin-right:auto;
        }
    </style>
</head>

<body>

<div class="container pt-5">
    <div class="center">
        <div class="py-5 text-center">
            <h2>Добавить бронь</h2>
        </div>
        <form method="post" action="insertcategory.php" enctype="multipart/form-data">
            <div class="mb-3">
                <h5 for="event">Комментарий:</h5>
                <input type="text" required placeholder="Комментарий"  name="comment" class="form-control" id="event">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h5 for="start">Дата записи:</h5>
                    <input type="date" required placeholder="Дата записи" name="appointment date" class="form-control"  id="start">
                </div>
                <div class="col-md-6 mb-3">
                    <h5 for="end" >Время записи:</h5>
                    <input type="time" required placeholder="Время записи" name="meeting time" class="form-control"  id="end">
                </div>
            </div>

            <input class="btn btn-dark btn-lg btn-block" type="submit" value="Создать">
        </form>
    </div>
</div>


<h2 class="hhhhh text-center mb-4 mt-5">Брони:</h2>
<table border='1'>
    <?php
    $idUser = $_SESSION['id'];
    $result = $conn->query("SELECT * FROM calendar, event, user WHERE event.id = calendar.id_event AND user.id = calendar.id_user ");
    echo '<tr>';
    echo '<th>' . 'Id'  . '</th><th>' . 'Дата записи' . '</th><th>' . 'Время записи' . '</th><th>'. 'Комментарий' . '</th>';
    echo '<th>' . 'Пользователь' . '</th>' . '<th>' . 'Изображение' . '</th>';
    echo '</tr>';
    while ($row = $result->fetch()) {
        $id_event = $row['id_event'];
        echo '<tr>';
        echo '<td>' . $id_event . '</td><td>'  . $row['appointment date'] . '</td><td>' . $row['meeting time'] . '</td><td>' . $row['comment'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td> <img src="'.$row['img'].'" alt="twbs" width="64" height="64"> </td>';
        echo '<td><a class="btn ml-2 mr-2 btn-dark" style="height:35px; font-size:14px;" href=deletecategory.php?id_event=' . $id_event . '>Удалить</a></td>';
        echo '</tr>';
    }
    ?>
</table>

</body>