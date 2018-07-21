<?php
session_start();
if(!isset($_SESSION["id"]))
{
    header("location:index.php");
    exit;
}
$con = mysqli_connect("localhost","root","","noteapp");
?>
<html>
<head>
	<title>NOTE APPLICATION - HOME</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse  navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
          <a class="navbar-brand" href="#">Notes</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li style="color:#9d9d9d;padding:16px 10px 0px 0px ; ">WELCOME&nbsp;&nbsp; 
              <?php 
              print_r($_SESSION["username"]);
              ?></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div>
    </div>
    </nav> 
    <div class="container" style="padding-top:100px">
      <form action="notes.php" method="post">
      <div class="form-group">
        <textarea placeholder="NOTES" class="form-control" name="notes" style="height: 100px;resize: none;"></textarea>
      </div>
      <button class="btn btn-info" name="submit">Submit</button>
      </form>
      <h3>Previous Notes</h3>
      <div class="card" style="width: 100%;">
        <ul class="list-group list-group-flush">        
              <?php
                  $con = mysqli_connect("localhost","root","","noteapp");
                  $sql = "select * from note where user_id = ".$_SESSION["id"];
                  $result = mysqli_query($con,$sql);
                  while($row = mysqli_fetch_assoc($result))
                  {
                      echo "<li class='list-group-item'style='height: 55px;line-height: 35px;'>".$row['note_con']."
                        <a href='delete.php?note_id=".$row['note_id']."' class='btn btn-danger' style='float: right;'>Delete</a>&nbsp;
                        <a href='edit.php?note_id=".$row['note_id']."' class='btn btn-warning' style='float: right;margin-right: 5px;
                        margin-top:0px;'>Edit</a>
                      </li>";
                  }
              ?>
        </ul>
      </div>
    </div>
</div>
</body>
</html>
<?php
if(isset($_GET["inserted"]))
{
    echo"<script>alert('New Note is added to the database.')</script>";
}
if(isset($_GET["deleted"]))
{
    echo"<script>alert('Note is deleted from the database.')</script>";
}

?>