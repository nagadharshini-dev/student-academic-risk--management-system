<?php
include("db.php");

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department  = $_POST['department'];
    $year = $_POST['year'];
    $attendance = $_POST['attendance'];
    $internal_marks = $_POST['internal_marks'];
    $semester_marks = $_POST['semester_marks'];
    $cgpa = $_POST['cgpa'];
    

    $query = "INSERT INTO students
     (name,email,department,year,attendance,internal_marks,semester_marks,cgpa)
            VALUES ('$name', '$email', '$department', '$year', '$attendance', '$internal_marks', '$semester_marks', '$cgpa')";

    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Student Added Successfully!'); window.location='view_students.php';<?script>";
        exit();
    }
    else{
        echo "Database Error : ".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<h2>Add Student</h2>

<form method="post">
     <label>Name:</label><br>
     <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
     <input type="email" name="email" required><br><br>

    <label>Department:</label><br>
    <input type="text" name="department" required><br><br>

    <label>Year:</label><br>
    <input type="number" name="year" required><br><br>

    <label>Attendance(%)</label><br>
    <input type="number" name="attendance" required><br><br>

    <label>Internal Marks</label><br>
    <input type="number" name="internal_marks" required><br><br>
    
    <label>Semester Marks</label><br>
    <input type="number" name="semester_marks" required><br><br>

    <label>CGPA</label><br>
    <input type="text" name="cgpa" step="0,01" required><br><br>

   
     <button type="submit" name="submit">Add Student</button>
</form>

<br>
<a href="dashboard.php" class="btn">Back to Dashboard</a>

</body>
</html>