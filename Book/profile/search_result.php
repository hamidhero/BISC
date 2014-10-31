<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>?? ???</title>
<meta name="keywords" content="" />
<meta name="Soothing" content="" />
<link href="book.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="..\book.ico" />
<script type="text/javascript" src="..\jquery.js"></script>
<script type="text/javascript" src="..\jquery.autocomplete.js"></script>
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
<div id="wrapper">
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#"><span>BISC</span></a></h1><br><br><br><br><br><br><br><br>
		<h3>Book Information Sharing Center</h3>
	</div>
	<div id="menu">
		<ul id="main">
		    <li><a href = "#">??/a></li>
			<li><a href="#">?'? ? ?/a></li>
			<li><a href="#">??</a></li>
			<li><a href="#">??? ?/a></li>
			<li class="current_page_item"><a href="..\home.php">??/a></li>

		</ul>
	</div>
	
</div>
<!-- end header -->
	<!-- start page -->
	<div id="page">
		<div id="sidebar1" class="sidebar">
			<ul>
				<li>
					<h2>?? ? ??</h2>
					<ul>
						<li><a href="#">?????a></li>
						
					</ul>
				</li>
				
				
			</ul>
		</div>
		<!-- start content -->
		

		<!-- end content -->
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar">
			<ul>
				
				
				<li>
					<h2>?????</h2>
					<ul>
						<li><a href="#">?</a></li>
						<li><a href="#">???</a></li>
						<li><a href="#">????</a></li>
						<li><a href="#">°????'/a></li>
					</ul>
				</li>
				
				<li>
					<!--<form id="searchform" method="POST" action="..\autocomplete.php">
						<div>
							<h2>???h2>
							<input type="text" name="s" id="s" size="15" value="" />
						</div>
					</form>-->
					<div class ='search'>
			 
						<form method='POST' action='autocomplete.php'>
							??????
							<input type='checkbox' name='book' value='book'> ??  
							<input type='checkbox' name='writer' value='writer'> ??? 
							<input type='checkbox' name='year' value='year'> ???? 
							<input type='text' 	   name='tag' id='tag' size='20' >
							<input type='submit'   name='search' value= '???>
							
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
