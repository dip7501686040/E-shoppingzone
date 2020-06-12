<?php
$id=0;
$sql2="select user_id from user_id";
$r2=$db_handle->runQuery($sql2);
while($row=mysqli_fetch_array($r2))
{
$id=$row['user_id'];
}
$id1=$id+1;

$sql1="update user_id set user_id='".$id1."'";
$r1=$db_handle->runQuery($sql1);

$id="USER".$id;


?>