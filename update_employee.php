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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style_duong.css">
    <link rel="stylesheet" href="css/cover-box.css">
    <link rel="stylesheet" href="css/add_new_employee.css">
</head>
<body>
    <!-- header -->
    <div class="header">
        <div class="header-left-section">
            <a href="index.html"><img class="header-logo" src="img/logo_DABM.png" alt="Logo"></a>
        </div>
        <div class="header-nav-links">
            <a href="index.html">Trang chủ</a>
            <a href="#">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <button class="header-login-button" onclick="redirectToLogout()">
                Đăng xuất
            </button>
            <script>
                function redirectToLogout() {
                // Add code to redirect to the login page
                window.location.href = 'logout.php'; // Replace 'login.html' with the actual URL of your login page
                }
            </script>
        </div>
    </div>

    <!-- content goes here -->
    <div class="box"> <!--cover-box.css-->
        <img src="img/logo_DABM_3.png" alt="Home Icon" width="50px">
        <p class="box-text">Thông tin cá nhân</p>
        <div>
            <a href="user.html">Cá nhân</a>
            <a href="user.html">> Thông tin cá nhân</a>
        </div>
    </div>

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
                    <label for='superiorID'>ID Quản lý:</label><br>
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
                        <input type="password" id="old-password" name="old-password" value="<?php echo $row_employee['Password']; ?>" readonly>
                        <input type="checkbox" onclick="ShowPassword()">
                    </div>

                    <!-- JavaScript của mật khẩu cũ-->
                    <script>
                    function ShowPassword() {
                        var x = document.getElementById("old-password");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                    </script>

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

    <div class="footer">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 item">
                        <h3><img class="footer-logo" src="img/logo_DABM_2.png" alt="Logo"></h3>
                        <ul>
                            <br>
                            <li>268 Lý Thường Kiệt, phường 14, quận</li>
                            <li>10, TP Hồ Chí Minh, Việt Nam</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-2 item">
                        <h3>LIÊN KẾT</h3>
                        <ul>
                            <br>
                            <li><a href="#">Trang chủ</a></li>
                            <br>
                            <li><a href="#">Cửa hàng</a></li>
                            <br>
                            <li><a href="#">Giới thiệu về DABM</a></li>
                            <br>
                            <li><a href="#">Liên hệ</a></li>
                            <br>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-2 item">
                        <h3>VỀ DABM</h3>
                        <ul>
                            <br>
                            <li><a href="#">Điều khoản</a></li>
                            <br>
                            <li><a href="#">Thanh toán</a></li>
                            <br>
                            <li><a href="#">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <h3>NHẬN THÔNG BÁO QUA EMAIL</h3>
                        <ul>
                            <br>
                            <div class="p-1 rounded border">
                                <div class="input-group">
                                    <input type="email" placeholder="Nhập email của bạn" class="form-control border-0 shadow-0">
                                    <div class="input-group-append">
                                        <a class="email_signup_button" href="index.html">ĐĂNG KÝ</a>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <hr>
                <p>
                    <div style="display: flex; justify-content: space-between; opacity:1; font-size:13px; margin-bottom:0;">
                    <div style="text-align: left;">2023 DABM. Tất cả các quyền được bảo lưu</div>
                    <div style="text-align: right;">Quốc gia & Khu vực: Việt Nam</div>
                </div></p>
            </div>
        </footer>
    </div>  
</body>