<?php
include("db.php");


$search = "";
$filter = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
}



if(isset($_GET['search'])){
    $search = $_GET['search'];
}

if($search !=""){
    $query = "SELECT * FROM students WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR department LIKE '%$search%'";
}
else{
    $query = "SELECT * FROM students";
}

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Academic Risk Analysis Dashbpard</title>

<style>

body{
    font-family:Arial;
}

table{
    border-collapse:collapse;
    width: 100%
}

th,td{
    border:1px solid black;
    padding:9px;
    text-align:center;
}

.High{
    background-color:#e20606;
    color:white;
}

.Medium{
    background-color:#eed813;
}

.Low{
    background-color:#06b30f;
    color:white;
}

.top-bar{
    margin-bottom:15px;
}

button{
    padding:6px 12px;
}

</style>
</head>

<body>
    
<h2 style="text-align:center;">Academic Risk Analysis Dashboard</h2>

<div class="top-bar">

<form method="GET" style="display:inline;">
<input type="text" name="search" placeholder="search NAME or DEPT" value="<?php echo $search; ?>">
<button type="submit">Search</button>
</form>

<form method ="GET" style="display:inline;">
<select name="filter">
<option value="">All</option>
<option value="High">High Risk</option>
<option value="Medium">Medium Risk</option>
<option value="Low">Low Risk</option>
</select>
<button type="submit">Filter</button>
</form>

</div>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Department</th>
<th>Year</th>
<th>Attendance</th>
<th>Internal</th>
<th>Semester</th>
<th>CGPA</th>
<th>Risk</th>
<th>Created At</th>
<th>Action</th>


</tr>

<?php
while($row = mysqli_fetch_assoc($result)){

$attendance = $row['attendance'];
$cgpa = $row['cgpa'];

if($attendance < 60 || $cgpa < 6){
    $risk = "High";
} 
elseif($attendance >=60 && $attendance <=75){
    $risk = "Medium";
}
else{
    $risk = "Low";
}

if($filter != ""  && $risk != $filter){
    continue;
}
?>

<tr class="<?php echo $risk; ?>">

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['department']; ?></td>
<td><?php echo $row['year']; ?></td>
<td><?php echo $row['attendance']; ?></td>
<td><?php echo $row['internal_marks']; ?></td>
<td><?php echo $row['semester_marks']; ?></td>
<td><?php echo $row['cgpa']; ?></td>

<td><?php echo $risk; ?></td>
<td><?php echo $row['created_at']; ?></td>




<td>
<a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a> 
<a href="delete_student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this student?')">Delete</a>
</td>

</tr>

<?php } ?>

</table>

<br>

<center>
<a href="dashboard.php">Back to Dashboard</a>
</center>

</body>
</html>


