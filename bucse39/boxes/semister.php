<?php



//include('menu/cn.php');
$name="";
//$date=""


$ename="";
//$edate="";

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	//$date=$_POST['date'];
	
	$er=0;
	if($name=="")
		{
			$er++;
			$ename='<span class="error">Required</span>';
			}
			
			
			if($er==0)
			{
				$sql="insert into semister(name) values('".ms($name)."')";
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
						print '<span class="error">Data missing</span>';
					}
	}

?>
<form method="post" action="">
Semister<br>
<input type="text" name="name" value="<?php print $name;?>" maxlength="100"><?php print $ename;?><br>
<br>
Date<br>
<input type="text" name="date" value="" readonly class="form_datetime" id="form_datetime"><br>
<br>
<input type="submit" name="submit" value="Save">
</form>