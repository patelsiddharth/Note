<?php
$n = $_POST["un"];
$e = $_POST["e"];
$p = $_POST["p"];
$cp = $_POST["cp"];

if(isset($_POST["submit"]))
{
	$con = mysqli_connect("localhost","root","","noteapp");
	$sql1 = "select * from user where email='$e'";
	$result = mysqli_query($con,$sql1);
	$count = mysqli_num_rows($result);
	if($count==0)
	{
		if($p == $cp)
		{
			$sql = "insert into user set name = '$n',email='$e',password='$p'";
			if(mysqli_query($con,$sql))
				header("location:home.php?registered=1");
		}
		else
		{
			header("location:signup.php?error=1");
		}
	}
	else
	{
		header("location:signup.php?alreadyexist=1");
	}
}
?>