<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

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
</head>
<style>
    /* unvisited link */
    a:link {
        color: green;
        text-decoration: none;
    }

    /* mouse over link */
    a:hover {
        color: red;
        text-decoration: underline;
    }

    #employeeTable {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 1200px;
        margin: auto;
    }

    #employeeTable td, #employeeTable th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #employeeTable th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    input[type="text"] {
        float: left;
        width: 200px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        background-color: white;
        background-position: 10px 10px;
        background-repeat: no-repeat;
        padding: 5px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
        margin-left: 90px;
        margin-bottom: 20px;
        margin-right: 20px;
    }
    input[type="button"] {
        float: right;
        margin-top:8px;
        margin-right: 90px;
        background-color: #4CAF50; 
        color: white; 
        padding: 5px; 
        border: none; 
        cursor: pointer; 
        width: 200px;
    }
    input[type="radio"] {
        margin-top: 10px;
        margin-right: 20px;
    }
    input[type="submit"] {
        margin-top:10px;
        margin-right: 90px;
        background-color: #4CAF50; 
        color: white; 
        padding: 5px; 
        margin: 8px 0; 
        border: none; 
        cursor: pointer; 
        width: 100px;
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
    <!-- add christmaschristmas eve -->
    <img src="images/innerbanner.png" alt="banner" style="width: 100%; height: 300px;">
    <div class="search-container">
        <br>
        <form id="searchForm" method="post">
            <input type="text" id="search" placeholder="Tìm kiếm" name="search">
            <!-- add a tick box -->
            <label for="sortbyName">Sắp xếp theo: ID</label>
            <input type="radio" id="sortbyID" name="sortby" value="ID" checked>
            <label for="sortbyDate">Ngày vào làm</label>
            <input type="radio" id="sortbyDate" name="sortby" value="Date">
            <label for="sortbystatus">Trạng thái</label>
            <input type="radio" id="sortbystatus" name="sortby" value="Status">
            <label for="sortby">Quản lý</label>
            <input type="radio" id="sortby" name="sortby" value="SuperiorName">
            <input type="submit" value="Xác nhận">
            <a href="add_employee.php"><input type="button" value="Thêm nhân viên"></a>
        </form>
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
    <!-- Start Footer Area -->
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
    <!-- /End Footer Area -->
</body>
</html>