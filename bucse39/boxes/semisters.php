

<a href="?p=semister">New Entry</a><br>
<?php
//include('menu/cn.php');

if(isset($_GET["id"]))
{
	$sql2="delete from semister where id= ".base64_decode(ms($_GET['id']));
	$r2=mysqli_query($cn,$sql2);
	if($r2)
		{
			print '<div class="success">Data Deleted</div>';
			}
			
			else{
				print '<div class="error">'.mysqli_error($cn).'</div>';
				}
	}

$sql="select * from semister";
$r=mysqli_query($cn,$sql);


print '<table>';
print '<tr><th>Id</th><th>Name</th><th>Edit&Delete</th></tr>';

while($sr=mysqli_fetch_array($r))
{
	print '<tr>';
	print '<td>'.$sr['id'].'</td>';
	print '<td>'.$sr['name'].'</td>';
	print  '<td>
			<a href="?p=semister_edit&id='.base64_encode($sr["id"]).'">Edit</a>
			<a href="?p=semisters&id='.base64_encode($sr["id"]).'">Delete</a>
			</td>';
	print '</tr>';
	}
print '<table>';


?>