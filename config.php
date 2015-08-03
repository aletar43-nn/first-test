<?php
// подключение к БД.
$conn = mysql_connect("localhost", "pirosorlakatos", "112233") // информация для подключения к БД
or die ("Нет соединения с базой". mysql_error());

mysql_select_db("new_db");
?>