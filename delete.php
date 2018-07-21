<?php

$con = mysqli_connect("localhost","root","","noteapp");
$sql = "delete from note where note_id = ".$_GET["note_id"];
mysqli_query($con,$sql);
header("location:home.php?deleted=1");

?>