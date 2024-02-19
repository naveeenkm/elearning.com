<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>

<?php
include 'connect.php';

  
$id = $_GET['updateid'];

$sql = "SELECT s.*, GROUP_CONCAT(ssp.student_phno) AS phone_numbers, GROUP_CONCAT(e.course_id) AS course_ids
            FROM student s
            LEFT JOIN student_student_phno ssp ON s.student_id = ssp.student_id
            LEFT JOIN enrolls e ON s.student_id = e.student_id
            WHERE s.student_id = $id
            GROUP BY s.student_id";
   
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$sid = $row['student_id'];
$fname = $row['fname'];
$lname = $row['lname'];
$sage = $row['student_age'];
$sgender = $row['student_gender'];

$phoneNumbers =  $row['phone_numbers'];
$courseIds = $row['course_ids'];

if (isset($_POST['submit'])) {
    $sid = $_POST['sid'];
    $firstname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $studentage = $_POST['studentage'];
    $studentgender = $_POST['studentgender'];
  
    
    $sql = "UPDATE student SET fname='$firstname', lname='$lname', student_age='$studentage', student_gender='$studentgender' WHERE student_id='$sid'";
    $result = mysqli_query($con, $sql);
  
    
    if ($result) {
  
    
    $sqlDeletePhones = "DELETE FROM student_student_phno WHERE student_id = '$sid'";
    $resultDeletePhones = mysqli_query($con, $sqlDeletePhones);
    $studentPhoneNumbersArray = explode(',', $_POST['studentphonenumbers']);
    if (!$resultDeletePhones) {
        die(mysqli_error($con));
    }
    foreach ($studentPhoneNumbersArray as $studentphno) {
        
        $sqlCheckPhone = "SELECT * FROM student_student_phno WHERE student_id = '$sid' AND student_phno = '$studentphno'";
        $resultCheckPhone = mysqli_query($con, $sqlCheckPhone);
    
        if (!$resultCheckPhone) {
            die(mysqli_error($con));
        }
    
        // If the phone number exists, update it; otherwise, insert a new record
        if (mysqli_num_rows($resultCheckPhone) > 0) {
            $sqlInsertPhone = "UPDATE student_student_phno SET student_phno = '$studentphno' WHERE student_id = '$sid'";
        } else {
            $sqlInsertPhone = "INSERT INTO student_student_phno (student_phno, student_id) VALUES ('$studentphno', '$sid')";
        }
    
        $resultInsertPhone = mysqli_query($con, $sqlInsertPhone);
    
        if (!$resultInsertPhone) {
            die(mysqli_error($con));
        }
    }
    
    $sqlDeleteCourses = "DELETE FROM enrolls WHERE student_id = '$sid'";
    $resultDeleteCourses = mysqli_query($con, $sqlDeleteCourses);
    
    if (!$resultDeleteCourses) {
        die(mysqli_error($con));
    }
    
    $courseIdsArray = explode(',', $_POST['courseids']);
    
   
    
    foreach ($courseIdsArray as $courseid) {
        $sqlInsertCourse = "INSERT INTO enrolls (student_id, course_id) VALUES ('$sid', '$courseid')";
        $resultInsertCourse = mysqli_query($con, $sqlInsertCourse);
    
        if (!$resultInsertCourse) {
            die(mysqli_error($con));
        }
    }
    $sqlDeleteCourses = "DELETE FROM completes WHERE student_id = '$sid'";
    $resultDeleteCourses = mysqli_query($con, $sqlDeleteCourses);
    
    if (!$resultDeleteCourses) {
        die(mysqli_error($con));
    }
    foreach ($courseIdsArray as $courseid) {
        $sql3 = "
            INSERT INTO Completes (student_id, assign_id)
            SELECT DISTINCT e.student_id, a.assign_id
            FROM Enrolls e
            JOIN Assignment a ON e.course_id = a.course_id
            WHERE e.course_id = '$courseid' AND e.student_id = '$sid'
            ON DUPLICATE KEY UPDATE student_id='$sid', assign_id=a.assign_id;
        ";
        $resultInsertCourse = mysqli_query($con,  $sql3);
        
        if (!$resultInsertCourse) {
            die(mysqli_error($con));
        }
    }
        $result3 = mysqli_query($con, $sql3);
  
        if (!$result3) {
            die(mysqli_error($con));
        }
    
  
    header("location:upst.php?id[]=$id1&id[]=$id2");
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
  <h1>Update Your Details</h1><br><br>
  <form method="post">
    <div id="registration-success-message" class="alert alert-success" role="alert" style="display: none;">
        Updation successful!
      </div>
    
    <div class="form-group">
        <label>Student id</label><br>
        <input type="number" class="form-control" placeholder="Enter Student id" name="sid"value=<?php echo $sid;?>>
    </div><br>
    <div class="form-group">
        <label>First name</label><br>
        <input type="text" class="form-control" placeholder="Enter First name" name="firstname"value=<?php echo $fname;?>>
    </div><br>
    <div class="form-group">
        <label>Last name</label><br>
        <input type="text" class="form-control" placeholder="Enter Last name" name="lastname"value=<?php echo $lname;?>>
    </div><br>
    <div class="form-group">
        <label>Student age</label><br>
        <input type="number" class="form-control" placeholder="Enter Student age" name="studentage"value=<?php echo $sage;?>>
    </div><br>
    <div class="form-group">
        <label>Student gender</label><br>
        <input type="text" class="form-control" placeholder="Enter Student gender" name="studentgender"value=<?php echo $sgender;?>>
    </div><br>

    
    <div class="form-group">
    <label>Student phone numbers (comma-separated)</label><br>
    <input type="text" class="form-control" placeholder="Enter Student phone numbers (comma-separated)" name="studentphonenumbers" value="<?php echo $phoneNumbers; ?>">
</div><br>


<div class="form-group">
    <label>Course IDs (comma-separated)</label><br>
    <input type="text" class="form-control" placeholder="Enter Course IDs (comma-separated)" name="courseids" value="<?php echo $courseIds; ?>">
</div><br>

    <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>

    <br>
    <button class="btn btn-primary "><a href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Cancel</a></button>
     
  </div>
</section>
</body>

</html>