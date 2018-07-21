<?php
session_start();
$notes = $_POST["notes"];
$n = $_SESSION["id"];
if(isset($_POST["submit"]))
{
	$con = mysqli_connect("localhost","root","","noteapp");
	$sql = "insert into note set user_id = '$n',note_con = '$notes'";
	mysqli_query($con,$sql);
	header("location:home.php?inserted=1");
}
?>