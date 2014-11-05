<?php
include("config.php");

session_start();
connect();
$flag="";
if(isset($_POST['Logout'])) {

session_destroy();
header("location:home.php")  ;

}



if (isset($_POST["login"]))  {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $result = mysql_query("select password from users where Username = '$username' ") or die(mysql_error());
        if (mysql_num_rows($result)!=1){
            $flag='The User Name And/Or Password is incorrect!Please try again...';

	    }

        else if(mysql_result($result,0)==$password){
		    $_SESSION['username']=$username;
			header('location:profile/profile.php');
	    }

        else {
         $flag='The User Name And/Or Password is incorrect!Please try again... ';}

}

if (isset($_SESSION['username'])){

    $username =  $_SESSION['username'];
    $result = mysql_query("select * from users where Username='$username' ") or die(mysql_error());
    $first_name = mysql_result($result,0,3) or die(mysql_error());
    $last_name = mysql_result($result,0,4) or die(mysql_error());
    $email   =  mysql_result($result,0,2) or die(mysql_error());

    }

if (isset($_POST['send'])  )

{
     $first_name = $_POST['firstname'];
     $last_name = $_POST['lastname'] ;
     $e_mail =  $_POST['email']    ;
     $user_name = $_POST['username']  ;
     $passwd = $_POST['password']    ;
      $result = mysql_query("select * from users where Username='$user_name' or Email='$e_mail' ") or die(mysql_error()) ;
     if ($passwd!=$_POST['confirmpassword']){
       $flag="password and confirmpassword is not equal";
     }


     else if (mysql_num_rows($result)!=0) {
       $flag="email or username is reapited please insert another email or username" ;
        }

     else if (strlen($passwd) < 4){
       $flag="your password is weak atlesat password must be 4 lenght" ;
     }
     else {

     mysql_query("INSERT INTO users VALUES ('$user_name','$e_mail','$passwd','$first_name','$last_name')  ") or die(mysql_error()) ;


     if (mysql_affected_rows()){
             $_SESSION['username']=$user_name;
     }
     else {
       die("your insert information don't Successful")     ;
     }
          }



}


?>




<html lang="fa" dir="rtl">
	<head>
		<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>سایت اشتراک اطلاعات کتاب</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Rotating Words with CSS Animations" />
        <meta name="keywords" content="css3, animations, rotating words, sentence, typography" />
        <meta name="author" content="Codrops" />
		<link href='http://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="jquery_popup.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
		<!--<script type="text/javascript" src="jquery.autocomplete.js"></script>-->
		<style>
			.no-cssanimations .rw-wrapper .rw-sentence span:first-child{
				opacity: 1;
			}
		</style>
		
		<!--<script>
			$(document).ready(function(){
			$("#tag").autocomplete("autocomplete.php", 
			{
			selectFirst: true
			});
										});
		</script>
		-->
		<link rel="shortcut icon" href="book.ico" />
<!-- Starting from here -->
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "search.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#searchid').click(function(){
	jQuery("#result").fadeIn();
});
});
</script>
<style>	
/*#searchid
	{
		
		border:solid 1px #000;
		padding:10px;
		font-size:14px;
	}*/
	#result
	{
		top:35px;
		right:420px;
		position:absolute;
		width:130px;
		padding:5px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #61c4ea solid;
		background-color: white;
	}
	.show
	{
		padding:5px; 
		border-bottom:1px #999 dashed;
		font-size:12px; 
		height:20px;
	}
	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
</style>
	</head>

	<body>
		
	<section class="rw-wrapper">
			<h2 class="rw-sentence">
				<span>شما در این جا</span>
				<br />
				<span>می تونید</span>
				<div class="rw-words rw-words-1">
					<span>کتاب معرفی کنید...</span>
					<span>درباره کتاب های موجود نظر بدید...</span>
					<span>به کتاب ها نمره بدید...</span>
					<span>و...</span>
				</div>
				<br />
			</h2>
		</section>
		
		
	<!--	<div class ='search'>
			<font color='#FFFFFF'> 
						<form method='POST' action='autocomplete.php'>
							جستجو براساس
							<input type='checkbox' name='search' value='checkbox' id="search_1"> کتاب  
							<input type='checkbox' name='search' value='checkbox' id="search_2"> نویسنده 
							<input type='checkbox' name='search' value='checkbox' id="search_3"> سال انتشار 
							<input type='text' 	   name='tag' id='tag' size='20' >
							<input type='submit'   name='search' value= 'جستجو' >
							
						</form>
                        
			</font>
		</div>
		
		-->
    <div class="search2" >

       
        <form method="post" action="search_decision.php">
        <table width="639" style="color:white">
          <tr>
         <td width="196"><div align="left">جستجو بر اساس</div></td>
            <td width="54"><label>
              <input type="checkbox" name="SearchB" value="book" id="Search_0">
              کتاب</label></td>
     
            <td width="64"><label>
              <input type="checkbox" name="SearchB" value="writer" id="Search_1">
              نویسنده</label></td>
            <td width="85"><label>
              <input type="checkbox" name="SearchB" value="year" id="Search_2">
              سال انتشار</label></td>
               <td width="147"><input type="text" name="input" class="search" id="searchid" ></td>
               <td width="65"><input type="submit" name='search' value= 'جستجو'></td>
              
          </tr>
        </table>
        </form>
        <div id="result" >
        </div>
        </div>
        
<div class="bmenu" >
  <h2  style="margin-top:0px;"><font color="#e3e3e3">دسته بندی کتاب ها</font></h2>
			<ul>
				<li><a href="#">تاریخی</a></li>
				<li><a href="#">رمان</a></li>
				<li><a href="#">فلسفی</a></li>
				<li><a href="#">مذهبی</a></li>
				<li><a href="#">علمی</a></li>
				<li><a href="#">هنری</a></li>
				<li><a href="#">جغرافیا</a></li>
				<li><a href="#">سیاسی</a></li>
				<li><a href="#">اقتصاد</a></li>
				<li><a href="#">ادبیات</a></li>
				<li><a href="#">فرهنگی</a></li>
				<li><a href="#">آشپزی</a></li>
				<li><a href="#">پزشکی</a></li>
				<li><a href="#">صنعت</a></li>
    
			</ul>
		</div>
		
        <?php
         if (!isset($_SESSION['username'])) {
         print("
		<div>
			<form method='POST' action='' class='signinpart'>
				<ul>
					<li><input type='text' name='user' placeholder='نام کاربری' ></li>
					<li><input type='password' name='pass' placeholder='رمز عبور ' ></li>
					<li><input type='submit' name='login' value= 'ورود' ></li><br>
					<a href='#' id='onclick'>هنوز ثبت نام نکرده اید؟</a>
				</ul>
			</form>
			
        <br>
        <h4><font color='red'>$flag</font></h4>
        </div> ");
        }
        else{

        print("<div class='goToProfile'><a href='profile/profile.php'> $first_name  $last_name </a>
        <form method='post' action=''><input name='Logout' type='submit' value='خروج' /></form></div>");

        }
		      ?>
		
		
		
		
		<div id="contactdiv">
            <form class="form" method="post" action="" id="contact" accept-charset="UTF-8">
                <img src="button_cancel.png" class="img" id="cancel"/>
                <h3>فرم ثبت نام</h3>
                <hr/><br/>
                <label>نام: <span>*</span></label>
                <br/>
                <input type="text" id="firstname" name="firstname" placeholder="first name"/><br/>
                <br/>
                <label>نام خانوادگی: <span>*</span></label>
                <br/>
                <input type="text" name="lastname" id="lastname" lastname placeholder="last name"/><br/>
                <br/>
                <label>نام کاربری: <span>*</span></label>
                <br/>
                <input type="text" name="username" id="username" placeholder="user name"/><br/>
                <br/>
                <label>ایمیل:<span>*</span></label>
                <br/>
				<input type="text" name="email" id="email" placeholder="email"/><br/>
                <br/>
                <label>رمز عبور:<span>*</span></label>
                <br/>
				<input type="password" name="password" id="password" placeholder="password"/><br/>
                <br/>
				<label>تکرار رمز عبور:<span>*</span></label>
                <br/>				
				<input type="password" name="confirmpassword" id="confirmpassword" placeholder="confirm password"/><br/>
                <br/>
                <input type="submit" name="send" id="send" value="ارسال"/>
                <input type="submit" name="cancel" id="cancel" value="انصراف"/>
                <br/>
            </form>
        </div>	
		
		
		<!--<div style="height: 40px; width: 40 px; color: yellow;">
			;grtttttttw'grjklbmrglkbnr
		</div>>-->

		<div id="footer" dir="ltr" >
			<p class="copyright">&copy;&nbsp;&nbsp;2014 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">BISC</a>.</p>
		</div
	></body>
</html>