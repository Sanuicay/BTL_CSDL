<?php
$con = mysqli_connect("localhost:3307","root","","BTL_DATABASE");
//get the ID from the URL
$employeeID = $_GET['id'];
//turn to string
$employeeID = strval($employeeID);
//if change1 button is pressed, update the user info (ignore the blank input)
$query_employee = "SELECT e.EmployeeID, a.FirstName, a.LastName, a.Email, a.PhoneNumber, e.StartDate, e.Status, e.SuperiorID, a.Username, a.Password, CONCAT(sa.FirstName, ' ', sa.LastName) AS SuperiorName
                   FROM Employee e
                   INNER JOIN Account a ON e.EmployeeID = a.AccountID
                   LEFT JOIN Employee s ON e.SuperiorID = s.EmployeeID
                   LEFT JOIN Account sa ON s.EmployeeID = sa.AccountID
                   WHERE e.EmployeeID = '$employeeID';";
$result_employee = mysqli_query($con,$query_employee);
$row_employee = mysqli_fetch_assoc($result_employee);

if (isset($_POST['change1']))
{
    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $employee_status = $_POST['status'];
    $superiorID = $_POST['superiorID'];
    if ($ho != "")
    {
        $query = "UPDATE account
                  SET FirstName = '$ho'
                  WHERE AccountID = '$employeeID';";
        $result = mysqli_query($con,$query);
    }
    if ($ten != "")
    {
        $query = "UPDATE account
                  SET LastName = '$ten'
                  WHERE AccountID = '$employeeID';";
        $result = mysqli_query($con,$query);
    }
    if ($email != "")
    {
        $query = "UPDATE account
                  SET Email = '$email'
                  WHERE AccountID = '$employeeID';";
        $result = mysqli_query($con,$query);
    }
    if ($phone != "")
    {
        $query = "UPDATE account
                  SET PhoneNumber = '$phone'
                  WHERE AccountID = '$employeeID';";
        $result = mysqli_query($con,$query);
    }
    if ($employee_status != "")
    {
        $query = "UPDATE employee
                  SET Status = '$employee_status'
                  WHERE EmployeeID = '$employeeID';";
        $result = mysqli_query($con,$query);
    }
    if ($superiorID != "")
    {
        if ($superiorID == "NULL")
        {
            $query = "UPDATE employee
                      SET SuperiorID = NULL
                      WHERE EmployeeID = '$employeeID';";
            $result = mysqli_query($con,$query);
        }
        else
        {
            $query = "UPDATE employee
                      SET SuperiorID = '$superiorID'
                      WHERE EmployeeID = '$employeeID';";
            $result = mysqli_query($con,$query);
        }
    }
    header("Location: update_employee.php?id=$employeeID");
    
}

//if change2 button is pressed, update the password, we don't need to check if the old password is correct or not
if (isset($_POST['change2']))
{
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];
    //check null
    if ($new_password != "" && $confirm_password != "")
    {
        //check if the new password and confirm password are the same
        if ($new_password == $confirm_password)
        {
            if ($new_password == $row_employee['Password'])
            {
                echo "<script>alert('Mật khẩu mới không được trùng với mật khẩu cũ!');</script>";
            }
            else
            {
                $query = "UPDATE Account
                          SET Password = '$new_password'
                          WHERE AccountID = '$employeeID';";
                $result = mysqli_query($con,$query);

                echo "<script>alert('Thay đổi mật khẩu thành công!');</script>";
                sleep(1);
                echo "<script>window.location.href = 'update_employee.php?id=$employeeID';</script>";
            }
        }
        else
        {
            echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp!');</script>";
        }
    }
    else
    {
        echo "<script>alert('Vui lòng nhập mật khẩu mới và xác nhận mật khẩu!');</script>";
    }
}

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
                                <a href="logout.php" class="btn animate" style="background-color: #4CAF50; color: white; padding: 5px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 0px; cursor: pointer; border-radius: 12px;">Logout</a>
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
                <h2>Hồ Sơ</h2>
                <form method="POST">
                    <!-- Họ và Tên -->
                    <div class="name">
                        <div>
                            <?php
                                echo "<label for='ho'>Họ:</label>";
                                echo "<input type='text' value='$row_employee[FirstName]' id='ho' name='ho'>";
                            ?>
                        </div>
                        <div>
                            <?php
                                echo "<label for='ten'>Tên:</label>";
                                echo "<input type='text' value='$row_employee[LastName]' id='ten' name='ten'>";
                            ?>
                        </div>
                    </div>
                    <br>
                    
                    <!-- Email -->
                    <?php
                        echo "<label for='email'>Email:</label>";
                        echo "<input type='email' value='$row_employee[Email]' id='email' name='email'><br>";
                    ?>

                    <!-- Số điện thoại -->
                    <?php
                        echo "<label for='phone'>Số Điện Thoại:</label>";
                        echo "<input type='tel' pattern='0[0-9]{9,10}' value='$row_employee[PhoneNumber]' id='phone' name='phone'><br>";
                    ?>

                    <!-- Ngày vào làm -->
                    <?php
                        echo "<label for='start_date'>Ngày vào làm:</label>";
                        echo "<input type='date' value='$row_employee[StartDate]' id='start_date' name='start_date' readonly><br>";
                    ?>

                    <!-- Người quản lý -->
                    <label for='superiorID'>ID Quản lý:</label>
                    <select id='superiorID' name='superiorID'>
                    <?php
                    $query = "SELECT e.EmployeeID, CONCAT(a.FirstName, ' ', a.LastName) AS EmployeeName
                                FROM Employee e
                                INNER JOIN Account a ON e.EmployeeID = a.AccountID
                                WHERE e.EmployeeID != '$employeeID';";
                    $result = mysqli_query($con,$query);
                    // if the employee has no superior, display "No Superior"
                    if ($row_employee['SuperiorID'] == NULL)
                    {
                        echo "<option value='NULL' selected>No Superior</option>";
                    }
                    else
                    {
                        echo "<option value='NULL'>No Superior</option>";
                    }
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
                    echo "</select><br>";
                    ?>

                    <!-- Trạng thái -->
                    <?php
                        echo "<label for='status'>Trạng thái:</label>";
                        echo "<select id='status' name='status'>";
                        if ($row_employee['Status'] == "Active")
                        {
                            echo "<option value='Active' selected>Active</option>";
                            echo "<option value='Inactive'>Inactive</option>";
                        }
                        else
                        {
                            echo "<option value='Active'>Active</option>";
                            echo "<option value='Inactive' selected>Inactive</option>";
                        }
                    ?>  
                    
                    <!-- Nút thay đổi -->
                    <input type="submit" name="change1" value="Thay Đổi">
                </form>
            </div>
            <div class="account-info" method="POST">
                <h2>Thông Tin Tài Khoản</h2><br>
                <form>
                    <!-- Tên đăng nhập -->
                    <div class="form-group">
                        <?php
                            echo "<label for='username'>Tên Đăng Nhập:</label>";
                            echo "<b>$row_employee[Username]</b>";
                        ?>
                    </div>

                    <!-- ID -->
                    <div class="form-group">
                        <?php
                            echo "<label for='ID'>ID:</label>";
                            echo "<b>$employeeID</b>";
                        ?>
                    </div>
                </form>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray"><br>
                <form method="POST">
                    <!-- Mật khẩu cũ -->
                    <div class="form-group">
                        <label for="old-password">Mật Khẩu Cũ:</label><br>
                        <?php echo "<input type='text' id='old-password' name='old-password' value='$row_employee[Password]' readonly><br>"; ?>
                    </div>
                    <!-- Mật khẩu mới -->
                    <br>
                    <div class="form-group">
                        <label for="new-password">Mật Khẩu Mới:</label><br>
                        <input type="password" id="new-password" name="new-password" pattern=".{9,}" title="Mật khẩu phải có >8 ký tự."><br>
                    </div>
                    <br>

                    <!-- Xác nhận mật khẩu mới -->
                    <div class="form-group">
                        <label for="confirm-password">Xác nhận Mật Khẩu Mới:</label><br>
                        <input type="password" id="confirm-password" name="confirm-password" pattern=".{9,}" title="Mật khẩu phải có >8 ký tự."><br>
                    </div>
     
                    
                    <!-- Nút thay đổi -->
                    <input type="submit" name="change2" value="Thay Đổi">
                </form>
            </div>
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