<?php
$semister="";

if(isset($_POST['submit']))
{
	$semister=$_POST['semister'];
	}

?>
<form method="post" action="">
<select name="semister">
<option value="">Semister</option>
<?php
$sql="select * from semister";
$r=mysqli_query($cn,$sql);
while($sr=mysqli_fetch_array($r))
{
	if($sr["id"]==$semister)
	{
		print '<option value="'.$sr["id"].'" selected >'.$sr["name"].'</option>';
		}
		else{
			print '<option value="'.$sr["id"].'">'.$sr["name"].'</option>';
			}	
	}
?>
</select>
 <input type="submit" name="submit" value="Search"><br>
</form>
<br>


<?php
//include('menu/cn.php');
	
$sql="select s.id,s.name,s.code as code,t.name as teacher,se.name as semister 
from subject as s,teacher as t ,semister as se where s.teacherid=t.id and s.semisterid=se.id";

	if($semister!="")
		{
			$sql.=" and se.id= ".$semister;
			}
	 
$r=mysqli_query($cn,$sql);
print 'Total:'.mysqli_num_rows($r).' Result Found';
print '<br>';

print '<table>';
print '<tr><th>Name</th><th>Code</th><th>Teacher</th><th>Semister</th></tr>';
while($sr=mysqli_fetch_array($r))
{
	print '<tr>';
	
	print '<td>'.$sr['name'].'</td>';
	print '<td>'.$sr['code'].'</td>';
	print '<td>'.$sr['teacher'].'</td>';
	print '<td>'.$sr['semister'].'</td>';
	print '</tr>';
	}

print '<table>';
?>