<a href="?p=teachar">New Entry</a><br>
<br>

<?php
//include('menu/cn.php');

if(isset($_GET['id']))
{
	$sql2=" delete from teacher where id= ".base64_decode(ms($_GET['id']));
	$r2=mysqli_query($cn,$sql2);
	if($r2)
		{
			print '<div class="success">Data Deleted</div>';
			}
	else{
			print '<div class="error">'.mysqli_error($cn).'</div>';
		}
	}


$sql="select teacher.id,teacher.name as teacher,semister.name as semister from teacher,semister where teacher.semisterid=semister.id ";
$r=mysqli_query($cn,$sql);

print'<table>';
print '<tr><th>Id</th><th>Teacher</th><th>Semister</th><th>Edit&Delete</th></tr>';
while($sr=mysqli_fetch_array($r))
{
	print '<tr>';
	print '<td>'.$sr["id"].'</td>';
	print '<td>'.$sr["teacher"].'</td>';
	print '<td>'.$sr["semister"].'</td>';
	print '<td>
				<a href="?p=teacher_edit&id='.base64_encode($sr["id"]).'">Edit</a>
				<a href="?p=teachers&id='.base64_encode($sr["id"]).'">Delete</a>
			</td>';
	print '<tr>';
	}

print '</table>';

?>