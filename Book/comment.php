<?php
/**
 * Created by PhpStorm.
 * User: Hamid
 * Date: 12/16/2014
 * Time: 1:34 PM
 */
include("config.php");
connect();
session_start();
$user_name = $_SESSION['username'];
$name = $_SESSION["book_name_temp"];
//$new_rate = $_POST['rate'];

if(isset($_POST['sub']))
{
    unset($_POST['sub']);
    $new_comment = $_POST['new'];
    $sql = "INSERT INTO bookcomment VALUES ('$name', '$user_name', '$new_comment')";
    mysql_query($sql);
}

$error_flag;
if(isset($_POST['rate']))
{
    //$error_flag="";
    $sql = mysql_query("SELECT * FROM bookrate WHERE bookName = '$name' and username='$user_name' ")   or die(mysql_error());
    $new_rate = floatval( $_POST['rate'] );
    if (mysql_num_rows($sql)==0 && ($new_rate>0 && $new_rate<10)){

        mysql_query("INSERT INTO bookrate VALUES ('$name', '$user_name', '$new_rate')") or die(mysql_error());
        $error_flag = "نمره شما ثبت شد."    ;
    }

    else if (mysql_num_rows($sql)==0 && ($new_rate<0 || $new_rate>10))
        $error_flag = "نمره باید بین 1 تا 10 باشد.";

    else if((mysql_num_rows($sql)!=0) && ($new_rate>0 && $new_rate<10)){
        mysql_query("UPDATE bookrate SET rate = '$new_rate' WHERE bookName ='$name' AND username = '$user_name' ") or die(mysql_error());
        $error_flag = "نمره شما به روز شد.";
    }
    else if (mysql_num_rows($sql)!=0 && ($new_rate<0 || $new_rate>10))
        $error_flag = "نمره باید بین 1 تا 10 باشد.";
}

header("Location:book.php?x=$name && y=$error_flag");

?>

