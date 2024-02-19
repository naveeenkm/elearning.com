<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>

<?php
include 'connect.php';

$id=$_GET['updateid'];
$sql="select * from assignment where assign_id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$aid=$row['assign_id'];
$adur=$row['assign_dur'];
$amarks=$row['assign_marks'];
$cid=$row['course_id'];
$ceid=$row['certificate_id'];

if(isset($_POST['submit'])){
  $aid=$_POST['aid'];
  $adur=$_POST['assigndur'];
  $amarks=$_POST['assignmarks'];
  $cid=$_POST['cid'];
  $ceid=$_POST['ccid'];
  $sql="update assignment set assign_id=$aid,assign_dur='$adur',assign_marks=$amarks,course_id=$cid,certificate_id=$ceid where assign_id=$id ";
  if($aid){
  $result=mysqli_query($con,$sql);
  }else{
    echo 'enter the correct values';
  }
  if($result){
    // echo 'updated successfully';
    header("location:dassignment.php?id[]={$id1}&id[]={$id2}");
  }
else{
  die(mysqli_error($con));
}
}?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assignment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
</head>

<body>
  <section>
    <div class="container">
    <h1 >Enter the details</h1><br><br>
    <form method="post">
      <div class="form-group">
        <label>Assignment id</label><br>
        <input type="number" class="form-control" placeholder="Enter Assignment id" name="aid" value=<?php echo $aid;?>>
      </div><br>
      <div class="form-group">
        <label>Assignment duration</label><br>
        <input type="text" class="form-control"   placeholder="Enter Assignment duration" name="assigndur" value=<?php echo $adur;?>>
      </div><br>
      <div class="form-group">
        <label>Assignment marks</label><br>
        <input type="number" class="form-control" placeholder="Enter Assignment marks" name="assignmarks" value=<?php echo $amarks;?>>
      </div><br>
      <div class="form-group">
        <label>Course id</label><br>
        <input type="number" class="form-control" placeholder="Enter Course id" name="cid" value=<?php echo $cid;?>>
      </div><br>
      <div class="form-group">
        <label>Certificate id</label><br>
        <input type="number" class="form-control" placeholder="Enter Certificate id" name="ccid" value=<?php echo $ceid;?>>
      </div><br>
      
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
    <br>
    <br>
    <button  class="btn btn-primary" ><a href="dassignment.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Back </a></button>

  </div>
</section>
</body>

</html>