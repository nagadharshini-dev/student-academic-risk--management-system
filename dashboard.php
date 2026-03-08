<?php
include 'db.php';

$count_query = "SELECT COUNT(*) as total FROM students";
$count_result = mysqli_query($conn, $count_query);
$count_row = mysqli_fetch_assoc($count_result);
$total_students =$count_row ['total'];
?>
<?php
$dept_query = "SELECT department, COUNT(*) as total FROM students GROUP BY department";
$dept_query = mysqli_query($conn, $dept_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
<div class="dashboard-container">
    
    <h1>Welcome Admin👋</h1>

    <?php
    if(isset($_SESSION['success'])){
        echo "<p style='color:green;'>".$_SESSION['success']."</p>";
        unset($_SESSION['success']);
    }
    ?>

    <div class="stats-card">
        <h2>Total Students</h2>
        <p><?php echo $total_students; ?></p>
    </div>

    <div class="button-group">
        <a href="add_student.php" class="btn">➕ Add Student</a>
        <a href="view_students.php" class="btn">🗒️ View Students</a>
        <a href="logout.php" class="btn logout">🚪 Logout</a>
    </div>

</div>
</body>
</html>