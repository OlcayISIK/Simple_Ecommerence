<?php
session_start();
$connect = mysqli_connect("localhost", "root", "E45pg876123", "users");
?>
<!DOCTYPE html>
<html lang="en">

<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
            <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows sf-js-enabled" style="touch-action: pan-y;">
                                <li class="megamenu-container active">
                                    <a href="index.php" class="sf-with-ul">Home</a>
                                </li>
                                <li>
                                    <a href="category.html" class="sf-with-ul">Shop</a>
                                </li>
                                <li>
                                    <a href="product.html" class="sf-with-ul">Product</a>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Pages</a>
                                </li>
                    
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->
                </div>
                <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">User Information Page<span>Hello <?php echo $_SESSION['loginname']?></span></h1>
        		</div><!-- End .container -->
            </div>
            <?php
							$pass;
							 $query ='SELECT * FROM users WHERE id = '.$_SESSION['id'].'';
                             $results = mysqli_query($connect, $query);
                             $count = mysqli_num_rows($results);
                             if($count > 0){
                               while($row = mysqli_fetch_array($results))
                               {
											$pass=$row['password'];
                                        }
                                    }
								if(isset($_POST['passUpdate']))
								{
									if($_POST['oldpassword']==$pass)
									{
										if($_POST['newpassword']==$_POST['repeatpassword'])
										{
										    $query ='UPDATE users SET password = '.$_POST['newpassword'].' WHERE id =  '.$_SESSION['id'].'';
                                            mysqli_query($connect, $query);
										}
										else
											echo "<h2>Pass not macth</h2>";
									}
								}
						?>
            <div>
            <form action="userinfo.php" method="POST" class="form">
                                    <div class="form-group"style="margin:auto;width:40%;text-align:center;">
                                        <div class="form-group">
                                            <label  for="formGroupExampleInput">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter your Name" required>
                                        </div>
                                        <div  class="form-group">
                                            <label style="margin:auto; for="exampleInputEmail1">Email</label>
                                            <input  style="margin:auto; type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label  for="formGroupExampleInput">Old Password</label>
                                            <input type="text" name="oldpassword" class="form-control" placeholder="Enter your Old Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label  for="formGroupExampleInput">New Password</label>
                                            <input type="text" name="newpassword" class="form-control" placeholder="Enter your New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label  for="formGroupExampleInput">Password Repeat</label>
                                            <input type="text" name="repeatpassword" class="form-control" placeholder="Repeat Password" required>
                                        </div>
                                        <div class="form-group">
                                        <input type="submit" name="passUpdate" class="btn btn-success" value="Apply Changes"/>
                                        </div>
                                    </div>
                                </form>
                                </div>
            <footer class="footer">
        	<div class="footer-middle">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget widget-about">
	            				<img src="assets/images/logo.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
	            				<p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

	            				<div class="social-icons">
	            					<a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
	            					<a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
	            					<a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
	            					<a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
	            					<a href="#" class="social-icon" target="_blank" title="Pinterest"><i class="icon-pinterest"></i></a>
	            				</div><!-- End .soial-icons -->
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="about.html">About Molla</a></li>
	            					<li><a href="#">How to shop on Molla</a></li>
	            					<li><a href="#">FAQ</a></li>
	            					<li><a href="contact.html">Contact us</a></li>
	            					<li><a href="login.html">Log in</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright">Copyright ?? 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
	        		<figure class="footer-payments">
	        			<img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
	        		</figure><!-- End .footer-payments -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->
</html>