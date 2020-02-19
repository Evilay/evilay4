<html>
	<head>
		<title>Web</title>
	</head>
	<body bgcolor="f3e5ab">	
		<?php
			#Коннект пользователя
			$db = mysql_connect("localhost", "root", "")
			or die("");
			print ("");
			#Коннект БД
			mysql_select_db("evilay", $db) or die ('Не могу выбрать ДБ');
			print ("");

			$result = mysql_query("SELECT * FROM tab WHERE ID='1'", $db);
			$myrow = mysql_fetch_array($result);
			do {
				echo $myrow['voices']."<br>";
			}
			while($myrow = mysql_fetch_array($result));
			//mysql_close($link);
		?>
	</body>
</html>