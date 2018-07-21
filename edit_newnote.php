<?php
session_start();
$notes = $_POST["notes"];
$noteid= $_POST["noteid"];

if(isset($_POST["sub"]))
{
	$con = mysqli_connect("localhost","root","","noteapp");
	$sql = "update note set note_con = '$notes' where note_id='$noteid'";
	mysqli_query($con,$sql);
	//echo $sql;
	//print_r($_GET["note_id"]);
	header("location:home.php?Note updated");
}
?>