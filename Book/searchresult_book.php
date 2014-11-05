<?php
session_start();
include('config.php');
connect();
$q = $_SESSION["Term"];
echo "we are here in books!";
$sql = mysql_query("SELECT name from Book where name like '%$q%'");
while($row=mysql_fetch_array($sql) )
{
$book_name=$row['name'];

$b_book_name='<strong>'.$q.'</strong>';

$final_book_name = str_ireplace($q, $b_book_name, $book_name);

?>
<div class="show" align="left">
<?php echo $final_book_name; ?></span>&nbsp;<br/>
</div>

<?php
}

?>