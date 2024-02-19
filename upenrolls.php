<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>

<?php
include 'connect.php';

$id11=$_GET['updateid'][0];
$id21=$_GET['updateid'][1];
$sql="select * from enrolls where student_id=$id11 and course_id=$id21";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$sid=$row['student_id'];
$cid=$row['course_id'];


if(isset($_POST['submit'])){
  $sid=$_POST['studentid'];
  $cid=$_POST['courseid'];
  
  $sql="update enrolls set student_id=$sid,course_id='$cid' where student_id=$id11 and course_id=$id21 ";
  if($sid){
  $result=mysqli_query($con,$sql);
  }else{
    echo 'enter the correct values';
  }
  if($result){
    // echo 'updated successfully';
    header("location:denrolls.php?id[]={$id1}&id[]={$id2}");
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
  <title>Enrolls</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
 
    
</head>

<body>
<section>
  <div class="container">
    <h1 >Enter the details</h1><br><br>
    <form method="post">
      <div class="form-group">
        <label>Student id</label><br>
        <input type="number" class="form-control" placeholder="Enter Student id" name="studentid" value=<?php echo $sid;?>>
      </div><br>
      <div class="form-group">
        <label>Course id</label><br>
        <input type="number" class="form-control" placeholder="Enter Course id" name="courseid" value=<?php echo $cid;?>>
      </div><br>
       
      
      
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <br>
   
      <button  class="btn btn-primary" ><a href="denrolls.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light"> Back </a></button>
  </div>
</section>
</body>

</html>