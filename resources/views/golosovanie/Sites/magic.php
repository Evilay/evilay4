<?php 
	$db = mysql_connect("localhost", "root", "")
			or die("Не могу");
			print ("");
			#Коннект БД
			mysql_select_db("evilay", $db) or die ('Не могу выбрать ДБ');
			print ("");
			#Задание условий отбора
			$result = mysql_query("SELECT * FROM envy", $db);
			#Выполнение условий отбора
			$myrow = mysql_fetch_array($result);
			do {
				echo $myrow['log']." ";
			}
			while($myrow = mysql_fetch_array($result));
			
			$result = mysql_query("SELECT * FROM envy", $db);
			do {
				echo $myrow['pas']." ";
			}
			while($myrow = mysql_fetch_array($result));
			// print ("-------------------------------------------"."<br>");
			// #Условия вывода
			// $result = mysql_query("SELECT * FROM students WHERE stud_id='3' OR NAME='Вадим'", $db);
			// $myrow = mysql_fetch_array($result);
			// do {
			// 	echo "Студент N - ".$myrow['STUD_ID']."<br>";
			// 	echo $myrow['NAME']."<br>";
			// }
			// while($myrow = mysql_fetch_array($result));
			// print ("-------------------------------------------"."<br>"); */
			//print("Старше 25 лет и ")
			#Условия вывода
			// $Frao = 0;
			// $result = mysql_query("SELECT * FROM students ", $db);
			// $myrow = mysql_fetch_array($result);
			// do { 
			// 	echo "Имя: ".$myrow['NAME']."<br>";
			// 	echo "Экзамен 1: ".$myrow['Eczam_1']." Экзамен 2: ".$myrow['Eczam_2']." Экзамен 3: ".$myrow['Eczam_3']." Экзамен 4: ".$myrow['Eczam_4']."<br>";
			// 	$A=$myrow['Eczam_1']+$myrow['Eczam_2']+$myrow['Eczam_3']+$myrow['Eczam_4'];
			// 	echo "Общий балл:".$A."<br>"."<br>";
			// 	$Zeldris[$Frao] = array(array($A),array($myrow['NAME']));
			// 	$Frao++; 
			// }
			// while($myrow = mysql_fetch_array($result));
			// //mysql_close($link);
			// echo "--------------------------------------------"."<br>";
			// echo "Сортировка"."<br>";
			// echo "--------------------------------------------"."<br>";

			// rsort($Zeldris);
			// reset($Zeldris);

			// $s = 0;
			// for ($i=0; $i < 7; $i++) { 
			// 	echo "Студент ".++$s."<br>"."Общий балл: ";
			// 	for ($j=0; $j < 7; $j++){
			// 	echo $Zeldris[$i][$j][0]." ";
			// } echo "<br>";
			// }
		/*	}
			$result = mysql_query("SELECT * FROM students WHERE stud_id='3'", $db);
			$myrow = mysql_fetch_array($result);
			do {
				echo "Студент N - ".$myrow['STUD_ID']."<br>";
				echo $myrow['NAME']."<br>";
			}
			while($myrow = mysql_fetch_array($result));*/