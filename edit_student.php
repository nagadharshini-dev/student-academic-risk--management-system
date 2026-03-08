<?php
include("db.php");

if(isset($_GET[ 'id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST[ 'update' ])) {
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    $attendance = $_POST['attendance'];
    $internal_marks = $_POST['internal_marks'];
    $semester_marks = $_POST['semester_marks'];
    $cgpa = $_POST['cgpa'];

    $sql = "UPDATE students SET
            name='$name',
            email='$email',
            department='$department',
            year='$year',
            attendance='$attendance',
            internal_marks='$internal_marks',
            semester_marks='$semester_marks',
            cgpa='$cgpa'
            WHERE id=$id";

    if(mysqli_query($conn, $sql)) {
        header("Location: view_students.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_query($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Student</title>
</head>
<body>
    
<h2>Edit Student</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    Name:<br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

    Email:<br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    Department:<br>
    <input type="text" name="department" value="<?php echo $row['department']; ?>" required><br><br>

    Year:<br>
    <input type="text" name="year" value="<?php echo $row['year']; ?>" required><br><br>

    Attendance:<br>
    <input type="number" name="attendance" value="<?php echo $row['attendance']; ?>" required><br><br>

    Internal Marks:<br>
    <input type="number" name="internal_marks" value="<?php echo $row['internal_marks']; ?>" required><br><br>

    Semester Marks:<br>
    <input type="number" name="semester_marks" value="<?php echo $row['semester_marks']; ?>" required><br><br>

    CGPA:<br>
    <input type="text" name="cgpa" value="<?php echo $row['cgpa']; ?>" required><br><br>

    <input type="submit" name="update" value="update student">
</form>

</body>
</html>