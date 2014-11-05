<?php
session_start();
echo '1'.$_POST["SearchB"];
if(isset($_POST["SearchB"])){
	$temp = $_POST["SearchB"];
	echo '2'.$temp;
	if($temp == "book")
	{
	echo '3 here';
	$target = "search_book";
	}
	else if($temp == "writer")
	{
		echo '4 here';
		$target = "search_writer";
	}
	else	{$target = "search_book";	echo '5 here';}
	}
else     {$target = "search_book";	echo '6 here';}
echo '7'.$target;
$q = $_POST["input"];
echo '8'.$q ;
$_SESSION["Term"] = $q;
echo '9'.$_SESSION["Term"];
if ($target == "search_writer")
{

/*<form method="GET" action="searchresult_writer.php">
<input type="hidden" name="input" value=<?php echo $Term ?> ></form>*/



header("location:searchresult_writer.php");
}
else 
{
	
/*<form method="GET" action="searchresult_book.php">
<input type="hidden" name="input" value=<?php echo $Term ?> >
</form>*/
header("location:searchresult_book.php");
}
?>