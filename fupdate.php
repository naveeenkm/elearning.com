<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>
<?php
include 'connect.php';


$id = $_GET['updateid'];
$sql = "SELECT f.*, GROUP_CONCAT(l.course_id) AS course_ids 
        FROM faculty f
        LEFT JOIN lectures l ON f.faculty_id = l.faculty_id
        WHERE f.faculty_id = $id
        GROUP BY f.faculty_id";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$fid = $row['faculty_id'];
$fname = $row['faculty_name'];
$fage = $row['faculty_age'];
$fexp = $row['faculty_exp'];
$courseIds = $row['course_ids'];

if (isset($_POST['submit'])) {
    $fid = $_POST['fid'];
    $fname = $_POST['fname'];
    $fage = $_POST['fage'];
    $fexp = $_POST['fexp'];

    $sql = "UPDATE faculty SET faculty_id=$fid, faculty_name='$fname', faculty_age=$fage, faculty_exp=$fexp WHERE faculty_id=$id ";

    if ($fid) {
        $result = mysqli_query($con, $sql);
    } else {
        echo 'enter the correct values';
    }
    if ($result) {
      // Update existing associations
      $deleteCoursesSql = "DELETE FROM lectures WHERE faculty_id=$fid";
    mysqli_query($con, $deleteCoursesSql);

    // Insert the updated list of courses
    $courseIds = explode(',', $_POST['course_ids']);
    foreach ($courseIds as $courseid) {
        $insertCourseSql = "INSERT INTO lectures (faculty_id, course_id) VALUES ('$fid', '$courseid')";
        $resultInsert = mysqli_query($con, $insertCourseSql);

        // Check for foreign key constraint violation
        if (!$resultInsert) {
            // Handle the error, such as logging or displaying an error message
            echo "Error inserting course $courseid: " . mysqli_error($con);
        }
    }


        header("location:upfac.php?id[]={$id1}&id[]={$id2}");
    } else {
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
  <style>
    h1{ 
      text-align: center;
    }
    
  </style>
  <script>
 window.onload = function() {
  var registrationForm = document.getElementById('registration-form');

  // Check if the registration form exists
  if (registrationForm) {
    // Attach a submit event listener to the form
    registrationForm.addEventListener('submit', function(event) {
      // Prevent the default form submission
      event.preventDefault();

      var registrationSuccessMessage = document.getElementById('registration-success-message');

      // Display the message
      if (registrationSuccessMessage) {
        registrationSuccessMessage.style.display = 'block';

        // Hide the message after 10 seconds (adjust as needed)
        setTimeout(function() {
          registrationSuccessMessage.style.display = 'none';
          location.reload();
        }, 3000);
      }
    });
  }
};


</script>
</head>

<body>

  <section>
  
  <div class="container">
    <h1>Update Your Details</h1><br><br>
    <form method="post" >
    <div id="registration-success-message" class="alert alert-success" role="alert" style="display: none;">
        Updation successful!
      </div>
        <div class="form-group">
            <label>Faculty id</label><br>
            <input type="number" class="form-control" placeholder="Enter Faculty id" name="fid" value=<?php echo $fid;?>>
        </div><br>
        <div class="form-group">
            <label>Faculty Name</label><br>
            <input type="text" class="form-control" autocomplete="off" placeholder="Enter Faculty name" name="fname" value=<?php echo $fname;?>>
        </div><br>
        <div class="form-group">
            <label>Faculty age</label><br>
            <input type="number" class="form-control" placeholder="Enter Faculty age" name="fage"value=<?php echo $fage;?>>
        </div><br>
        <div class="form-group">
            <label>Faculty Experience</label><br>
            <input type="number" class="form-control" placeholder="Enter Faculty experience" name="fexp"value=<?php echo $fexp;?>>
        </div><br>
        <div class="form-group">
            <label>Course IDs (comma-separated)</label><br>
            <input type="text" class="form-control" placeholder="Enter Course IDs (comma-separated)" name="course_ids" value=<?php echo $courseIds;?>>
        </div><br>

        <button type="submit" class="btn btn-primary"   name="submit">Update</button>
    </form>


    <br>
    <button class="btn btn-primary "><a href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Cancel</a></button>
      
  </div>
  </section>
</body>

</html>