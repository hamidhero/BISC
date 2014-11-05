<?php
session_start();
include('config.php');
connect();
$q = $_SESSION["Term"];
echo "we are here in writers!";
$sql = mysql_query("SELECT writer from Book where writer like '%$q%'");
while($row=mysql_fetch_array($sql) )
{
$writer_name=$row['writer'];

$b_writer_name='<strong>'.$q.'</strong>';

$final_writer_name = str_ireplace($q, $b_writer_name, $writer_name);

?>
<div class="show" align="left">
<?php echo $final_writer_name; ?></span>&nbsp;<br/>
</div>

<?php
}

?>