


<?php
//$search="";
$semister="";

if(isset($_POST['submit']))
{
	//$search=$_POST['search'];
	$semister=$_POST['semister'];
	}

?>
<form method="post" action="">
<select name="semister">
<option value="">Semister</option>
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
</select>
 <input type="submit" name="submit" value="Search"><br>
</form>
<br>


<?php
//include('menu/cn.php');


$sql="select  a.id,b.id as idd,b.name as name1,b.roll as roll,c.name as name2,d.name as name3,a.result as result from
 sresult as a,
 student as b,
 semister as c,
 subject as d where a.studentid=b.id and a.semisterid=c.id and a.subjectid=d.id and a.studentid = ".$_SESSION['id'];

/*if($search!="")
	{
		$sql.=" and b.roll like '%".ms($search)."%'";
		} */
		if($semister!="")
		{
			$sql.=" and c.id= ".$semister;
			}
	 
$r=mysqli_query($cn,$sql);


print 'Total:'.mysqli_num_rows($r).' Result Found';
print '<br>';
		
	
print '<table>';
print '<tr><th>Semister</th><th>Subject</th><th>Result</th></tr>';
while($sr=mysqli_fetch_array($r))
{
	print '<tr>';
	//print '<td>'.$sr['id'].'</td>';
	//print '<td>'.$sr['name1'].'</td>';
	//print '<td>'.$sr['roll'].'</td>';
	print '<td>'.$sr['name2'].'</td>';
	print '<td>'.$sr['name3'].'</td>';
	print '<td>'.$sr['result'].'</td>';
	print '</tr>';
	}

print '<table>';

		
	

?>