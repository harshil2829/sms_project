<?php
$conn = mysqli_connect("localhost","root","","sms_db");

if(isset($_POST['add'])){
$name = $_POST['name'];
$class = $_POST['class'];
$marks = $_POST['marks'];

mysqli_query($conn,"INSERT INTO students(name,class,marks) VALUES('$name','$class','$marks')");
}

if(isset($_GET['del'])){
$id = $_GET['del'];
mysqli_query($conn,"DELETE FROM students WHERE id=$id");
}

$data = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Student Management System</h2>

<form method="POST">
<input type="text" name="name" placeholder="Student Name" required>
<input type="text" name="class" placeholder="Class" required>
<input type="number" name="marks" placeholder="Marks" required>
<button name="add">Add Student</button>
</form>

<table>
<tr>
<th>Name</th>
<th>Class</th>
<th>Marks</th>
<th>Action</th>
</tr>

<?php while($r=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?php echo $r['name']; ?></td>
<td><?php echo $r['class']; ?></td>
<td><?php echo $r['marks']; ?></td>
<td><a href="?del=<?php echo $r['id']; ?>">Delete</a></td>
</tr>
<?php } ?>

</table>

</body>
</html>
