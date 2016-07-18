<?php
//include('menu/cn.php');

$name="";
$code="";
$teacher="";
$semister="";

$ename="";
$ecode="";
$eteacher="";
$esemister="";

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$code=$_POST['code'];
	$teacher=$_POST['teacher'];
	$semister=$_POST['semister'];

		$er=0;
		if($name=="")
		{
			$er++;
			$ename='<span class="error">Required</span>';
			}
			if($code=="")
			{
				$er++;
				$ecode='<span class="error">Required</span>';
				}
				if($teacher <=0)
			{
				$er++;
				$eteacher='<span class="error">Required</span>';
				}
				if($semister <=0 )
			{
				$er++;
				$esemister='<span class="error">Required</span>';
				}
				
				if($er==0)
				{
					$sql="insert into subject(name,code,teacherid,semisterid)values('".ms($name)."','".ms($code)."','".$teacher."','".$semister."')";
						if(mysqli_query($cn,$sql))
						{
							print '<span class="success">Data saved successfully</span>';
							$name="";
							$code="";
							$teacher="";
							$semister="";							
						}
						else{
								print'<span class="error">'.mysqli_error($cn).'</span>';
							}
			     }


					else{
							print '<span class="error">Data missing</span>';
						}
	}
?>


<form method="post" action="">
Name<br>
<input type="text" name="name" value="<?php print $name;?>" maxlength="200"><?php print $ename;?><br>
<br>
Code<br>
<input type="text" name="code" value="<?php print $code;?>" maxlength="12"><?php print $ecode;?><br>
<br>
Teacher<br>
<select name="teacher">
<option>Select</option>
<?php
$sql="select * from teacher";
$r=mysqli_query($cn,$sql);
while($sr=mysqli_fetch_array($r))
{
	if($sr["id"]==$teacher)
	{
		print '<option value="'.$sr["id"].'" selected >'.$sr["name"].'</option>';
		}
		else{
			print '<option value="'.$sr["id"].'">'.$sr["name"].'</option>';
			}
	
	}

?>
</select><?php print $eteacher;?><br>
<br>
Semister<br>
<select name="semister">
<option>Select</option>
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
</select><?php print $esemister;?><br>
<br>
<input type="submit" name="submit" value="Save">

</form>