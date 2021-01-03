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
    <td></td>
    <td><button name="btn" class="btn btn-danger">SEARCH</button></td>
</tr>

</table>
</form>
</body>
</html>
<?php
if(isset($_POST["btn"]))
{
    $movie=$_POST["name"];
    $connection=new mysqli("localhost","root","","movies");
    $sql="SELECT `id`, `movie`, `actor`, `actress`, `director`, `year` FROM `movie` WHERE `movie`='$movie'";
    $result=$connection->query($sql);
    if($result->num_rows>0)
    {
    while($row=$result->fetch_assoc())
    {
        $getactor=$row['actor'];
        $getactress=$row['actress'];
        $getdirector=$row['director'];
        $getyear=$row['year'];
        $getid=$row['id'];

        echo "<form method='POST'>
        <table class='table'>
        <tr>
            <td>id</td>
            <td><input type='text' name='newid' class='form-control' value='$getid'></td>
        </tr>
        <tr>
            <td>actor</td>
            <td><input type='text' name='newactor' class='form-control' value='$getactor'></td>
        </tr>
        <tr>
            <td>actress</td>
            <td><input type='text' name='newactress' class='form-control' value='$getactress'></td>
        </tr>
        <tr>
        <td>director</td>
        <td><input type='text' name='newdirector' class='form-control' value='$getdirector'></td>
    </tr>
    <tr>
            <td>year</td>
            <td><input type='text' name='newyear' class='form-control' value='$getyear'></td>
        </tr>
        <tr>
        <td></td>
        <td><button name='upbtn' class='btn btn-info'>DELETE</button></td>
        </tr>
        </table>
        </form> ";


    }
}
else
{
    echo "no movie founded";
}

}
if(isset($_POST['upbtn']))
{
$newactor=$_POST['newactor'];
$newactress=$_POST['newactress'];
$newdirector=$_POST['newdirector'];
$newyear=$_POST['newyear'];
$newid=$_POST['newid'];
$connection=new mysqli("localhost","root","","movies");
$sql="DELETE FROM `movie` WHERE `id`='$newid'";
$result=$connection->query($sql);
if($result===TRUE)
{
    echo "deleted successfully";
}
else
{
echo "error in deletion";
}
}
?>








