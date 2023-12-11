<?php
include("connection.php");
include("functions.php");

?>
    
<!DOCTYPE html>
<html>
<head>
	<!-- Title Tag  -->
    <title>Eshop</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="css/table.css">
    <!-- Bootstrap -->
	<link rel="stylesheet" href="css_homepage/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css_homepage/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css_homepage/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css_homepage/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css_homepage/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css_homepage/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css_homepage/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css_homepage/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css_homepage/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css_homepage/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css_homepage/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css_homepage/responsive.css">

    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/add_new_employee.css">
</head>
<style>
    select {
        width: 100%;
        padding: 10px 30px 10px 10px; /* Top, Right, Bottom, Left */
        margin-left: 0px;
        border: 1px solid #ccc;
        border-radius: 40px;
        background-color: #ffffff;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20'><path d='M6,9l4,4,4-4' stroke='%23000000' stroke-width='2' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position: right 10px center; /* Position of the arrow */
        appearance: none; /* Remove default appearance */
    }
    input[type="submit"]{
        width: 100%;
        background-color: #F9F1E7;
        color: black;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 0px;
        cursor: pointer;
        border-radius: 12px;
    }
</style>
<body>
    <header class="header shop">
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="images/logo.png" alt="logo"></a>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form class="search-form">
                                    <input type="text" placeholder="Tìm kiếm tại đây..." name="search">
                                    <button value="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-6 col-md-7 col-12">
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="right-bar">
                            <!-- Search Form -->
                            <div class="sinlge-bar">
                                <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="sinlge-bar">
                                <a href="list_of_employee.php" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="sinlge-bar shopping">
                                <a href="#" class="single-icon"><i class="ti-bag"></i></a>
                            </div>
                            <div class="sinlge-bar">
                                <!-- login button -->
                                <a href="logout.php" class="btn animate" style="background-color: #4CAF50; color: white; padding: 5px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 0px; cursor: pointer; border-radius: 12px;">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <img src="images/innerbanner.png" alt="banner" style="width: 100%; height: 300px;">

    <div class="content">
        <div class="body-container">
            <div class="profile">
                <form id="form1">
                <h2>Hồ Sơ Của Tôi</h2>
                <form>
                    <!-- Name -->
                    <div class="name">
                        <div>
                            <label for="ho">Họ:</label>
                            <input type="text" id="ho" name="ho">
                        </div>
                        <div>
                            <label for="ten">Tên:</label>
                            <input type="text" id="ten" name="ten">
                        </div>
                    </div>
                    <!-- Email -->
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">

                    <!-- Phone -->
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="tel" pattern="0[0-9]{9,10}" id="phone" name="phone" title="SĐT phải bắt đầu bằng số 0 và có 10-11 chữ số.">

                    <!-- Start date -->
                    <label for="start_date">Ngày vào làm:</label>
                    <input type="date" id="start_date" name="start_date">

                    <!-- Người quản lý -->
                    <label for='superiorID'>ID Quản lý:</label>
                    <select id='superiorID' name='superiorID'>
                    <?php
                    $query = "SELECT e.EmployeeID, CONCAT(a.FirstName, ' ', a.LastName) AS EmployeeName
                                FROM Employee e
                                INNER JOIN Account a ON e.EmployeeID = a.AccountID
                                WHERE e.EmployeeID != '$employeeID';";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        if ($row['EmployeeID'] == $row_employee['SuperiorID'])
                        {
                            echo "<option value='$row[EmployeeID]' selected>$row[EmployeeID] - $row[EmployeeName]</option>";
                        }
                        else
                        {
                            echo "<option value='$row[EmployeeID]'>$row[EmployeeID] - $row[EmployeeName]</option>";
                        }
                    }
                    echo "</select>";
                    ?>   
                    <!-- Status -->
                    <label for="status">Trạng thái:</label>
                    <select id="status" name="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
              
                </form>
            </div>
            <div class="account-info" method="POST">
                <h2>Thông Tin Tài Khoản</h2><br>
                <form id="form2">
                    <div class="form-group">
                        <?php
                            echo "<label for='username'>Tên Đăng Nhập:</label>";
                            echo "<input type='text' id='username' name='username'<br>";
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo "<label for='ID'>ID:</label>";
                        // AccountID has ACC001, ACC002,... format for member, and ACS001, ACS002,... format for staff
                        // find the last ASCxxx and increment it by 1
                        $query = "SELECT AccountID FROM account WHERE AccountID LIKE 'ACS%' ORDER BY AccountID DESC LIMIT 1;";
                        $result = mysqli_query($con,$query);
                        $row = mysqli_fetch_assoc($result);
                        $lastID = $row['AccountID'];
                        $newID = substr($lastID, 0, 3) . sprintf('%03d', substr($lastID, 3) + 1);
                        echo "<input type='text' id='ID' name='ID' value='$newID' readonly><br>";
                        ?>
                    </div>
                </form>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                <form id="form3">
                    <br>
                    <div class="form-group">
                        <label for="new-password">Mật Khẩu:</label><br>
                        <input type="password" id="new-password" name="new-password" pattern=".{9,}" title="Mật khẩu phải có nhiều hơn 8 ký tự."><br>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confirm-password">Xác nhận Mật Khẩu:</label><br>
                        <input type="password" id="confirm-password" name="confirm-password" pattern=".{9,}" title="Mật khẩu phải có nhiều hơn 8 ký tự."><br>
                    </div>                  

                </form>
                <input type="submit" id="submit" name="create" value="Tạo">

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $("#submit").click(function(e){
                            e.preventDefault();
                            var form1Data = $("#form1").serialize();
                            var form2Data = $("#form2").serialize();
                            var form3Data = $("#form3").serialize();
                            $.ajax({
                                type: "POST",
                                url: "database_scripts/add_new_employee_script.php",
                                data: form1Data + "&" + form2Data + "&" + form3Data,
                                success: function(response) {
                                    alert(response);
                                    if (response == "Thêm nhân viên thành công!")
                                    {
                                        window.location.href = 'list_of_employee.php';
                                    }
                                }
                            });
                        });
                    });
                </script>
            </div>
            </form>
        </div>
    </div>
    <!-- content goes here -->

    <footer class="footer">
        <!-- Footer Top -->
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo">
                                <a href="index.html"><img src="images/logo2.png" alt="#"></a>
                            </div>
                            <p class="call">Giải đáp thắc mắc? Gọi ngay cho chúng tôi 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Thông tin</h4>
                            <ul>
                                <li><a href="#">Về Eshop</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Điều khoản</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">Trợ giúp</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Dịch vụ</h4>
                            <ul>
                                <li><a href="#">Thanh toán</a></li>
                                <li><a href="#">Hoàn trả</a></li>
                                <li><a href="#">Chính sách giao hàng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>Liên hệ</h4>
                            <!-- End Single Widget -->
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-flickr"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <div class="copyright">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2020 - All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> 
</body>
</html>