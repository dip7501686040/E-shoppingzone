<?php
$id=0;
$sql2="select order_id from order_id";
$r2=$db_handle->runQuery($sql2);
while($row=mysqli_fetch_array($r2))
{
$id=$row['order_id'];
}
$id1=$id+1;

$sql1="update order_id set order_id='".$id1."'";
$r1=$db_handle->runQuery($sql1);

$id="ORDER".$id;


?>