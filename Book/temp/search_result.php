<?php
include("config.php");

session_start();
connect();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>نتایج جستجو</title>
<meta name="keywords" content="" />
<meta name="Soothing" content="" />
<link href="book.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="..\book.ico" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
<script>
			$(document).ready(function(){
			$("#tag").autocomplete("autocomplete.php", 
			{
			selectFirst: true
			});
										});
		</script>
</head>

<body>
<?php
$q=$_GET['q'];

$my_data=mysql_real_escape_string($q);
$sql="SELECT Name FROM Book WHERE Name LIKE '%$my_data%' ORDER BY Name";
$result = mysql_query($sql) or die(mysqli_error());
if($result)
	{
		while($row=mysql_fetch_array($result))
		{
			echo $row['Name']."\n";
		}
	}	
	print("<h1>sfasdasd</h1>");
	
?>
<div id="wrapper">
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#"><span><font face="Umar Base">BISC</font></span></a></h1><br><br><br><br><br><br><br><br>
		<h3><font face="why so serious">Book Information Sharing Center</font></h3>
	</div>
	<div id="menu">
		<ul id="main">
		    <li><a href = "#">خروج</a></li>
			<li><a href="#">ارتباط با ما</a></li>
			<li class="current_page_item"><a href="..\home.php">خانه</a></li>

		</ul>
	</div>
	
</div>

<!-- end header -->
	<!-- start page -->
	<!--<div id="page">
		
		 start content 
		<div class="search_result">
			<div class="line">
			<a href="#"><div class="result_box">
				<h1> فرهنگ برهنگی وبرهنگی فرهنگی </h1>
				<h1> حداد عادل </h1>
				<h1> 1355 </h1>
				<h1>اجتماعی</h1>
				<h1>269 صفحه</h1>
			</div></a>
			<a href="#"><div class="result_box">
				<h1> فرهنگ برهنگی وبرهنگی فرهنگی </h1>
				<h1> حداد عادل </h1>
				<h1> 1355 </h1>
				<h1>اجتماعی</h1>
				<h1>269 صفحه</h1>
			</div></a>
			<a href="#"><div class="result_box">
				<h1> فرهنگ برهنگی وبرهنگی فرهنگی </h1>
				<h1> حداد عادل </h1>
				<h1> 1355 </h1>
				<h1>اجتماعی</h1>
				<h1>269 صفحه</h1>
			</div></a>
			<a href="#"><div class="result_box">
				<h1> فرهنگ برهنگی وبرهنگی فرهنگی </h1>
				<h1> حداد عادل </h1>
				<h1> 1355 </h1>
				<h1>اجتماعی</h1>
				<h1>269 صفحه</h1>
			</div></a>
			<a href="#"><div class="result_box">
				<h1> فرهنگ برهنگی وبرهنگی فرهنگی </h1>
				<h1> حداد عادل </h1>
				<h1> 1355 </h1>
				<h1>اجتماعی</h1>
				<h1>269 صفحه</h1>
			</div></a>
			<a href="#"><div class="result_box">
				<h1> فرهنگ برهنگی وبرهنگی فرهنگی </h1>
				<h1> حداد عادل </h1>
				<h1> 1355 </h1>
				<h1>اجتماعی</h1>
				<h1>269 صفحه</h1>
			</div></a>
			<a href="#"><div class="result_box">
				<h1> فرهنگ برهنگی وبرهنگی فرهنگی </h1>
				<h1> حداد عادل </h1>
				<h1> 1355 </h1>
				<h1>اجتماعی</h1>
				<h1>269 صفحه</h1>
			</div></a>
			<a href="#"><div class="result_box">
				<h1> فرهنگ برهنگی وبرهنگی فرهنگی </h1>
				<h1> حداد عادل </h1>
				<h1> 1355 </h1>
				<h1>اجتماعی</h1>
				<h1>269 صفحه</h1>
			</div></a>
			</div>
		</div>

	 end content -->
		<!-- start sidebars -->
			<font face="A Afsaneh">
					<div class ='search'>
			 
						<form method='POST'>
							جستجو براساس
							<input type='checkbox' name='book' value='book'> کتاب
							<input type='checkbox' name='writer' value='writer'> نویسنده 
							<input type='checkbox' name='year' value='year'> سال انتشار  
							<input type='text' 	   name='tag' id='tag' size='20' >
							<input type='submit'   name='search' value= 'جستجو' >
							
						</form>
                        
			</font>
		</div>
				</li>
				
			</ul>
		</div>
		<!-- end sidebars -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end page -->
</div>
<div id="footer">
	<p class="copyright">&copy;&nbsp;&nbsp;2014 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">BISC GROUP</a>.</p>
</div>
</body>
</html>
