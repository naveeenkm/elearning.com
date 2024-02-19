<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>
<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $assignid=$_POST['aid'];
  $assigndur=$_POST['assigndur'];
  $assignmarks=$_POST['assignmarks'];
  $courseid=$_POST['cid'];
  $certificateid=$_POST['ccid'];
  $sql="insert into `assignment`(assign_id,assign_dur,assign_marks,course_id,certificate_id)
  values('$assignid','$assigndur','$assignmarks','$courseid','$certificateid')";
  $result=mysqli_query($con,$sql);
  if($result){
    header("location:dassignment.php?id[]={$id1}&id[]={$id2}");
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
        <input type="number" class="form-control" placeholder="Enter Assignment id" name="aid">
      </div><br>
      <div class="form-group">
        <label>Assignment duration</label><br>
        <input type="text" class="form-control"   placeholder="Enter Assignment duration" name="assigndur">
      </div><br>
      <div class="form-group">
        <label>Assignment marks</label><br>
        <input type="number" class="form-control" placeholder="Enter Assignment marks" name="assignmarks">
      </div><br>
      <div class="form-group">
        <label>Course id</label><br>
        <input type="number" class="form-control" placeholder="Enter Course id" name="cid">
      </div><br>
      <div class="form-group">
        <label>Certificate id</label><br>
        <input type="number" class="form-control" placeholder="Enter Certificate id" name="ccid">
      </div><br>
      
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <br>
    <button class="btn btn-primary "><a href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Entites</a></button>
      <button  class="btn btn-primary" ><a href="dassignment.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light"> Display </a></button>
  </div>
</section>
</body>

</html>