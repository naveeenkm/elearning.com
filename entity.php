<?php include('server.php') ?>

<?php include('connect.php') ?>
<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>

<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>Entities</title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.0.2/dist/ionicons.min.css">
  <style> 
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(img.jpg);
        }

        header {
            background-color: #1a444b;
            backdrop-filter: blur(150px);
            color: white;
            padding: 54px;
            text-align: center;
        }
        section{
            min-height: 100vh;
            background-image: url(img3.webp);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  filter: blur(2.5px);
  padding: 20px; 
 
  
        }
 
   
 
    .a { 
      display: flex; 
      align-items: center; 
      justify-content: space-between; 
      padding: 15px; 
      background-color: #8b64ff; 
      color: #ffffff; 
      border-radius: 5px; 
      margin-bottom: 20px; 
    } 
 
    .a h2 { 
      flex-grow: 1; 
      margin-right: 10px; 
      color: #ffffff; 
    } 
 
    .a button { 
      margin-left: 20px; 
      background-color: #23b15e;  
      color: white; 
      transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease; 
    } 
 
    .a button.insert-btn { 
      background-color: #ff9b00;  
    } 
 
    .a button:hover { 
      background-color: white; 
      color: black; 
      transform: scale(1.1);  
    } 
    .abc{
            width: 10%;
            height:50px;
        }
        .icon{
          position: absolute;
            top: 34px; 
            right: 5px;
        }
        .x2
        {
            background-color: transparent;
            border-radius: 20px;
            
    backdrop-filter: blur(1000px);
            position: absolute;
            top: 260px; 
            left: 200px;
            
            color: black;
            padding: 9px;
            height: 517px;
            width:345px;
            font-weight: bold;
            
        }
        .x2 h2{
          padding-top: 20%;
          text-align: center;
          font-weight: bold;
        }
        .x1
        {
          background-color: transparent;
            border-radius: 20px;
            
    backdrop-filter: blur(800px);
            position: absolute;
            top: 260px; 
            right: 200px;
            
            color: Black;
            padding: 9px;
            height: 517px;
            width:345px;
            
        }
        .x1 h2{
          padding-top: 20%;
          text-align: center;
          font-weight: bold;
        }
        button {
    width: 80%;
    height: 52px;
    border-radius: 40px;
    background-color: rgb(255, 255,255, 1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
}

button:hover {
  background-color: rgb(255, 255,255, 0.5);
} a{
            text-decoration: none;
            color: black;
        }
        .q1{
         margin-top: 75px;
         margin-left: 10%;
        }
        .q2{
         margin-top: 18px;
         margin-left: 10%;
        }
        .q3{
         margin-top: 18px;
         margin-left: 10%;
        }
        .q4{
         margin-top: 18px;
         margin-left: 10%;
        }
        .x3{
          background-color: transparent;
            border-radius: 20px;
            
    backdrop-filter: blur(800px);
            position: absolute;
            top: 820px; 
            left: 200px;
            
            color: black;
            padding: 9px;
            height: 100px;
            width:1125px;
            font-weight: bold;
        }
        .x3 button{
          margin-top: 12px;
          width: 271px;
        }
  </style> 
</head> 
 
<body> 
   
  <header>
  
    <h1>Login or Register </h1> <br><div class="icon"><ion-icon name="person" style="font-size: 5em;"></ion-icon><br>
    <?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
        echo "Username: <strong>$id1</strong><br>";
        echo "Email id: <strong>$id2</strong><br>";
      } else {
      echo '<button onclick="window.location.href=\'login.php\'">Login Here</button>'; 
    }
?>

  
  
  </div>
    <button class="abc"><a href="content.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >Home</a></button>
    <button class="abc">Your Details</button>
    <button class="abc"><a href="queries.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >Search</a></button>
    <button class="abc"><a href="triggers.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >History</a></button>
    <button class="abc">Assertions</button>
    <button class="abc"><a href="about.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >About</a></button>
    <button class="abc"><a href="login.php" >Sign Out</a></button>
    
</header>
<section ></section>
  <div class="x2">
     <h2> Faculty Login</h2>
     <button  class="q1" onclick="window.location.href='faculty.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">New Faculty Member</button><br>
     <button class="q2" onclick="window.location.href='fdisplay.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Login </button><br>
     <button class="q3" onclick="window.location.href='fdisplay1.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Edit Your Account </button><br>
     <button class="q4" onclick="window.location.href='fdisplay2.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Delete Your Account</button>
  </div>
  <div class="x1">
  <h2>Student Login</h2>
  <button class="q1" onclick="window.location.href='student.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">New Student </button><br>
     <button class="q2" onclick="window.location.href='dstudent.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Login </button><br>
     <button class="q3" onclick="window.location.href='dstudent1.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Edit Your Account </button><br>
     <button class="q4" onclick="window.location.href='dstudent3.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Delete Your Account</button>
  </div>
  <div class="x3">
<button onclick="window.location.href='dcourses.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'"> Courses details </button>
<button onclick="window.location.href='dquiz.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Quiz details</button>
<button onclick="window.location.href='dassignment.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Assignment details</button>
<button onclick="window.location.href='dcertificate.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Certificate Details</button>
  </div>
  <!-- <div class="a"> 
    
    <h2>Faculty</h2> 
    <button class="btn btn-light  " onclick="window.location.href='faculty.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='fdisplay.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
 
  <div class="a"> 
    <h2>Courses</h2> 
    <button class="btn btn-light" onclick="window.location.href='courses.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='dcourses.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
  <div class="a"> 
    <h2>Student</h2> 
    <button class="btn btn-light" onclick="window.location.href='student.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='dstudent.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
  <div class="a"> 
    <h2>Certificate</h2> 
    <button class="btn btn-light" onclick="window.location.href='certificate.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='dcertificate.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
  <div class="a"> 
    <h2>Assignment</h2> 
    <button class="btn btn-light" onclick="window.location.href='assignment.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='dassignment.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
  <div class="a"> 
    <h2>Quiz</h2> 
    <button class="btn btn-light" onclick="window.location.href='quiz.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='dquiz.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
  <div class="a"> 
    <h2>Student Phone Number</h2> 
    <button class="btn btn-light" onclick="window.location.href='stphone.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='dstphone.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
  <div class="a"> 
    <h2>Lectures</h2> 
    <button class="btn btn-light" onclick="window.location.href='lectures.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='dlectures.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
  <div class="a"> 
    <h2>Enrolls</h2> 
    <button class="btn btn-light" onclick="window.location.href='enrolls.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='denrolls.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
  <div class="a"> 
    <h2>Completes</h2> 
    <button class="btn btn-light" onclick="window.location.href='completes.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">Insert</button> 
    <button class="btn btn-light insert-btn" onclick="window.location.href='dcompletes.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'">View</button> 
  </div> 
    -->
  <!-- </section> -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body> 
 
</html>