


<?php
//include('menu/cn.php');


$sql="select s.id as id,s.name,s.roll,s.contact,s.email,s.password,g.name as gender,c.name as city 
from student as s, gender as g,city as c where s.genderid=g.id and s.cityid=c.id and s.id = ".$_SESSION['id'];

$r=mysqli_query($cn,$sql);

print '<table>';
print '<tr><th>Your Impormation</th><th>Your Photo</th></tr>';
while($sr=mysqli_fetch_array($r))
{
	print '<br>';
	print '<a href="?p=change&id='.base64_encode($_SESSION['id']).'">Update Profile</a><br>';
	print '<tr>';
	print '<td>';
	print '<h3>Name: '.$sr['name'].'</h3>';
	print '<h3>My Id: '.$sr['roll'].'</h3>';
	print '<h3>Password:</h3>'.$sr['password'].'<br>';
	print '<h3>Mobile:</h3> '.$sr['contact'].'<br>';
	print '<h3>Email:</h3>'.$sr['email'].'<br>';
	print '<h3>Gender:</h3> '.$sr['gender'].'<br>';
	print '<h3>Home Town:</h3> '.$sr['city'].'';
	print '</td>';
	
	print '<td>';
		$sql4="select * from simage where studentid= ".$sr['id'] ;
		$r4=mysqli_query($cn,$sql4);
		if(mysqli_num_rows($r4)>0)
			{
				while($sr4=mysqli_fetch_array($r4))
					{
						print '<img src="imagebox/'.$sr4['id']."_".$sr4['image'].'"  width="200" height="210" alt=""/>';
						break;
						}	
				}
				else{
						if($sr['gender']=="Male")
						{
							print '<img src="imagebox/noimagemale.png" width="80" height="100" alt="No image" title="No image"/>';
						}
						else{
								print '<img src="imagebox/noimagefemale.png" width="80" height="100" alt="No image" title="No image"/>';
							}
					}
	print '</td>';
	
	print '</tr>';
	}
	
print '<table>';
?>