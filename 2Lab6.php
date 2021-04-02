<html lang="ru">
<head>
<meta charset="utf-8" />
<script src="jquery-3.6.0.min.js"></script> 
</head>
<body>
<p>What's your favourite season?</p>
<script src="2Lab6.js"></script>
<form action="season.php" metod="get">
<?php
	$link = mysqli_connect("127.0.0.1", "f0522117_opros", "12345", "f0522117_opros");
	mysqli_query($link, 'SET NAMES utf-8');
	if (!$link) {
		echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
		echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
		exit;
		}
	mysqli_select_db($link, "f0522117_opros");
?>
<p><input type="radio" id="winter" value="winter" name="season" checked>Winter</input></p>
<p><input type="radio" id="spring" value="spring" name="season">Spring</input></p>
<p><input type="radio" id="summer" value="summer" name="season">Summer</input></p>
<p><input type="radio" id="autumn" value="autumn" name="season">Autumn</input></p>
<button type="submit" id="send">Send</button>
</form>

<footer id="index-footer">
<div>
	<button id="stats">Show statistics</button>
	<script>
	$("#stats").click(function(){ 
	$("#count").css("visibility", "visible"); 
	}) 
</script>
</div>
<div id="count" style="visibility:hidden">
<?php
	$winter=mysqli_query($link,"SELECT season FROM `seasons` WHERE season='winter' ");
	$spring=mysqli_query($link,"SELECT season FROM `seasons` WHERE season='spring' ");
	$summer=mysqli_query($link,"SELECT season FROM `seasons` WHERE season='summer' ");
	$autumn=mysqli_query($link,"SELECT season FROM `seasons` WHERE season='autumn' ");
	$all=mysqli_query($link,"SELECT * FROM seasons ");
	$data1=mysqli_num_rows($winter);
	$data2=mysqli_num_rows($spring);
	$data3=mysqli_num_rows($summer);
	$data4=mysqli_num_rows($autumn);
	$data5=mysqli_num_rows($all);
						
	print "Winter: " .$data1 . " (" . round ($data1/$data5*100, 2) ."%)";
	echo "<br />";	
	print "Spring: " .$data2. " (" . round ($data2/$data5*100, 2) ."%)";
	echo "<br />";				
	print "Summer: " .$data3. " (" . round ($data3/$data5*100, 2) ."%)";
	echo "<br />";			
	print "Autumn: " .$data4. " (" . round($data4/$data5*100, 2) ."%)";
	echo "<br />";			
	print "All answers: " .$data5;
	echo "<br />";
?>
</footer>
</body>

</html>