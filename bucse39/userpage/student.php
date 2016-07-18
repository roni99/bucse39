


<?php
//include('menu/cn.php');

print '<div class="">';

$vop=6;
$page=1;
if(isset($_GET["pg"]))
{
	$page=$_GET["pg"];
}




$sql="select s.id as id,s.name,s.roll,s.contact,s.email,g.name as gender,c.name as city 
from student as s, gender as g,city as c where s.genderid=g.id and s.cityid=c.id";

$que = mysqli_query($cn,$sql);
$total=mysqli_num_rows($que);

$sql .= " limit ".(($page-1)* 6)." ,".$vop;



$r2=mysqli_query($cn,$sql);
$vr = (($page-1)*6) + 1;

/*
print '<table>';
print '<tr><th>Name</th><th>Roll</th><th>Contact</th><th>Email</th><th>Gender</th><th>City</th><th>Image</th></tr>';
while($sr=mysqli_fetch_array($r2))
{
	print '<tr>';
	print '<td>'.$sr['name'].'</td>';
	print '<td>'.$sr['roll'].'</td>';
	print '<td>'.$sr['contact'].'</td>';
	print '<td>'.$sr['email'].'</td>';
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
	
	print '</tr>';
	}

print '<table>';
*/

while($sr=mysqli_fetch_assoc($r2))
{
	print '<div class="std">';	
	print '<span>Name : '.$sr["name"].'</span><br>';
	print '<span>Id : '.$sr["roll"].'</span><br>';
	print '<span>Contact : '.$sr["contact"].'</span><br>';
	print '<span>'.$sr["email"].'</span><br>';
	print '<span>From : '.$sr["city"].'</span><br>';
	print '<span>Gender : '.$sr["gender"].'</span><br>';
	
	
	print '<span>';
		$sql4="select * from simage where studentid= ".$sr['id'] ;
		$r4=mysqli_query($cn,$sql4);
		if(mysqli_num_rows($r4)>0)
			{
				while($sr4=mysqli_fetch_array($r4))
					{
						print '<img src="imagebox/'.$sr4['id']."_".$sr4['image'].'"  width="180" height="190" alt=""/>';
						break;
						}	
				}
				else{
						if($sr['gender']=="Male")
						{
							print '<img src="imagebox/noimagemale.png" width="190" height="180" alt="No image" title="No image"/>';
						}
						else{
								print '<img src="imagebox/noimagefemale.png" width="190" height="180" alt="No image" title="No image"/>';
							}
					}
	print '</span>';
	print '</div>';		
}



print '</div>';


print '<div class="paging">';
if($page > 1)
{
	print '<a href="?u=student">First</a> | ';
	print '<a href="?u=student&pg='.($page-1).'">Previous</a> |';
}

$reminder = $total%$vop;
$lastdata = $total - $reminder;
$pageread=($lastdata/$vop) + 1;

if(($page)*$vop <= $lastdata)
{
	print '<a href="?u=student&pg='.($page+1).'">Next</a> | ';
	print '<a href="?u=student&pg='.$pageread.'">Last</a> |';
}






$p = 0;
while($p <= $lastdata / $vop)
{
	if($p+1 == $page)
	{
		print '<a class="selectedlink" href="?u=student&pg='.($p+1).'">Page '.($p+1).' | </a>';
	}
	else
	{
		print '<a href="?u=student&pg='.($p+1).'">Page '.($p+1).' | </a>';	
	}
	$p++;	
}
print '</div>';

?>