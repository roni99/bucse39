


<?php
//include('menu/cn.php');
	
		
$sql="select si.id,s.name as name,s.roll as roll,si.image from simage as si,student as s where si.studentid=s.id ";
$r=mysqli_query($cn,$sql);


while($sr=mysqli_fetch_array($r))
{
	print '<div class="std">';	
	print '<span>Name : '.$sr["name"].'</span><br><br />';
	print '<span>Id : '.$sr["roll"].'</span><br><br /><br /><br />';
	print '<span><img src="imagebox/'.$sr["id"].'_'.$sr["image"].'" width="200" height="200" alt="" title=""/></span><br>';
	print '</div>';
	}


?>