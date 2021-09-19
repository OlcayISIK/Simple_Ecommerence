<?php
        session_start();
$connect = mysqli_connect("localhost", "root", "E45pg876123", "ecommerence");
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
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
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div>

<?php
if(isset($_POST["remove"]))
{

        $query = "DELETE FROM tbl_cart WHERE user_id = ".$_SESSION['id']." AND product_id = ".$_POST['remove']."";
        $result = mysqli_query($connect, $query);
	}
                        if(isset($_POST['buy']))
                        {
                            $query = "SELECT * FROM tbl_cart WHERE user_id = ".$_SESSION['id']."";
                            $result = mysqli_query($connect, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                           $query="INSERT INTO tbl_order (user_id, product_name, product_quantity, product_price, product_image, country, city, district, street, address) 
                             VALUES (".$_SESSION['id'].", '".$row['product_name']."', ".$row['product_quantity'].", ".$row['product_price'].",'".$row['product_image']."', '".$_POST['Country']."', 
                             '".$_POST['City']."', '".$_POST['District']."', '".$_POST['Street']."', '".$_POST['Address']."')  ";
                            mysqli_query($connect, $query);
                                }
                            }
                            $query="DELETE FROM tbl_cart WHERE user_id = ".$_SESSION['id']." ";
                            $result = mysqli_query($connect, $query);
                        }
                    ?>
        <div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
                        <th width="10%">Item Image</th>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					$query = "SELECT * FROM tbl_cart WHERE user_id = ".$_SESSION['id']."";
                    $result = mysqli_query($connect, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                    ?>
                    <form method="post" action="cart.php">
					<tr> 
                        <td><img src="images/<?php echo $row["product_image"]; ?>" class="img-responsive" /></td>
						<td><?php echo $row["product_name"]; ?></td>
						<td><?php echo $row["product_quantity"]; ?></td>
						<td>$ <?php echo $row["product_price"]; ?></td>
						<td>$ <?php echo number_format($row["product_quantity"] * $row["product_price"], 2);?></td>
						<td><button name="remove" style="margin-top:5px;" class="btn btn-danger" value="<?php echo $row["product_id"]; ?>"/><i class="far fa-trash-alt"></i></button></td>
					</tr>
                    </from>
					<?php
							$total = $total + ($row["product_quantity"] * $row["product_price"]);
                        }
                    }
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Buy<i class="fas fa-money-check-alt"></i></button></td>
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="cart.php" methot="POST">
                                <div style="padding:5%" class="modal-body">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Country:</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="Country" placeholder="Enter Your Country">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">City:</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" name="City" placeholder="Enter Your City">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">District:</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="District" placeholder="Enter Your District">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Street:</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" name="Street" placeholder="Enter Your Street">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Address:</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" name="Address" placeholder="Enter Your Address">
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button  name="buy" formaction="orders.php" class="btn btn-primary">Go Order <i class="far fa-paper-plane"></i></button>
                                    </div>
                            
					                    	<input type="hidden" name="product_name" value="<?php echo $row["product_name"]; ?>" />
					                    	<input type="hidden" name="product_quantity" value="<?php echo $row["product_quantity"]; ?>" />
					                    	<input type="hidden" name="product_price" value="<?php echo $row["product_price"]; ?>" />
                            </form>
                            </div>
                        </div>
                        </div> 
					</tr>						
				</table>
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
	        		<p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
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
