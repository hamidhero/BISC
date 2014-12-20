<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Soothing
Description: A three-column, fixed-width blog design.
Version    : 1.0
Released   : 20091003

-->


<?php
        include("../config.php");
        session_start();
        connect();
		$name = $_GET['x'];
	
		$first = mysql_query("SELECT first_name FROM users WHERE Username='$name'") or die(mysql_error());
		$last = mysql_query("SELECT last_name FROM users WHERE Username='$name'") or die(mysql_error());
		$book_num = mysql_query("SELECT Count(BookName) FROM userbook WHERE Username='$name'") or die(mysql_error());



?>



<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>پروفایل شخصی</title>
<meta name="keywords" content="" />
<meta name="Soothing" content="" />
<link href="profile.css" rel="stylesheet" type="text/css" media="screen" />
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
		    <li><a href = "..\profile/logout.php">خروج</a></li>
			<li><a href="#">ارتباط با ما</a></li>
			<li><a href="#">خدمات</a></li>
			<li><a href="#">درباره ما</a></li>
			<li class="current_page_item"><a href="..\home.php">خانه</a></li>

		</ul>
	</div>
	
</div>
<!-- end header -->
	<!-- start page -->
	<div id="page">
		<div id="sidebar1" class="sidebar">
			<ul>
				<li>
					<h2>کتاب های اخیر</h2>
					<ul>
                    <?php
         $result=mysql_query("select BookName from userbook where username='$name'")   or die(mysql_error());
         for ($i=0;$i!=mysql_num_rows($result);$i++){
           $book=mysql_result($result,$i);
           print("<li><a href='..\book.php?y=$name & x=$book'><font face='A Afsaneh' size='5px'>$book</font></a></li>");
						
                    }
                ?>

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
					<h2>مشخصات شما</h2>
					<ul>
                    <?php
                    $result=mysql_query("select count(BookName) from userbook where username='$name'")   or die(mysql_error());
                    $num=mysql_result($result,0);
					?>
                     
						<li><font face='A Afsaneh' size='5px'> 
							<?php if($first){ 
								while($row=mysql_fetch_array($first))
									{
										echo $row['first_name'];
									}
										} 
							?>
						</font></li>
						<li><font face='A Afsaneh' size='5px'>
							<?php if($last){ 
								while($row=mysql_fetch_array($last))
									{
										echo $row['last_name'];
									}
										} 
							?>
						</font></li>
						<li><font face='A Afsaneh' size='5px'>
							<?php if($name){ 
									echo $name;
									}
							?>
						</font></li>
						<li><font face='A Afsaneh' size='5px'>
							<?php echo $num;
							?>
						</font></li>
                          
					</ul>
				</li>
				
				<li>
					
					<div class ='search'>
			 
						<form method='POST' action='autocomplete.php'>
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
