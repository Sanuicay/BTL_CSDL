<?php

$con = mysqli_connect("localhost:3307","root","","BTL_DATABASE");
$EmployeeID = $_GET['id'];

//check if employeeID is in the orders table with status != 'Đã nhận' or != 'Đã giao'
$sql = "SELECT *
        FROM Orders
        WHERE EmployeeID = '{$EmployeeID}' AND Status != 'Đã nhận' AND Status != 'Đã giao';";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "  <script>
                var confirmation = confirm('NHÂN VIÊN ĐANG CÓ " . mysqli_num_rows($result) . " ĐƠN HÀNG CHƯA HOÀN THÀNH. KHÔNG THỂ XÓA!');
                if (confirmation) {
                    window.location.href = '../list_of_employee.php';
                } else {
                    window.location.href = '../list_of_employee.php';
                }
            </script>";
}
else {
    echo "<script>
        var confirmation = confirm('XÁC NHẬN XÓA NHÂN VIÊN?');
        if (confirmation) {
            window.location.href = 'delete_employee_data_from_ID.php?id={$EmployeeID}';
        } else {
            window.location.href = '../list_of_book.php';
        }
    </script>";
}

?>