<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col col-12 col-sm-2">
<div class="col col-12 col-sm-8">
<div class="col col-12 col-sm-2">
</div>
</div>
</div>
<form method="POST">
<table class="table">
<tr>
    <td>movie name</td>
    <td><input name="name" class="form-control" type="text"></td>
</tr>
<tr>
    <td>actor name</td>
    <td><input name="aname" class="form-control" type="text"></td>
</tr>
<tr>
    <td>actress name</td>
    <td><input name="acname" class="form-control" type="text"></td>
</tr>
<tr>
    <td>director</td>
    <td><input name="dir" class="form-control" type="text"></td>
</tr>
<tr>
    <td>year of reliece</td>
    <td><input name="yr" class="form-control" type="text"></td>
</tr>
<tr>
    <td></td>
    <td><button name="btn" class="btn btn-danger">SUBMIT</button></td>
</tr>

</table>
</form>
</body>
</html>
<?php
if(isset($_POST["btn"]))
{
    $movie=$_POST["name"];
    $actor=$_POST["aname"];
    $actress=$_POST["acname"];
    $director=$_POST["dir"];
    $year=$_POST["yr"];
    $connection=new mysqli("localhost","root","","movies");
    $sql="INSERT INTO `movie`(`movie`, `actor`, `actress`, `director`, `year`)
     VALUES ( '$movie','$actor','$actress','$director',$year)";

     $result=$connection->query($sql);
    if($result===true)
    {
        echo "<script>alert('inserted successfully')</script>";

    }
    else
    {
        echo "<script>alert('error in insertion')</script>";
}
    
}
?>