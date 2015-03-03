<?php
header("Content-Type: text/html; charset=UTF-8");
// header нужен для того, чтобы сообщить браузеру
// о используемой кодировке
//
// Здесь задаем параметры подключения к базе данных MySql
$dbhost = 'localhost';
$dbuser = 'uagni';
$dbpass = 'parol';
$dbname = 'kit_kal';

// Начинаем формировать XML, который будет хранится в переменной $result
$result='<?xml version="1.0" encoding="UTF-8"?>
    <date>
';
        // Подключаемся к базе данных
        $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
        mysql_select_db($dbname);
        // Сообщаем MySql о кодировке
        mysql_query("SET NAMES utf8;");
        // Составляем запрос по выбору кода и названия страны из таблицы
        $query = mysql_query("SELECT dateg, h_stems, color, animal  
							FROM date"); 
        if ($query) {
            // Затем в цикле разбираем запрос, и формируем XML
            while ($row = mysql_fetch_array($query)) { 
                $result.='
			<offer>
				<year>'.$row['dateg'].'</year>
                <stem>'.$row['h_stems'].'</stem>
                <color>'.$row['color'].'</color>
                <animal>'.$row['animal'].'</animal>
			</offer>
            
            ';
        }
    }

$result.='
    </date>';
// Выводим результат на экран
echo $result;
?>