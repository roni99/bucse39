
<?php
//include('menu/cn.php');


$sql="select teacher.id,teacher.name as teacher,semister.name as semister from teacher,semister where teacher.semisterid=semister.id ";

$r=mysqli_query($cn,$sql);
print '<table>';
print '<tr><th>Teacher</th><th>Semister</th></tr>';
while($sr=mysqli_fetch_array($r))
{
	print '<tr>';	
	print '<td>'.$sr["teacher"].'</td>';
	print '<td>'.$sr["semister"].'</td>';
	print '<tr>';
	}
print '</table>';

?>