<?php 
session_start();

	$con = mysqli_connect("localhost:3307","root","","btl_database");

	$current_year = 2023;
	$current_month = 3;

	//call a procedure to update the the table bestsellingproductbycategoryandmonth (with ProductID, ProductName, ImageUrl)
	$query = "CALL BestSellingProductByCategoryAndMonth($current_year, $current_month)";
	$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
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
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="images/logo.png" alt="logo"></a>
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
						<div class="search-bar-top">
							<div class="search-bar">
								<select>
									<option selected="selected">Danh mục</option>
									<option>Điện tử</option>
									<option>Điện gia dụng</option>
									<option>Điện lạnh</option>
								</select>
								<form>
									<input name="search" placeholder="Tìm kiếm tại đây....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i></a>
							</div>
							<div class="sinlge-bar">
								<!-- login button -->
								<a href="login.php" class="btn animate" style="background-color: #4CAF50; color: white; padding: 5px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 0px; cursor: pointer; border-radius: 12px;">Đăng nhập</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>DANH MỤC</h3>
								<ul class="main-category">
									<li><a href="#">Đồ điện tử <i class="fa fa-angle-right" aria-hidden="true"></i></a>
										<ul class="sub-category">
											<li><a href="#">Điện thoại</a></li>
											<li><a href="#">Laptop</a></li>
											<li><a href="#">Tivi</a></li>
										</ul>
									</li>
									<li><a href="#">Đồ điện gia dụng <i class="fa fa-angle-right" aria-hidden="true"></i></a>
										<ul class="sub-category">
											<li><a href="#">Máy giặt</a></li>
											<li><a href="#">Nồi cơm điện</a></li>
										</ul>
									</li>
									<li><a href="#">Đồ điện lạnh <i class="fa fa-angle-right" aria-hidden="true"></i></a>
										<ul class="sub-category">
											<li><a href="#">Điều hòa</a></li>
											<li><a href="#">Tủ lạnh</a></li>
										</ul>
									</li>
									<li><a href="#">Hãng sản xuất</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="#">Trang chủ</a></li>
													<li><a href="#">Sản phẩm</a></li>												
													<li><a href="#">Dịch vụ</a></li>
													<li><a href="#">Cửa hàng<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="cart.html">Giỏ hàng</a></li>
															<li><a href="checkout.html">Thanh toán</a></li>
														</ul>
													</li>	
													<li><a href="#">Giới thiệu</a></li>
													<li><a href="#">Liên hệ</a></li>								
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->
	
	<!-- Slider Area -->
	<section class="hero-slider">
		<!-- Single Slider -->
		<div class="single-slider">
		</div>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->
	
	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Danh mục sản phẩm</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dienthoai" role="tab">Điện thoại</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#laptop" role="tab">Laptop</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tivi" role="tab">Tivi</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#maygiat" role="tab">Máy giặt</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#noicomdien" role="tab">Nồi cơm điện</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tulanh" role="tab">Tủ lạnh</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dieuhoa" role="tab">Điều hòa</a></li>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="dienthoai" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dienthoai.png" alt="#">
															<img class="hover-img" src="images/dienthoai.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điện thoại</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dienthoai.png" alt="#">
															<img class="hover-img" src="images/dienthoai.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điện thoại</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dienthoai.png" alt="#">
															<img class="hover-img" src="images/dienthoai.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điện thoại</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dienthoai.png" alt="#">
															<img class="hover-img" src="images/dienthoai.png" alt="#">
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điện thoại</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dienthoai.png" alt="#">
															<img class="hover-img" src="images/dienthoai.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điện thoại</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dienthoai.png" alt="#">
															<img class="hover-img" src="images/dienthoai.png" alt="#">
															<span class="price-dec">30% Off</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điện thoại</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dienthoai.png" alt="#">
															<img class="hover-img" src="images/dienthoai.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điện thoại</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dienthoai.png" alt="#">
															<img class="hover-img" src="images/dienthoai.png" alt="#">
															<span class="out-of-stock">Hot</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điện thoại</a></h3>
														<div class="product-price">
															<span class="old">$60.00</span>
															<span>$50.00</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="laptop" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/laptop.png" alt="#">
															<img class="hover-img" src="images/laptop.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Laptop</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/laptop.png" alt="#">
															<img class="hover-img" src="images/laptop.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Laptop</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/laptop.png" alt="#">
															<img class="hover-img" src="images/laptop.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Laptop</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/laptop.png" alt="#">
															<img class="hover-img" src="images/laptop.png" alt="#">
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Laptop</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/laptop.png" alt="#">
															<img class="hover-img" src="images/laptop.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Laptop</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/laptop.png" alt="#">
															<img class="hover-img" src="images/laptop.png" alt="#">
															<span class="price-dec">30% Off</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Laptop</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/laptop.png" alt="#">
															<img class="hover-img" src="images/laptop.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Laptop</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/laptop.png" alt="#">
															<img class="hover-img" src="images/laptop.png" alt="#">
															<span class="out-of-stock">Hot</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Laptop</a></h3>
														<div class="product-price">
															<span class="old">$60.00</span>
															<span>$50.00</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="tivi" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tivi.png" alt="#">
															<img class="hover-img" src="images/tivi.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tivi</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tivi.png" alt="#">
															<img class="hover-img" src="images/tivi.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tivi</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tivi.png" alt="#">
															<img class="hover-img" src="images/tivi.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tivi</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tivi.png" alt="#">
															<img class="hover-img" src="images/tivi.png" alt="#">
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tivi</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tivi.png" alt="#">
															<img class="hover-img" src="images/tivi.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tivi</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tivi.png" alt="#">
															<img class="hover-img" src="images/tivi.png" alt="#">
															<span class="price-dec">30% Off</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tivi</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tivi.png" alt="#">
															<img class="hover-img" src="images/tivi.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tivi</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tivi.png" alt="#">
															<img class="hover-img" src="images/tivi.png" alt="#">
															<span class="out-of-stock">Hot</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tivi</a></h3>
														<div class="product-price">
															<span class="old">$60.00</span>
															<span>$50.00</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="maygiat" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/maygiat.png" alt="#">
															<img class="hover-img" src="images/maygiat.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Máy giặt</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/maygiat.png" alt="#">
															<img class="hover-img" src="images/maygiat.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Máy giặt</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/maygiat.png" alt="#">
															<img class="hover-img" src="images/maygiat.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Máy giặt</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/maygiat.png" alt="#">
															<img class="hover-img" src="images/maygiat.png" alt="#">
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Máy giặt</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/maygiat.png" alt="#">
															<img class="hover-img" src="images/maygiat.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Máy giặt</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/maygiat.png" alt="#">
															<img class="hover-img" src="images/maygiat.png" alt="#">
															<span class="price-dec">30% Off</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Máy giặt</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/maygiat.png" alt="#">
															<img class="hover-img" src="images/maygiat.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Máy giặt</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/maygiat.png" alt="#">
															<img class="hover-img" src="images/maygiat.png" alt="#">
															<span class="out-of-stock">Hot</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Máy giặt</a></h3>
														<div class="product-price">
															<span class="old">$60.00</span>
															<span>$50.00</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="noicomdien" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/noicomdien.png" alt="#">
															<img class="hover-img" src="images/noicomdien.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Nồi cơm điện</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/noicomdien.png" alt="#">
															<img class="hover-img" src="images/noicomdien.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Nồi cơm điện</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/noicomdien.png" alt="#">
															<img class="hover-img" src="images/noicomdien.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Nồi cơm điện</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/noicomdien.png" alt="#">
															<img class="hover-img" src="images/noicomdien.png" alt="#">
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Nồi cơm điện</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/noicomdien.png" alt="#">
															<img class="hover-img" src="images/noicomdien.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Nồi cơm điện</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/noicomdien.png" alt="#">
															<img class="hover-img" src="images/noicomdien.png" alt="#">
															<span class="price-dec">30% Off</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Nồi cơm điện</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/noicomdien.png" alt="#">
															<img class="hover-img" src="images/noicomdien.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Nồi cơm điện</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/noicomdien.png" alt="#">
															<img class="hover-img" src="images/noicomdien.png" alt="#">
															<span class="out-of-stock">Hot</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Nồi cơm điện</a></h3>
														<div class="product-price">
															<span class="old">$60.00</span>
															<span>$50.00</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="tulanh" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tulanh.png" alt="#">
															<img class="hover-img" src="images/tulanh.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tủ lạnh</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tulanh.png" alt="#">
															<img class="hover-img" src="images/tulanh.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tủ lạnh</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tulanh.png" alt="#">
															<img class="hover-img" src="images/tulanh.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tủ lạnh</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tulanh.png" alt="#">
															<img class="hover-img" src="images/tulanh.png" alt="#">
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tủ lạnh</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tulanh.png" alt="#">
															<img class="hover-img" src="images/tulanh.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tủ lạnh</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tulanh.png" alt="#">
															<img class="hover-img" src="images/tulanh.png" alt="#">
															<span class="price-dec">30% Off</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tủ lạnh</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tulanh.png" alt="#">
															<img class="hover-img" src="images/tulanh.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tủ lạnh</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/tulanh.png" alt="#">
															<img class="hover-img" src="images/tulanh.png" alt="#">
															<span class="out-of-stock">Hot</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Tủ lạnh</a></h3>
														<div class="product-price">
															<span class="old">$60.00</span>
															<span>$50.00</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="dieuhoa" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dieuhoa.png" alt="#">
															<img class="hover-img" src="images/dieuhoa.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điều hòa</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dieuhoa.png" alt="#">
															<img class="hover-img" src="images/dieuhoa.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điều hòa</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dieuhoa.png" alt="#">
															<img class="hover-img" src="images/dieuhoa.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điều hòa</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dieuhoa.png" alt="#">
															<img class="hover-img" src="images/dieuhoa.png" alt="#">
															<span class="new">New</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điều hòa</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dieuhoa.png" alt="#">
															<img class="hover-img" src="images/dieuhoa.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điều hòa</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dieuhoa.png" alt="#">
															<img class="hover-img" src="images/dieuhoa.png" alt="#">
															<span class="price-dec">30% Off</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điều hòa</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dieuhoa.png" alt="#">
															<img class="hover-img" src="images/dieuhoa.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điều hòa</a></h3>
														<div class="product-price">
															<span>$29.00</span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="default-img" src="images/dieuhoa.png" alt="#">
															<img class="hover-img" src="images/dieuhoa.png" alt="#">
															<span class="out-of-stock">Hot</span>
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Mua ngay</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Yêu thích</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Thêm vào so sánh</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="#">Điều hòa</a></h3>
														<div class="product-price">
															<span class="old">$60.00</span>
															<span>$50.00</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Single Tab -->
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->
	
	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Best Selling</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<?php
							$query = "SELECT p.SalePrice, b.ProductName, b.ImageUrl
									  FROM bestsellingproductbycategoryandmonth_result b, product p
									  WHERE b.ProductID = p.ProductID";
				 			$result = mysqli_query($con,$query);
							//using data from $result, $row['ProductName'], $row['ProductPrice'], $row['ImageURL']
							while ($row = mysqli_fetch_array($result)){
								echo "<div class='single-product'>
										<div class='product-img'>
											<a href='#'>
												<img class='default-img' src='".$row['ImageUrl']."' alt='#'>
												<img class='hover-img' src='".$row['ImageUrl']."' alt='#'>
											</a>
											<div class='button-head'>
												<div class='product-action'>
													<a data-toggle='modal' data-target='#exampleModal' title='Quick View' href='#'><i class=' ti-eye'></i><span>Mua ngay</span></a>
													<a title='Wishlist' href='#'><i class=' ti-heart '></i><span>Yêu thích</span></a>
													<a title='Compare' href='#'><i class='ti-bar-chart-alt'></i><span>Thêm vào so sánh</span></a>
												</div>
												<div class='product-action-2'>
													<a title='Add to cart' href='#'>Thêm vào giỏ hàng</a>
												</div>
											</div>
										</div>
										<div class='product-content'>
											<h3><a href='#'>".$row['ProductName']."</a></h3>
											<div class='product-price'>
												<span>".$row['SalePrice']."</span>
											</div>
										</div>
									</div>";
							}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
		
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Nhận thông báo qua email</h4>
							<p> Đăng ký và nhận <span>10%</span> giảm giá cho đơn hàng đầu tiên của bạn</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Nhập email của bạn" required="" type="email">
								<button class="btn">Đăng ký</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
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
 
	<!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
</body>
</html>