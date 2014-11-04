<?php
include('config.php');
connect();
if($_POST)
{
$q=$_POST['search'];
$sql_res=mysql_query("select name from Book where name like '%$q%' ");
//$sql_res2=mysql_query("select writer from Book where writer like '%$q%' ");
while($row=mysql_fetch_array($sql_res) )
{
$book_name=$row['name'];
//$writer=$row['Writer'];
$b_book_name='<strong>'.$q.'</strong>';
//$b_writer='<strong>'.$q.'</strong>';
$final_book_name = str_ireplace($q, $b_book_name, $book_name);
//$final_writer = str_ireplace($q, $b_writer, $writer);
?>
<div class="show" align="left">
<span class="name"><?php echo $final_book_name/* ." by ".$final_writer*/; ?></span>&nbsp;<br/>
</div>
<?php
}
}
?>
