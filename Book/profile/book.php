<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>کتاب مورد نظر</title>
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
		    <li><a href = "#">خروج</a></li>
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
					<h2>کتاب های مرتبط</h2>
					<ul>
						<li><a href="#">پایگاه داده</a></li>
						
					</ul>
				</li>
				
				
			</ul>
		</div>
		<!-- start content -->
		
		<div class="content" >
			<a href="#"> حمید </a> این کتاب را معرفی کرده است.
			<br><br>
			<label>توضیحات معرف کتاب:</label><br>
			<div class="info">
			
				<p>
					این کتاب جزو کتاب های جذاب و خواندنی قرن اخیر است که نویسنده در آن سعی کرده است تا ما را با وقایع آن دوران آشنا کند.
				</p>
				
			</div>
			<br>
			<label>نظرات سایر کاربران:</label><br>
			<div class="comment">
				<a href="#"> حسن : </a>
				<p>
					کتاب بسیار قشنگ و آموزنده ای بود 
					بسیار متشکرم.یکبنسبخنثقخخخخخخخخخخلسکمبنیسکمثخلنثصگلنفثخ
				</p>
				<br>
				
				<a href="#"> سعید : </a>
				<p>
					من این کتاب را چند سال پیش خوانده ام ولی آنچنان خوشم نیومد :(
				</p>
			</div>
			
		</div>
		

		<!-- end content -->
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar">
			<ul>
				
				
				<li>
					<h2>مشخصات کتاب</h2>
					<ul>
						<li><a href="#">نام</a></li>
						<li><a href="#">نویسنده</a></li>
						<li><a href="#">سال انتشار</a></li>
						<li><a href="#">تعداد صفحات</a></li>
					</ul>
				</li>
				
				<li>
					<!--<form id="searchform" method="POST" action="..\autocomplete.php">
						<div>
							<h2>جستجو</h2>
							<input type="text" name="s" id="s" size="15" value="" />
						</div>
					</form>-->
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
