<?php
	/*print(
	"
	<div class ='search'>
			<font color='#FFFFFF'> 
						<form method='POST' action='autocomplete.php'>
							جستجو براساس
							<input type='checkbox' name='book' value='book'> کتاب  
							<input type='checkbox' name='writer' value='writer'> نویسنده 
							<input type='checkbox' name='year' value='year'> سال انتشار 
						</form>
			</font>
	</div>
	");*/
	
	include('config.php');
	connect();
	session_start();

	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
		
	/*if(isset($_POST['search_bench']))
	{
		if($_POST['search_bench'] == 'book')
		{
			echo('book');
		}
		else
		{
			echo(' not book ');
		}
		echo('safsf');
	}
	
	else
	{
		echo ('not set');
	}*/
	
	$sql="SELECT Name FROM Book WHERE Name LIKE '%$my_data%' ORDER BY Name";
	$result = mysql_query($sql) or die(mysqli_error());
	
	
	if($result)
	{
		while($row=mysql_fetch_array($result))
		{
			echo $row['Name']."\n";
		}
	}
?>