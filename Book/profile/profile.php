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
        if (!isset($_SESSION['username'])){
            header("location:../home.php") ;

        }
        $flag="";
        $username =  $_SESSION['username'];
        connect();
        $result = mysql_query("select * from users where username='$username' ") or die(mysql_error());
        $first_name = mysql_result($result,0,3) or die(mysql_error());
        $last_name = mysql_result($result,0,4) or die(mysql_error());
        $email   =  mysql_result($result,0,2) or die(mysql_error());

        if(isset($_POST['publisher']) && isset($_POST['name']) && isset($_POST['year']) && isset($_POST['writer']) && isset($_POST['comment']) ){
            $username =  $_SESSION['username'];
            $name =  $_POST['name'];
            $Writer=$_POST['writer']   ;
            $year =   $_POST['year']  ;
            $publisher=$_POST['publisher'];
            $comment=$_POST['comment']  ;
            mysql_query("INSERT INTO book VALUES ('$name','$Writer','$year','$publisher','$comment')  ") or die(mysql_error());
            mysql_query("INSERT INTO userbook VALUES ('$username','$name',10)  ") or die(mysql_error());
            if (mysql_affected_rows()){
            $flag="your post Successful save ." ;

        }
        else{
              $flag="your post not Successful save .";
        }

        }




?>



<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>پروفایل شخصی</title>
<meta name="keywords" content="" />
<meta name="Soothing" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
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
		    <li><a href = "logout.php">خروج</a></li>
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
         $result=mysql_query("select BookName from userbook where username='$username'")   or die(mysql_error());
         for ($i=0;$i!=mysql_num_rows($result);$i++){
           $book=mysql_result($result,$i);
           print("<li><a href='#'>$book</a></li>");

                    }
                ?>

					</ul>
				</li>
				
				
			</ul>
		</div>
		<!-- start content -->
		
		<div id="content">
			<form action="" method="post" dir="rtl">
				<legend> معرفی کتاب جدید </legend>      <br>
				<input type="text" name="name" placeholder="نام کتاب" /> <br>
				<input type="text" name="writer" placeholder="نام نویسنده" /> <br>
				<input type="text" name="year" placeholder="سال انتشار" /> <br>
				<input type="text" name="publisher" placeholder="انتشارات" /> <br>
				<textarea cols="25" rows="5" name="comment" placeholder="نظر شما در مورد این کتاب ..."></textarea> <br>
				<input name="submit" type="submit" value="ثبت" />
			</form>
		</div>

		<!-- end content -->
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar">
			<ul>
				
				
				<li>
					<h2>مشخصات شما</h2>
					<ul>
                    <?php
                    $result=mysql_query("select count(BookName) from userbook where username='$username'")   or die(mysql_error());
                    $num=mysql_result($result,0)    ;
                       print("
						<li><a href='#'>$first_name</a></li>
						<li><a href='#'></a>$last_name</li>
						<li><a href='#'>$username</a></li>
						<li><a href='#'>$num</a></li>
                          ");
                        ?>
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
