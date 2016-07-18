
	
	<?php
		if(isset($_SESSION['type']))
		{
			if($_SESSION['type']=="U")
			{
				
				print  '<a href="?u=student">Student</a>
						<a href="?u=subject">Subject & Teacher</a>
						<a href="?u=result">Result</a>
						<a href="?u=image">Image</a>';
						
			}
			
			
			
		}
	?>
	