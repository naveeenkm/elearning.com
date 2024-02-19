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
$sql="select * from completes where student_id=$id11 and assign_id=$id21";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$sid=$row['student_id'];
$aid=$row['assign_id'];

if(isset($_POST['submit'])){
  $sid=$_POST['studentid'];
  $aid=$_POST['assignid'];
  $sql="update completes set student_id=$sid,assign_id=$aid where student_id=$id11 and assign_id=$id21 ";
  if($sid){
  $result=mysqli_query($con,$sql);
  }else{
    echo 'enter the correct values';
  }
  if($result){
    // echo 'updated successfully';
    header("location:dcompletes.php?id[]={$id1}&id[]={$id2}");
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
  <title>Completes</title>
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
        <label>Assignment id</label><br>
        <input type="number" class="form-control" placeholder="Enter Assignment id" name="assignid" value=<?php echo $aid;?>>
      </div><br>
       
      
      
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
    <br>

      <button  class="btn btn-primary" ><a href="dcompletes.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Back</a></button>
  </div>
</section>

</body>

</html>