
<?php
if (isset($_GET['id']) && is_array($_GET['id'])) {
    $id1 = $_GET['id'][0];
    $id2 = $_GET['id'][1];
    include 'connect.php';
}
include 'connect.php';

if(isset($_POST['submit'])){
  $sid=$_POST['sid'];
  $firstname=$_POST['firstname'];
  $lname=$_POST['lastname'];
  $studentage=$_POST['studentage'];
  $studentgender=$_POST['studentgender'];
  $sql="insert into student(student_id,fname,lname,student_age,student_gender)
  values('$sid','$firstname','$lname','$studentage','$studentgender')";
  $result=mysqli_query($con,$sql);


  $studentPhoneNumbersArray = explode(',', $_POST['studentphonenumbers']);

  
  $courseIdsArray = explode(',', $_POST['courseids']);

  
  foreach ($studentPhoneNumbersArray as $studentphno) {
      $sql1 = "INSERT INTO student_student_phno (student_phno, student_id) VALUES ('$studentphno', '$sid')";
      $result1 = mysqli_query($con, $sql1);

      if (!$result1) {
          die(mysqli_error($con));
      }
  }

  foreach ($courseIdsArray as $courseid) {
      $sql2 = "INSERT INTO enrolls (student_id, course_id) VALUES ('$sid', '$courseid')";
      $result2 = mysqli_query($con, $sql2);

      if (!$result2) {
          die(mysqli_error($con));
      }
      $sql3 = "
            INSERT INTO Completes (student_id, assign_id)
            SELECT DISTINCT e.student_id, a.assign_id
            FROM Enrolls e
            JOIN Assignment a ON e.course_id = a.course_id
            WHERE e.course_id = '$courseid' AND e.student_id = '$sid';
        ";
        $result3 = mysqli_query($con, $sql3);

        if (!$result3) {
            die(mysqli_error($con));
        }
  }


  if($result and $result1  and $result2) {
    
    header("location:student.php?id[]={$id1}&id[]={$id2}");
    
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
  <title>Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
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
  <form method="post" >
  <div id="registration-success-message" class="alert alert-success" role="alert" style="display: none;">
        Registration successful!
      </div>
  
    <h1>Enter the details</h1><br><br>
    <div class="form-group">
        <label>Student id</label><br>
        <input type="number" class="form-control" placeholder="Enter Student id" name="sid">
    </div><br>
    <div class="form-group">
        <label>First name</label><br>
        <input type="text" class="form-control" placeholder="Enter First name" name="firstname">
    </div><br>
    <div class="form-group">
        <label>Last name</label><br>
        <input type="text" class="form-control" placeholder="Enter Last name" name="lastname">
    </div><br>
    <div class="form-group">
        <label>Student age</label><br>
        <input type="number" class="form-control" placeholder="Enter Student age" name="studentage">
    </div><br>
    <div class="form-group">
        <label>Student gender</label><br>
        <input type="text" class="form-control" placeholder="Enter Student gender" name="studentgender">
    </div><br>

    <!-- Add input fields for multiple student phone numbers -->
    <div class="form-group">
        <label>Student phone numbers (comma-separated)</label><br>
        <input type="text" class="form-control" placeholder="Enter Student phone numbers (comma-separated)" name="studentphonenumbers">
    </div><br>

    <!-- Add input fields for multiple course IDs -->
    <div class="form-group">
        <label>Course IDs (comma-separated)</label><br>
        <input type="text" class="form-control" placeholder="Enter Course IDs (comma-separated)" name="courseids">
    </div><br>
    <button type="submit" class="btn btn-primary"  name="submit">Register</button>

</form>


    <br>
    <button class="btn btn-primary "><a href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Cancel</a></button>
      
  </div>
</section>

      

</body>

</html>