<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>

<?php
include 'connect.php';

$id=$_GET['updateid'];
$sql="select * from quiz where quiz_id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$qid=$row['quiz_id'];
$qgrade=$row['quiz_grade'];
$qdate=$row['quiz_date'];
$qtype=$row['quiz_type'];
$cid=$row['course_id'];

if(isset($_POST['submit'])){
  $qid=$_POST['quizid'];
  $qgrade=$_POST['quizgrade'];
  $qdate=$_POST['quizdate'];
  $qtype=$_POST['quiztype'];
  $cid=$_POST['courseid'];
  $sql="update quiz set quiz_id=$qid,quiz_grade='$qgrade',quiz_date='$qdate',quiz_type='$qtype',course_id=$cid where quiz_id=$id ";
  if($qid){
  $result=mysqli_query($con,$sql);
  }else{
    echo 'enter the correct values';
  }
  if($result){
    // echo 'updated successfully';
    header("location:dquiz.php?id[]={$id1}&id[]={$id2}");
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
  <title>quiz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
</head>

<body>
<section>
  <div class="container">
    <h1 >Enter the details</h1><br><br>
    <form method="post">
      <div class="form-group">
        <label>Quiz id</label><br>
        <input type="number" class="form-control" placeholder="Enter Quiz id" name="quizid" value=<?php echo $qid;?>>
      </div><br>
      <div class="form-group">
        <label>Quiz grade</label><br>
        <input type="text" class="form-control"   placeholder="Enter Quiz grade" name="quizgrade" value=<?php echo $qgrade;?>>
      </div><br>
      <div class="form-group">
        <label>Quiz date</label><br>
        <input type="date" class="form-control" placeholder="Enter Quiz date" name="quizdate" value=<?php echo $qdate;?>>
      </div><br>
      <div class="form-group">
        <label>Quiz type</label><br>
        <input type="text" class="form-control" placeholder="Enter Quiz type" name="quiztype" value=<?php echo $qtype;?>>
      </div><br>
      <div class="form-group">
        <label>Course id</label><br>
        <input type="number" class="form-control" placeholder="Enter Course id" name="courseid" value=<?php echo $cid;?>>
      </div><br>
      
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
    <br>

      <button  class="btn btn-primary" ><a href="dquiz.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Back </a></button>
  </div>
</section>
</body>

</html>