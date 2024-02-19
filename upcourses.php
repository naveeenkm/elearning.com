<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>

<?php
include 'connect.php';

$id=$_GET['updateid'];
$sql="select * from courses where course_id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$cid=$row['course_id'];
$cname=$row['course_name'];
$stdate=$row['start_date'];
$endate=$row['end_date'];

if(isset($_POST['submit'])){
  $cid=$_POST['cid'];
  $cname=$_POST['coursename'];
  $stdate=$_POST['startdate'];
  $endate=$_POST['enddate'];
  $sql="update courses set course_id=$cid,course_name='$cname',start_date='$stdate',end_date='$endate' where course_id=$id ";
  if($cid){
  $result=mysqli_query($con,$sql);
  }else{
    echo 'enter the correct values';
  }
  if($result){
    // echo 'updated successfully';
    header("location:dcourses.php?id[]={$id1}&id[]={$id2}");
  }
else{
  die(mysqli_error($con));
}
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>faculty table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
</head>

<body>
  <section>
  
 
  <div class="container">
    <h1 >Enter the details</h1><br><br>
    <form method="post">
      <div class="form-group">
        <label>Course id</label><br>
        <input type="number" class="form-control" placeholder="Enter Course id" name="cid" value=<?php echo $cid;?>>
      </div><br>
      <div class="form-group">
        <label>Course name</label><br>
        <input type="text" class="form-control"   placeholder="Enter Course name" name="coursename"  value=<?php echo $cname;?>>
      </div><br>
      <div class="form-group">
        <label>Start date</label><br>
        <input type="date" class="form-control" placeholder="Enter Start date" name="startdate" value=<?php echo $stdate;?>>
      </div><br>
      <div class="form-group">
        <label>End date</label><br>
        <input type="date" class="form-control" placeholder="Enter End date" name="enddate" value=<?php echo $endate;?>>
      </div><br>
      
      
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
    <br>
    <button  class="btn btn-primary" ><a href="dcourses.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Back </a></button>
  </div>
</section>
</body>

</html>