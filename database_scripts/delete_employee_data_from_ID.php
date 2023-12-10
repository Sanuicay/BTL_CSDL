<?php
// Connect to your database
$con = mysqli_connect("localhost:3307","root","","BTL_database");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$id = $_GET['id'];
$id = mysqli_real_escape_string($con, $id);

//delete the employee from the database
$query = "DELETE FROM employee WHERE EmployeeID = '{$id}'";
$result = mysqli_query($con, $query);

//delete the account from the database
$query = "DELETE FROM account WHERE AccountID = '{$id}'";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<script>alert('Xóa thành công:" . $id . "!')</script>";
    echo "<script>window.location.href = '../manager_employee.php';</script>";
} else {
    echo "<script>alert('Xóa thất bại!')</script>";
    echo "<script>window.location.href = '../manager_employee.php';</script>";
}
?>