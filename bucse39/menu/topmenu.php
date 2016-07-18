
	
<?php
	
	if(isset($_SESSION['type']))
	{
		if($_SESSION['type']=="A")
		{
		  print '<a href="?p=semisters">Semister</a>
				<a href="?p=teachers">Teacher</a>
				<a href="?p=city_display">City</a>
				<a href="?p=students">Student</a>
				<a href="?p=subject_display">Subject</a>
				<a href="?p=result_show">Result</a>
				<a href="?p=image_display">Image</a>';
			}
			
		print '<a href="?p=logout">LogOut</a>
			<a href="?p=my_account">"'.ucwords($_SESSION['name']).'"</a>';
		}
		else
		{
			print '<a href="?p=login">Sign In</a>';
			}


?>