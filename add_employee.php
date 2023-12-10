<?php
include("connection.php");
include("functions.php");

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
            <a href="user.html"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon_news.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
            <a href="#"><img class="header-icon" src="img/icon_cart.png" alt="Icon 3"></a>
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
                    <br>
                    <!-- Email -->
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">

                    <!-- Phone -->
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="tel" pattern="0[0-9]{9,10}" id="phone" name="phone">

                    <!-- Start date -->
                    <label for="start_date">Ngày vào làm:</label> <br>
                    <input type="date" id="start_date" name="start_date">

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

                    <!-- Status -->
                    <label for="status">Trạng thái:</label> <br>
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
                        // Format: ACC001 -> ACC002 -> ACC003 -> ... Query the database to get the last ID
                        $sql = "SELECT AccountID FROM account ORDER BY  AccountID DESC LIMIT 1;";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $lastID = $row['AccountID'];
                        $lastID = substr($lastID, 3);
                        $lastID = intval($lastID);
                        $lastID++;
                        $lastID = strval($lastID);
                        $lastID = str_pad($lastID, 3, '0', STR_PAD_LEFT);
                        $accountID = "ACC" . $lastID;
                        echo "<input type='text' id='ID' name='ID' value='$accountID' readonly><br>";
                        ?>
                    </div>
                </form>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray"><br>
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