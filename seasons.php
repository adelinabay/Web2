<html>
<head>
<meta charset = "utf-8">
</head>
<body>
<?php
$link = mysqli_connect("10.0.2.30", "f0524242_opros", "uxisnusuuf", "f0524242_opros");
 mysqli_query($link, 'SET NAMES utf-8');
 if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 // подключение к базе данных:
 mysqli_select_db($link, "f0524242_opros");
 $sql_add = "INSERT INTO seasons (color) VALUES ('".$_GET['season']."')";
 mysqli_query($link, $sql_add);

 if (mysqli_affected_rows($link)>0)
 { print "<Thank you for yor answer!";}
 else { print "Something wrong! :( "; }
?>
</body>
</html>

