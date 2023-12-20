<script src="plotly-latest.min.js"></script> 
<?php
if (isset($_POST["row"]) and  isset($_POST["col"]))
{
	$row = $_POST["row"];
	$col = $_POST["col"];
	
	for ($r=0;$r<$row;$r++){
		for($c=0;$c<$col;$c++){
			$r1=$r+$row;
			$c1=$c+$col;
			$cell1[$r][$c] = $_POST["$r"."_$c"];
			$cell2[$r][$c] = $_POST["$r1"."_$c1"];
		}
	}
	//......................................................................
	echo "<table border = 1>";
	for ($r=0;$r<$row;$r++)
	{
		echo "<tr>";
		for($c=0;$c<$col;$c++)
		{
			echo "<td>";
			echo $cell1[$r][$c];
			echo "</td>";
		}
	echo "</tr>";
	}
	echo "</table>";
	echo "<table border = 1>";
	for ($r=0;$r<$row;$r++)
	{
		echo "<tr>";
		for($c=0;$c<$col;$c++)
		{
			echo "<td>";
			echo $cell2[$r][$c];
			echo "</td>";
		}
	echo "</tr>";
	}
	echo "</table>";
	// ...................................
	echo "<div id='myDiv' name='myDiv'></div>";
	echo "<script>";
	echo "var trace1 = {x: [";
	
	for ($r=0;$r<$row;$r++)
	{
		for($c=0;$c<$col;$c++)
		{
			echo $cell1[$r][$c];
			if ($r!=$row)
			{echo ",";}
		}
	}
	echo "], y: [";
	for ($r=0;$r<$row;$r++)
	{
		for($c=0;$c<$col;$c++)
		{
			echo $cell2[$r][$c];
			if ($r!=$row)
			{echo ",";}
		}
	}
	echo "],  mode: 'markers',  type: 'scatter' };";
	echo "var data = [trace1];";
	echo "Plotly.newPlot('myDiv', data);";
	echo "</script>";
	//.............................................................................
	// maximin
$minmax=0;
$maxmin=0;
function minimax($cell1)
{
	global $row;
	global $col;
	global $minmax;
	global $maxmin;
	$min = array();//строки
	$minmax=$cell1[0][0];
	$max = array();//столбцы
	$maxmin=$cell1[0][0];
	for ($r=0;$r<$row;$r++){
		$min[$r]=$cell1[$r][0];		
	}
	for ($c=0;$c<$col;$c++){
		$max[$c]=$cell1[0][$c];
	}
	$maxmin=$max[0];
	for ($r=0;$r<$row;$r++){
		for ($c=0;$c<$col;$c++){
			if ($min[$r]>$cell1[$r][$c]){
				$min[$r]=$cell1[$r][$c];
			}
			if ($max[$c]<$cell1[$r][$c]){
				$max[$c]=$cell1[$r][$c];
			}
	}	}
	for ($r=0;$r<$row;$r++){
		for ($c=0;$c<$col;$c++){
			if ($min[$r]>$minmax){
				$minmax=$min[$r];
			}
			if ($max[$c]<$maxmin){
				$maxmin=$max[$c];
			}
		}
	}
	echo "<br>минимакс=$minmax";
	echo "<br>максимин=$maxmin<br>";
	
}
	echo "1:";
	minimax($cell1);
	$va=$maxmin;
	echo "2:";
	minimax($cell2);
	$vb=$maxmin;
	//.......................................................
	//нэш
	$maxU=($cell1[0][0]-$va)*($cell2[0][0]-$vb);
	for ($r=0;$r<$row;$r++){
		for ($c=0;$c<$col;$c++){
			$U[$r][$c]=($cell1[$r][$c]-$va)*($cell2[$r][$c]-$vb);
			if ($maxU<$U[$r][$c])
			{
				$maxU=$U[$r][$c];
				$mr=$r;
				$mc=$c;
			}
		}
	}
	echo "решение:<br>";
	echo "стратегия у первого игрока $mr<br>";
	echo "стратегия у второго игрока $mc<br>";
	echo "$maxU";
}	
?>
