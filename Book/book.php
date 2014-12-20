<?php
        include("config.php");
		connect();
		//require_once("comment.php");


        session_start();
		/*if(isset($_SESSION['username']))
		{
			$user = $_POST['username'];
			$nameOfBook = $_POST['name'];
		}*/
		/*$rate = $_GET['z'];*/


$name = $_GET['x'];
$_SESSION["book_name_temp"] = $name;
/*
		if(isset($_POST['rate']))
{
	$new_rate = $_POST['rate'];
	mysql_query("INSERT INTO bookrate VALUES ('$name', '$new_rate)");
}
else{echo "nooooooo";}
*/
		

		$rate = mysql_query("SELECT Rate FROM userbook WHERE bookName = '$name'")   or die(mysql_error());
		
		$writer = mysql_query("SELECT Writer FROM book WHERE Name = '$name'")   or die(mysql_error());
		$year = mysql_query("SELECT ProductionYear FROM book WHERE Name = '$name'")   or die(mysql_error());
		$genre = mysql_query("SELECT genre FROM book WHERE Name = '$name'")   or die(mysql_error());
		$page = mysql_query("SELECT PageNumber FROM book WHERE Name = '$name'")   or die(mysql_error());
		$introducer_comment = mysql_query("SELECT Comment FROM book WHERE Name = '$name'")   or die(mysql_error());
		
		$commenter = mysql_query("SELECT user FROM bookcomment WHERE bookName = '$name'")   or die(mysql_error());
		$commenter_comment = mysql_query("SELECT bookComment FROM bookcomment WHERE bookName = '$name'")   or die(mysql_error());
		
		$average_rate = mysql_query("SELECT rate FROM bookrate WHERE bookName = '$name'")   or die(mysql_error());
		

		
?>

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
		    <li><a href = "profile/logout.php">خروج</a></li>
			<li><a href="#">ارتباط با ما</a></li>
			<li><a href="#">خدمات</a></li>
			<li><a href="#">درباره ما</a></li>
			<li class="current_page_item"><a href="home.php">خانه</a></li>

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
			<?php
			$sql_b = "SELECT username from userbook WHERE BookName = '$name'";
			$introducer2 =mysql_query($sql_b);
			$introducer2 = mysql_result($introducer2 , 0);
			print("<a href='static_profile/profile.php?x=$introducer2'> $introducer2 </a><font face='A Afsaneh'> این کتاب را معرفی کرده است.</font>");
			?>
			<br><br>
			<label><font face="A Afsaneh">توضیحات معرف کتاب:</font></label><br>
			<div class="info">
			
				<p>
					<?php if($introducer_comment){ 
								while($row=mysql_fetch_array($introducer_comment))
									{
										echo $row['Comment']."\n";
									}
										} 
					
					?>
				</p>
				<?php
					$row = mysql_fetch_assoc($rate);
					echo 'نمره :' .$row['Rate'];
					
					
				?>
				
			</div>
			<br>
			<label><font face="A Afsaneh">نظرات سایر کاربران:</font></label><br>
			
			<div class="comment">
				<?php
				for ($i=0;$i!=mysql_num_rows($commenter_comment);$i++){
					$comment=mysql_result($commenter_comment,$i);
					$commenter_name=mysql_result($commenter,$i);
					
					print("<a href='static_profile/profile.php?x=$commenter_name'> $commenter_name </a>
						
                    
				<p> 
						$comment
				</p>
				
						");
																		}
				?>
				<br>
				
			</div>
			
			
			<form action="comment.php" method="post" dir="rtl" style="margin: 15px;">
				<h1><font face="A Afsaneh"> نظر جدید</font> </h1>    <br>
				<textarea cols="62" rows="6" id="new" name="new" placeholder="نظر شما در مورد این کتاب ..."></textarea> <br>
				<input name="sub" type="submit" value="ارسال" />

			</form>
			
			
			
			
		</div>
		<?php
			
		?>
		
		<!-- end content -->
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar">
			<ul>
				
				
				<li>
					<h2>مشخصات کتاب</h2>
					<ul>
						<li><font face='A Afsaneh' size='5px'>نام :  <?php echo $name; ?></font> </li>
						<li><font face='A Afsaneh' size='5px'><a href="#">نویسنده  :   
						<?php if($writer){ 
								while($row=mysql_fetch_array($writer))
									{
										echo $row['Writer']."\n";
									}
										} 
						?></font></li>

						<li><font face='A Afsaneh' size='5px'><a href="#">دسته بندی  :
								<?php if($genre){
									while($row=mysql_fetch_array($genre))
									{
										echo $row['genre']."\n";
									}
								}
								?></font></li>

						<li><font face='A Afsaneh' size='5px'><a href="#">سال انتشار  : 
						<?php if($year){ 
								while($row=mysql_fetch_array($year))
									{
										echo $row['ProductionYear']."\n";
									}
										} 
						?></font></li>
						<li><font face='A Afsaneh' size='5px'><a href="#">تعداد صفحات  : 
						<?php if($page){ 
								while($row=mysql_fetch_array($page))
									{
										echo $row['PageNumber']."\n";
									}
										} 
						?>
						</font></li>
						<li><font face='A Afsaneh' size='5px'><a href="#"> میانگین نمره بین   
						<?php 
						$sum=0;
						for ($i=0;$i!=mysql_num_rows($average_rate);$i++){
							$sum += mysql_result($average_rate,$i);
																		 }
						if(mysql_num_rows($average_rate) > 0){
							$ave =($sum / mysql_num_rows($average_rate));
						
							echo (mysql_num_rows($average_rate) .'   نفر '.$ave );
						
							}
						else{
							echo '0 نفر : 0';
							}
						 
						?>
						</font></li>
					</ul>
				</li>
				
				<li>
					<form action="comment.php" method="post" dir="rtl" style="margin: 15px;">
						<h1><font face="A Afsaneh"> شما هم نمره بدهید </font></h1><br>
						<input name="rate" type="text" size="3" placeholder="نمره از 10" />
						<input name="submit" type="submit" value="ارسال" /><br>
						<h3><font color="#7fff00">
						<?php
						if(isset($_GET['y'])){
							$error_flag = $_GET['y'];
							echo $error_flag;
							$error_flag = "";}
						else{
							echo "salam";
						}
						?>
							</font></h3>
					</form>
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
<!--
<div id="footer">
	<p class="copyright">&copy;&nbsp;&nbsp;2014 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">BISC GROUP</a>.</p>
</div>-->
</body>
</html>
