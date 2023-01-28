<?php
date_default_timezone_set('Asia/Yekaterinburg');
require "dbconnect.php";
require "auth.php";
require "menu.php";
if (isset($_SESSION['login']) or ($_SESSION['registration.php']))
    {
    require "event.php";
    }
else{
    echo 'Войдите в систему для просмотра и создания событий';
}
