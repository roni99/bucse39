
<?php
//include('menu/cn.php');


$name="";
$ename="";

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	
	$er=0;
	if($name=="")
	{
		$er++;
		$ename='<span class="error">Required</span>';
		}
		if($er==0)
			{
				$sql="insert into city(name)values('".ms($name)."')";
				if(mysqli_query($cn,$sql))
					{
						print '<span class="success">Data saved successfully</span>';
						$name="";
						}
						else{
							print '<span class="error">'.mysqli_error($cn).'</span>';
							}
				}
				else{
					
					}
	}
?>
<form method="post" action="">
City<br>
<input type="text" name="name" value="" maxlength="50"><?php print $ename;?><br>
<br>
<input type="submit" name="submit" value="Save">
</form>