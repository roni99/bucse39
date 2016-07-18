<?php 
			
									
				if(isset($_GET['p']))
				{		
						
						if(strtolower($_GET['p'])=='login')
						{
											
							if(isset($_SESSION['type']))
							
								{
									print '<br>';

									print 'Login Successfully<br><br>';
									include('boxes/home.php');
									}
									
								elseif(isset($_POST['loginsubmit']))
									{
										print 'Invalid Login';
										include('boxes/login.php');
										}
											
										else{
												print 'Wellcome To Our CSE Family';
												include('boxes/login.php');
											}
							
						}		
					
						
				
							elseif(isset($_SESSION['id']))
							{
								if(file_exists('boxes/'.$_GET['p'].'.php'))
								{
									print '<div class="title">'.ucwords(str_replace('_',' ',$_GET['p'])).'</div>';
									include('boxes/'.$_GET['p'].'.php');
								}
							}
							
											
							else{
									 include('boxes/home.php');
								}
								
							
						
			
				}
				
				
				
				
				elseif(isset($_SESSION['id']))
				{
					if(file_exists('userpage/'.$_GET['u'].'.php'))
						{
							print '<div class="title">'.ucwords(str_replace('_',' ',$_GET['u'])).'</div>';
						include('userpage/'.$_GET['u'].'.php');
							}
							else{
								print 'Error_404';
								}
				}
				
					
			else{
					include('boxes/home.php');
				}

				
				
			?>