<?php
//include('menu/cn.php');

$name="";
$semister="";

$ename="";
$esemister="";

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$semister=$_POST['semister'];
	
	$er=0;
	if($name=="")
		{
			$er++;
			$ename='<span class="error">Required</sapn>';
			}
			if($semister <= 0)
			{
				$er++;
				$esemister='<span class="error">Select</span>';
				}
				
				if($er==0)
				{
					$sql="update teacher set name='".ms($name)."',semisterid='".$semister."' where id= ".base64_decode($_GET['id']);
					if(mysqli_query($cn,$sql))
						{
							print '<span class="success">Data Update successfully</span>';
							
						}
							
							else{
									print '<span class="error">'.mysqli_error($cn).'</span>';
								}
							
					}
					else{
							print '<span class="error">Data missing</span>';
						}
	
	}
	
	elseif(isset($_GET['id']))
	{
		$sql2="select * from teacher where id= ".base64_decode($_GET['id']);
		$s2=mysqli_query($cn,$sql2);
		while($sr2=mysqli_fetch_array($s2))
		{
			$name=$sr2["name"];
			//$semisterid=$sr2["semister"];
			}
		}
?>

<form method="post" action="">
Name<br>
<input type="text" name="name" value="<?php print $name;?>" maxlength="200"><?php print $ename;?><br>
<br>
Semister<br>
<select name="semister">
<option>Select</option>
<?php
$sql="select * from semister";
$r=mysqli_query($cn,$sql);
while($sr=mysqli_fetch_array($r))
{
	print '<option value="'.$sr["id"].'">'.$sr["name"].'</option>';
	}
?>
</select><?php print $esemister;?><br>
<br>
<input type="submit" name="submit" value="Save"> 
</form>