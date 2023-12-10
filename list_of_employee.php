<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/body.css">
	<link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>

	<div class="header">
		<a href="index.php">Trang chủ</a>
		<a href="info.php">Tài khoản</a>
	</div>

    <a class="logout" href="logout.php">Đăng xuất</a>

    <div class="search-container">
        <br>
                <form id="searchForm" method="post">
                    <input type="text" id="search" name="search">
                    <!-- add a tick box -->
                    <label for="sortbyName">Sắp xếp theo: ID</label>
                    <input type="radio" id="sortbyID" name="sortby" value="ID" checked>
                    <label for="sortbyDate">Ngày vào làm</label>
                    <input type="radio" id="sortbyDate" name="sortby" value="Date">
                    <label for="sortbystatus">Status</label>
                    <input type="radio" id="sortbystatus" name="sortby" value="Status">
                    <label for="sortby">Quản lý</label>
                    <input type="radio" id="sortby" name="sortby" value="SuperiorName">

                    <input type="submit" value="Submit">
                </form>
                <div class="button-container">
                    <a href="add_employee.php"><input type="button" value="Thêm nhân viên"></a>
                </div>
            </div>
            <div id="employeeTable"></div>
            <script>           
            function redirectToDetailsPage(ID) {
                window.location.href = 'update_employee.php?id=' + ID;
            }
            function fetchemployeeData(search = '', sortby = '') {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", 'database_scripts/show_list_of_employee.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        document.getElementById('employeeTable').innerHTML = this.responseText;
                    }
                }
                xhr.send("search=" + search + "&sortby=" + sortby);
            }

            // Fetch all employee data when the page loads
            fetchemployeeData();

            // Fetch employee data based on search when the form is submitted
            document.getElementById('searchForm').addEventListener('submit', function(e) {
                e.preventDefault();
                var search = document.getElementById('search').value;
                var sortbyRadio = document.querySelector('input[name="sortby"]:checked');
                var sortby = sortbyRadio ? sortbyRadio.value : '';
                fetchemployeeData(search, sortby);
            });

            </script>

        </div>
    </div>
	
</script>
</body>
</html>