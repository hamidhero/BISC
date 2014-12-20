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
		$edit_flag = "";
        $flag="";
        $username =  $_SESSION['username'];
        connect();
        $result = mysql_query("select * from users where username='$username' ") or die(mysql_error());
        $first_name = mysql_result($result,0,3) or die(mysql_error());
        $last_name = mysql_result($result,0,4) or die(mysql_error());
        $email   =  mysql_result($result,0,1) or die(mysql_error());
		$password = mysql_result($result,0,2) or die(mysql_error());

        if(isset($_POST['page']) && isset($_POST['name']) && isset($_POST['year']) && isset($_POST['writer']) && isset($_POST['comment']) && isset($_POST['rate'])){
            $username =  $_SESSION['username'];
            $name =  $_POST['name'];
			$rate = $_POST['rate'];
			
            $writer=$_POST['writer'];
            $year =   $_POST['year'];
            $comment=$_POST['comment'];
			$page=$_POST['page'];
			$genre=$_POST['genre'];
			//var_dump($_POST);
			
            mysql_query("INSERT INTO book VALUES ('{$name}','{$writer}','{$year}','{$comment}', '{$page}', '{$genre}')  ") or die(mysql_error());
            mysql_query("INSERT INTO userbook VALUES ('$username','$name','$rate')  ") or die(mysql_error());
			mysql_query("INSERT INTO bookrate VALUES('$name', '$username', '$rate')	") or die(mysql_error());
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

<script type="text/javascript" src="jquery_popup.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>


<link href="profile.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="..\book.ico" />

<script>
			$(document).ready(function(){
			$("#tag").autocomplete("autocomplete.php", 
			{
			selectFirst: true
			});
										});
</script>
		
<script type="text/javascript">
//----- jquery popup window ---------
function setPosVer(){
var $popupWin =$('.popup-win');
var popupWinWidth=$popupWin.width();
$popupWin.css('left',$popupWin.parent().width()/2-$popupWin.width()/2);
};
function setPosHor(){
var $popupWin =$('.popup-win');
var popupWinHeight=$popupWin.height();
$popupWin.css('top',$(window).height()/2-$popupWin.height()/2);
};
$(function(){
setPosVer();
setPosHor();
$('.show-popup').click(function(){
$('.popup-screen').fadeIn(300,function(){
$('.popup-win').slideDown();
});
});
$('.close-btn').click(function(){
$('.popup-win').slideUp(300,function(){
$('.popup-screen').fadeOut();
});
});
});
$(window).resize(function(){
setPosVer();
setPosHor();
});

</script> 




<meta charset="utf-8">
<link rel="stylesheet" href="pop/css/jquery.popup.css" type="text/css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="pop/js/jquery.popup.js"></script>
<script type="text/javascript">
    $(function() {
      $(".js__p_start, .js__p_another_start").simplePopup();
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
					
         $result=mysql_query("select BookName from userbook where Username='$username'")   or die(mysql_error());
		 $rate_result = mysql_query("select Rate from userbook where Username='$username'")   or die(mysql_error());
         for ($i=0;$i!=mysql_num_rows($result);$i++){
           $book=mysql_result($result,$i);
		   $rating=mysql_result($rate_result,$i);
           print("<li><a href='../book.php ?x=$book'> <font face='A Afsaneh' size='5px'>$book</font></a></li>");
						
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
				<input type="text" name="name" placeholder="نام کتاب" /> <br><br>
				<input type="text" name="writer" placeholder="نام نویسنده" /> <br><br>
				<select name="genre">
					<option value="" disabled selected>
						----دسته بندی----
					</option>
					<option value="اجتماعی">
						اجتماعی
					</option>
					<option value="ادبیات">
						ادبیات
					</option value="اقتصاد">
					<option>
						اقتصاد
					</option>
					<option value="تاریخ">
						تاریخ
					</option>
					<option value="جغرافیا">
						جغرافیا
					</option>
					<option value="داستان کوتاه ">
						داستان کوتاه 
					</option>
					<option value="رمان">
						رمان
					</option>
					<option value="سیاست">
						سیاست
					</option>
					<option value="علمی">
						علمی
					</option>
					<option value="فرهنگ">
						فرهنگ
					</option>
					<option value="فلسفه">
						فلسفه
					</option>
					<option value="مذهبی">
						مذهبی
					</option>
					<option value="هنر">
						هنر
					</option>
				</select><br><br>
				<input type="text" name="year" placeholder="سال انتشار" /> <br><br>
				<input type="text" name="page" placeholder="تعداد صفحات" /> <br><br>
				<input type="text" name="rate" placeholder="نمره از 10" /> <br><br>
				<textarea cols="35" rows="6" name="comment" placeholder="نظر شما در مورد این کتاب ..."></textarea> <br><br>
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
						<li><font face='A Afsaneh' size='5px'> $first_name </font></li>
						<li><font face='A Afsaneh' size='5px'>$last_name</font></li>
						<li><font face='A Afsaneh' size='5px'>$username</font></li>
						<li><font face='A Afsaneh' size='5px'>$num</font></li>
                          ");
                        ?>
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
				<br><br>
				<?php
				if (isset($_POST['firstname']))
				{
					$change_first_name = $_POST['firstname'];
					mysql_query("UPDATE users SET first_name = '$change_first_name' WHERE Username = '$username' ");
					$edit_flag = "اطلاعات شما به روز شد.";
				}

				if (isset($_POST['lastname']))
				{
					$change_last_name = $_POST['lastname'] ;
					mysql_query("UPDATE users SET last_name = '$change_last_name' WHERE Username = '$username' ");
					$edit_flag = "اطلاعات شما به روز شد.";
				}

				if (isset($_POST['password']))
				{
					if (isset($_POST['confirmpassword']))
					{
						if($_POST['password'] == $_POST['confirmpassword'])
						{
							$change_passwd = $_POST['password'];
							mysql_query("UPDATE users SET Password = '$change_passwd' WHERE Username = '$username' ");
							$edit_flag = "اطلاعات شما به روز شد.";
						}
						else
							//die("password is not matched");
							$edit_flag = "رمز عبور ها با هم مطابقت ندارند.";
					}
					else
						//die("confirm password");
						$edit_flag = "لطفاٌ رمزعبور خود را تأیید کنید";

				}

				if (isset($_POST['email']))
				{
					$change_email = $_POST['email']  ;
					mysql_query("UPDATE users SET Email = '$change_email' WHERE Username = '$username' ");
					$edit_flag = "اطلاعات شما به روز شد.";
				}


				?>
				<li>
					<div class="p_anch"> <a href="#" class="js__p_start"><font face="A Afsaneh" color="white"> ویرایش اطلاعات </font></a></div>
					<div class="p_body js__p_body js__fadeout"></div>
					<div class="popup js__popup js__slide_top"> <a href="#" class="p_close js__p_close" title="Close"></a>
					<div class="p_content">

						<form action="" method="post" dir="rtl">
							<h3><font face="A Afsaneh"> فرم ویرایش </font></h3>
							<?php
								if(isset($_POST['send_edit'])) {
									echo $edit_flag;
									$edit_flag = "";
								}
								else
								{
							?>

									نام:<input type='text' id='firstname' name='firstname' value = <?php echo $first_name ?>/><br/>
								 	نام خانوادگی:<input type='text' id='lastname' name='lastname' value = '<?php echo $last_name ?>'/><br/>

							ایمیل:<input type='text' name='email' id='email' value ='<?php echo $email ?>'/><br/>
							رمز عبور:	<input type='password' name='password' id='password' value ='<?php echo $password ?>'/><br/>
							تکرار رمز عبور:	<input type='password' name='confirmpassword' id='confirmpassword' value ='<?php echo $password ?>'/><br/>
									<br/>
									<input type='submit' name='send_edit' id='send' value='ارسال'/>
								<?php
								}
							?><br>

						</form>

					</div>
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
	<p class="copyright">2014 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">BISC GROUP</a>.</p>
</div>
</body>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>
