
<a href="?p=student">New Entry</a><br>
<br>

<?php
//include('menu/cn.php');

if(isset($_GET["id"]))
{
	$sql2="delete from student where id= ".base64_decode(ms($_GET['id']));
	$r2=mysqli_query($cn,$sql2);
	if($r2)
		{
			print '<div class="success">Data Deleted</div>';
			}
			
			else{
				print '<div class="error">'.mysqli_error($cn).'</div>';
				}
	}

$sql="select s.id as id,s.name,s.roll,s.password,s.contact,s.email,s.type,g.name as gender,c.name as city 
from student as s, gender as g,city as c where s.genderid=g.id and s.cityid=c.id";

$r=mysqli_query($cn,$sql);
print '<table>';
print '<tr><th>Id</th><th>Name</th><th>Roll</th><th>Password</th><th>Contact</th><th>Email</th><th>Type</th><th>Gender</th><th>City</th><th>Image</th><th>Edit&Delete</th></tr>';
while($sr=mysqli_fetch_array($r))
{
	print '<tr>';
	print '<td>'.$sr['id'].'</td>';
	print '<td>'.$sr['name'].'</td>';
	print '<td>'.$sr['roll'].'</td>';
	print '<td>'.$sr['password'].'</td>';
	print '<td>'.$sr['contact'].'</td>';
	print '<td>'.$sr['email'].'</td>';
	print '<td>'.$sr['type'].'</td>';
	print '<td>'.$sr['gender'].'</td>';
	print '<td>'.$sr['city'].'</td>';
	print '<td>';
		$sql4="select * from simage where studentid= ".$sr['id'] ;
		$r4=mysqli_query($cn,$sql4);
		if(mysqli_num_rows($r4)>0)
			{
				while($sr4=mysqli_fetch_array($r4))
					{
						print '<img src="imagebox/'.$sr4['id']."_".$sr4['image'].'"  width="80" height="90" alt=""/>';
						break;
						}	
				}
				else{
						if($sr['gender']=="Male")
						{
							print '<img src="imagebox/noimagemale.png" width="80" height="90" alt="No image" title="No image"/>';
						}
						else{
								print '<img src="imagebox/noimagefemale.png" width="80" height="90" alt="No image" title="No image"/>';
							}
					}
	print '</td>';
	
	print '<td>
				<a href="?p=student_edit&id='.base64_encode($sr["id"]).'">Edit</a>
				<a href="?p=students&id='.base64_encode($sr["id"]).'">Delete</a>
			</td>';
	print '</tr>';
	}

print '<table>';
?>