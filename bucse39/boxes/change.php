

<?php
//include('menu/cn.php');
$name="";
$contact="";
$email="";
$password="";
$gender="";
$city="";


$ename="";
$econtact="";
$eemail="";
$epassword="";
$egender="";
$ecity="";


if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$city=$_POST['city'];
	
	
	$er=0;
	if($name=="" and( strlen(($name)>20 or ($name)<5 )))
	{
		
		$er++;
		$ename='<span class="error">Required</span>';

	}
	
		if($contact=="")
	{
		$er++;
		$econtact='<span class="error">Required</span>';
		
		}
		if($email=="")
	{
		$er++;
		$eemail='<span class="error">Required</span>';
		
		}
		if($password=="")
	{
		$er++;
		$epassword='<span class="error">Required</span>';
		
		}
		if($gender=="")
	{
		$er++;
		$egender='<span class="error">Select</span>';
		
		}
		if($city <=0 )
	{
		$er++;
		$ecity='<span class="error">Select one</span>';
		
		}
		
		if($er==0)
		{
			
			$sql="update student set name='".ms($name)."',contact='".ms($contact)."',email='".ms($email)."',password='".ms($password)."',genderid='".$gender."',cityid='".$city."' where id= ".base64_decode($_GET['id']);
			if(mysqli_query($cn,$sql))
				{
					print '<span class="success">Data saved successfully</span>';
															
					}
					else{
						print '<span class="error">'.mysqli_error($cn).'</span>';
						
						}	
		}

	}
	
	elseif(isset($_GET['id']))
	{
		$sql2="select * from student where id= ".base64_decode($_GET['id']);
		$r2=mysqli_query($cn,$sql2);
		while($sr2=mysqli_fetch_array($r2))
		{
			 $name=$sr2["name"];
			 $contact=$sr2["contact"];
			 $email=$sr2["email"];
			 $password=$sr2["password"];
			 
			}
		}
?>

<form method="post" action="">
Name<br>
<input type="text" name="name" value="<?php print $name;?>" maxlength="50"><?php print $ename;?><br>
<br>
Contact<br>
<input type="text" name="contact" value="<?php print $contact;?>" maxlength="50"><?php print $econtact;?><br>
<br>
Email<br>
<input type="email" name="email" value="<?php print $email;?>" maxlength="200"><?php print $eemail;?><br>
<br>
Password<br>
<input type="password" name="password" value="<?php print $password;?>" maxlength="50"><?php print $epassword;?><br>
<br>
Gender<br>
<select name="gender" maxlength="12">
  <option value="">select</option>
 <?php
$cn=mysqli_connect('localhost','bucse39','bucse39','zadmin_bucse39');
$sql="select * from gender";
$r=mysqli_query($cn,$sql);
while($sr=mysqli_fetch_array($r))
 
{
print '<option value="'.$sr["id"].'">'.$sr["name"].'</option>';
}
?>

</select><?php print $egender;?><br>
<br>
City<br>
<select name="city">
  <option value="0">city</option>
 <?php
$cn = mysqli_connect('localhost','bucse39','bucse39','zadmin_bucse39');
$sql="select * from city";
$r=mysqli_query($cn,$sql);
while($sr=mysqli_fetch_array($r))
{
	if($sr["id"]==$city)
	{
	print '<option value="'.$sr["id"].'" selected>'.$sr["name"].'</option>';
	}
	else{
		print '<option value="'.$sr["id"].'">'.$sr["name"].'</option>';
		}
}
?>
</select><?php print $ecity;?><br>
<br>

<input type="submit" name="submit" value="Save">

</form>