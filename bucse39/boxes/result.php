
<?php
//include('menu/cn.php');

$student="";
$semister="";
$subject="";
$result="";

$estudent="";
$esemister="";
$esubject="";
$eresult="";

	if(isset($_POST['submit']))
	{
		$student=$_POST['student'];
		$semister=$_POST['semister'];
		$subject=$_POST['subject'];
		$result=$_POST['result'];
		
		$er=0;
		if($student <=0 )
		{
			$er++;
			$estudent='<span class="error">Required</span>';
		
		}
			if($semister <=0 )
		{
			$er++;
			$esemister='<span class="error">Required</span>';
		
		}
			if($subject <=0 )
		{
			$er++;
			$esubject='<span class="error">Required</span>';
		
		}
			if($result=="")
			{
				$er++;
				$eresult='<span class="error">Required</sapn>';
				}
			if($er==0)
			{
				$sql="insert into sresult(studentid,semisterid,subjectid,result)values('".$student."','".$semister."','".$subject."','".ms($result)."')";
				
				if(mysqli_query($cn,$sql))
				{
					print '<span class="success">Data saved successfully</span>';
					$student="";
					$semister="";
					$subject="";
					$result="";
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
Student Id<br>
<select name="student">
<option >Select</option>
<?php
$sql="select * from student";
$r=mysqli_query($cn,$sql);
while($sr=mysqli_fetch_array($r))
{
	if($sr["id"]==$student)
	{
		print '<option value="'.$sr["id"].'" selected>'.$sr["roll"].'</option>';
	}
	else{
		print '<option value="'.$sr["id"].'">'.$sr["roll"].'</option>';
		}
	}
?>
</select><?php print $estudent;?><br>
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
		print '<option value="'.$sr["id"].'" selected>'.$sr["name"].'</option>';
	}
	else{
		print '<option value="'.$sr["id"].'">'.$sr["name"].'</option>';
		}
	}
?>
</select><?php print $esemister;?><br>
<br>

Subject<br>
<select name="subject">
<option>Select</option>
<?php
$sql="select * from subject";
$r=mysqli_query($cn,$sql);
while($sr=mysqli_fetch_array($r))
{
	if($sr["id"]==$subject)
	{
		print '<option value="'.$sr["id"].'" selected>'.$sr["name"].'</option>';
	}
	else{
		print '<option value="'.$sr["id"].'">'.$sr["name"].'</option>';
		}
	}
?>
</select><?php print $esubject;?><br>
<br>

Result<br>
<input type="text" name="result" value="" maxlength="20"><br>
<br>
<input type="submit" name="submit" value="Save">
</form>