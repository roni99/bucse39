
<?php
//include('menu/cn.php');
$student="";
$image="";

$estudent="";
$eimage="";

	if(isset($_POST['submit']))
	{
		$student=$_POST['student'];
		$image=$_FILES['image'];

		$er=0;
		if($student <=0 )
		{
			$er++;
			$estudent='<span class="error">Required</span>';
		
		}
		if($image["size"]<=0)
		{
			$er++;
			$eimage='<span class="error">Must image upload</span>';
			}
			else
			{
				$a=explode(".",$image["name"]);
				if(count($a)>=2)
				{
					$ext=strtolower($a[count($a)-1]);
					if(!($ext=="gif" or $ext=="png" or $ext=="jpg" or $ext=="jpeg"))
					{
						$er++;
						$eimage='<span class="error">Invalid File Format</span>';
						}
					}
					else{		
							$er++;
							$eimage='<span class="error">No Extension</span>';
						}
				}
			if($er==0)
			{
				$sql="insert into simage(studentid,image)values('".$student."','".$image['name']."')";
				
				if(mysqli_query($cn,$sql))
				{	
					$sp=$image['tmp_name'];
					$dp="imagebox/".mysqli_insert_id($cn)."_".$image["name"];
					move_uploaded_file($sp,$dp);
					
					
					print '<span class="success">Data saved</span>';
					$student="";
					$image="";
					}
					else{
							print '<span class="error">'.mysqli_error($cn).'</span>';
						}
				}
				else{
						print '<span class="error">Data missing</span>';
					}
	}
?>

<form method="post" action="" enctype="multipart/form-data">
Student<br>
<select name="student">
<option>Select</option>
<?php
$sql="select * from student";
$r=mysqli_query($cn,$sql);
while($sr=mysqli_fetch_array($r))
{
	if($sr["id"]==$student)
	{
		print '<option value="'.$sr["id"].'" selected>'.$sr["name"].'</option>';
	}
	else{
		print '<option value="'.$sr["id"].'">'.$sr["name"].'</option>';
		}
	}

?>
</select><?php print $estudent;?><br>
<br>

Image<br>
<input type="file" name="image" value=""><?php print $eimage;?><br>
<br>
<input type="submit" name="submit" value="Save"> 

</form>