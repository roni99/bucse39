
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
				$sql="update city set name='".ms($name)."' where id= ".base64_decode($_GET['id']);
				if(mysqli_query($cn,$sql))
					{
						print '<span class="success">Data update successfully</span>';
						
						}
						else{
							print '<span class="error">'.mysqli_error($cn).'</span>';
							}
				}
				else{
					
					}
	}
	
	elseif(isset($_GET['id']))
	{
		$sql2="select * from city where id= ".base64_decode($_GET['id']);
		$s2=mysqli_query($cn,$sql2);
		while($sr2=mysqli_fetch_array($s2))
		{
			$name=$sr2["name"];
			}
		}
?>
<form method="post" action="">
City<br>
<input type="text" name="name" value="<?php print $name;?>" maxlength="50"><?php print $ename;?><br>
<br>
<input type="submit" name="submit" value="Save">
</form>