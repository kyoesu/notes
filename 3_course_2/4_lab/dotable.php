<?php
if (isset($_POST["row"]) and  isset($_POST["col"]))
{
	$row= $_POST["row"];
	
	$col = $_POST["col"];
	echo "<form action ='calculate.php' method='POST'>";
	echo "<input type = 'hidden' name='row' value='$row'>";
	echo "<input type = 'hidden' name='col' value='$col'>";
	echo "<table>";
	
	for ($r=0;$r<$row;$r++)// строки
	{
		echo "<tr>";
		for($c=0;$c<$col;$c++)// столбцы
		{
			echo "<td>";
			echo "<input name = '$r"."_$c' value='0'>"; 
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "<tr><td>/</td></tr>";
	for ($r=0;$r<$row;$r++)// строки
	{
		echo "<tr>";
		for($c=0;$c<$col;$c++)// столбцы
		{
			$r1=$r+$row;
			$c1=$c+$col;
			echo "<td>";
			echo "<input name = '$r1"."_$c1' value='0'>"; 
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
	echo "<br>";
	echo "<input type='submit' value = 'Расчет'>";
	echo "</form>";
}
?>