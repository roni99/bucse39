<?php
$cn=mysqli_connect('localhost','bucse39','bucse39','zadmin_bucse39');

if(isset($_GET['p']) && strtolower($_GET['p']=='logout'))
{
		unset($_SESSION['id']);
					unset($_SESSION['name']);
					unset($_SESSION['email']);
					unset($_SESSION['type']);
	
	}



if(isset($_POST['loginsubmit']))
{
	$sql="select s.id,s.name,s.email,s.type  from student as s where s.roll = '".ms($_POST["name"])."' and s.password = '".ms($_POST["password"])."'";
	$r=mysqli_query($cn,$sql);
	if(mysqli_num_rows($r)>0)
		{
			while($sr=mysqli_fetch_array($r))
				{
					$_SESSION['id']=$sr["id"];
					$_SESSION['name']=$sr["name"];
					$_SESSION['email']=$sr["email"];
					$_SESSION['type']=$sr["type"];
					
					}
			}
	
	}

function ms($v)
{
	global $cn;
	return mysqli_real_escape_string($cn,strip_tags($v));
	}

?>