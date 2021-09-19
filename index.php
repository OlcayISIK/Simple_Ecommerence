<?php
session_start();
if(!isset($_SESSION['loginname']))
{
echo "<script type='text/javascript'>alert('You have to login');</script>";
header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
	

<head>
		<script type="text/javascript">
			if (top !== window) {
				top.location.href = window.location.href;
			}
			if (window.location.hash) {
				window.location.href = window.location.href.replace(window.location.hash, '');
			}
		</script>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Olcay IŞIK</title>

		<meta name="author" content="p-Themes">

		<!-- Favicon -->
		<link rel="shortcut icon" href="https://www.portotheme.com/html/molla/assets/images/demos-img/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
		<link rel="apple-touch-icon" href="../../../www.portotheme.com/html/molla/assets/images/demos-img/apple-touch-icon.html">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/css/main.min.css">
		<link rel="stylesheet" href="assets/css/dropdown.css">

	</head>
	<body>	
		<div class="page-wrapper">
			<header id="header">
				<div class="container-lg">
					<div class="header-left">
						<div class="logo">
							<a href="#"><img src="assets/images/demos-img/logo.png" alt="Molla Logo"></a>
						</div>
					</div>
					<div class="header-main">
						<ul class="menu">
							<li>
							<div class="dropdown">
								<a class="dropbtn"><i class="far fa-user"></i>   <?php echo $_SESSION['loginname']?></a>
								<div class="dropdown-content">
									<a href="http://localhost/yeter/yeter/logout.php">Logout</a>
									<a href="http://localhost/yeter/yeter/userinfo.php">User Informations</a>
								</div>
								</div>
							</li>
							<li>
								<a href="#" class="goto-demos">Products</a>
							</li>
							<li>
								<a href="http://localhost/yeter/yeter/cart.php">Go to My Cart</a>
							</li>
							<li>
								<a href="#" class="goto-elements">Elements</a>
							</li>
							<li>
								<a href="#" class="goto-support">Support</a>
							</li>
						</ul>
					</div>
				</div>
			</header>
			<div id="main">
				<section class="banner section-dark" style="background: #222;">
					<img src="assets/images/demos-img/header_splash.jpg" alt="" width="1920" height="1120">
					<div class="banner-text text-center">
						<h1>Multi-Purpose eCommerce HTML5 Template</h1>
						<h5 class="mb-5">Molla is simply the best choice for your new website. Your search for the best solution is over, get your own copy and join thousands of happy customers.</h5>
						<p class="mb-0"><a href="#" class="btn btn-primary btn-outline goto-demos">Explore Demos<i class="icon-long-arrow-alt-down"></i></a></p>
					</div>
				</section>
				<section class="section section-demos text-center container-lg">
					<h1>All Products</h1>
					<p><h4>WELCOME!!!</h4><br><h4>Istanbul Aydın University Products</h4></p>
					<div>
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST"  class="form-inline md-form mr-auto mb-4">
						<input type="text" placeholder="Search Product" name="search" class="form-control mr-sm-2" style="height:3em;size=5em;">
						<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
					</form>
					</div>
					<?php
						$con = mysqli_connect("localhost","root","E45pg876123","ecommerence");
						if(isset($_POST['search'])){

							$str = $_POST['search'];
							$query ="SELECT * FROM tbl_product WHERE name LIKE '%$str%'";
							$result = mysqli_query($con,$query);
							$count = mysqli_num_rows($result);
							if($count > 0){
								while($row = mysqli_fetch_array($result))
								{
							?>
						<div style="display:inline-block;margin-left:3em;margin-bottom:3em;">
							<form method="post" action="index.php"  class="goto-demos">
						
									<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
			
									<h4 class="text-info"><?php echo $row["name"]; ?></h4>
			
									<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
			
									<input type="text" style="width:50px" name="quantity" value="1" class="form-control" />
			
									<input type="hidden" style="width:100px" name="hidden_name" value="<?php echo $row["name"]; ?>" />
			
									<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
			
									<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"/>
			
								</div>
							</form>
					
						<?php
								}
							}else
							echo '<h2>'."Product Couldn't Find.".'</h2>';
						}
						?>
					<div class="demo-filter menu">
						<a href="#homepages" class="active">Woman Products</a>
						<a href="#shoppages">Man Products</a>
						<a href="#productpages">Child Products</a>
						<a href="#otherpages">Technology</a>
					</div>
					<div class="row demos" style="position: relative; height: 4018.04px;">
					<?php 

$connect = mysqli_connect("localhost", "root", "E45pg876123", "ecommerence");
if(isset($_POST["go_to_view"]))
{
	
	$name = $_POST['product_id'];  
}


if(isset($_POST["add_to_cart"]))
{
		$query = "SELECT product_quantity FROM tbl_cart WHERE product_id = ".$_GET["id"]." AND user_id = ".$_SESSION['id']." ";
		$results = mysqli_query($connect, $query);
		if(mysqli_num_rows($results) != 1){
		$query = "INSERT INTO tbl_cart VALUES(".$_SESSION['id'].", ".$_GET["id"].", '".$_POST["hidden_name"]."','".$_POST["hidden_price"]."',".$_POST["quantity"].",'".$_POST["image_name"]."')";
		$results = mysqli_query($connect, $query);
	}else{
		while($row = mysqli_fetch_array($results))
		{
			$newquantit=$_POST["quantity"]+$row['product_quantity'];
			$query = "UPDATE tbl_cart SET product_quantity = ".$newquantit." WHERE product_id = ".$_GET["id"]." AND user_id = ".$_SESSION['id']."";
			$results = mysqli_query($connect, $query);
			
		}
	}
}
if(isset($_POST["go_to_wishlist"]))
{	
	$control=true;
				$query = "SELECT * FROM tbl_wishlist";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{	
						$query = "SELECT * FROM tbl_wishlist WHERE product_id = ".$_POST["product_id"]."";
						$results = mysqli_query($connect, $query);
						if(mysqli_num_rows($results) == 0)
						{
							
								$query = "INSERT INTO tbl_wishlist (user_id, product_id, product_name, product_price,product_image) VALUES(".$_SESSION['id'].", ".$_POST["product_id"].", '".$_POST["hidden_name"]."',".$_POST["hidden_price"].",'".$_POST['image_name']."')";
								mysqli_query($connect, $query);
								$control = false;
						}	
					}
				}
				else{
					
							    $query = "INSERT INTO tbl_wishlist (user_id, product_id, product_name, product_price,product_image) VALUES(".$_SESSION['id'].", ".$_POST["product_id"].", '".$_POST["hidden_name"]."',".$_POST["hidden_price"].",'".$_POST['image_name']."')";
								mysqli_query($connect, $query);
								$control = false; 
						}	
					
				
				if($control == true){
						echo "yazılmadı";
				}
	
		
}
?>
			<?php
				$query = "SELECT * FROM tbl_product WHERE id < 50 ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="iso-item col-sm-6 col-md-4 col-lg-3 homepages" style="position: absolute; left: 0px; top: 0px;">
				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
			
						<img src="images/<?php echo $row["image"]; ?>" name="image" class="img-responsive" /><br />


						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" style="width:50px" name="quantity" value="1" class="form-control" />
						
						<input type="hidden" name="image_name" value="<?php echo $row["image"]; ?>" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<button name="add_to_cart" style="margin-top:5px;" class="btn btn-success"><i class="fas fa-cart-arrow-down"></i></button>

						<button name="go_to_view" style="margin-top:5px;" class="btn btn-success" formaction="product.php"><i class="far fa-eye"></i></button>

						<button name="go_to_wishlist" style="margin-top:5px;" class="btn btn-success" formaction="wishlist.php"><i class="fas fa-heart"></i></button>

					</div>
				</form>
		
			<?php
					}
				}
			?>
						<?php
							$query = "SELECT * FROM tbl_product WHERE id BETWEEN 50 AND 99 ORDER BY id ASC";
							$result = mysqli_query($connect, $query);
							if(mysqli_num_rows($result) > 0)
							{
								while($row = mysqli_fetch_array($result))
								{
							?>
						<div class="iso-item col-sm-6 col-md-4 col-lg-3 shoppages" style="position: absolute; left: 0px; top: 0px;">
						<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">

						<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" style="width:50px" name="quantity" value="1" class="form-control" />

						<input type="hidden" style="width:100px" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"/>

					</div>
				</form>
		
			<?php
					}
				}
			?>

<?php
				$query = "SELECT * FROM tbl_product WHERE id BETWEEN 100 AND 149 ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="iso-item col-sm-6 col-md-4 col-lg-3 productpages" style="position: absolute; left: 0px; top: 0px;">
				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
			
						<img src="images/<?php echo $row["image"]; ?>" name="image" class="img-responsive" /><br />


						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" style="width:50px" name="quantity" value="1" class="form-control" />

						<input type="hidden" style="width:100px" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" style="width:100px" name="product_id" value="<?php echo $row["id"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"/>

						<input type="submit" name="go_to_view" style="margin-top:5px;" class="btn btn-success" formaction="product.php" value="Look Deeper !"/>

						<input type="submit" name="go_to_wishlist" style="margin-top:5px;" class="btn btn-success" formaction="" value="Wishlist"/>

					</div>
				</form>
		
			<?php
					}
				}
			?>

<?php
				$query = "SELECT * FROM tbl_product WHERE id BETWEEN 150 AND 200 ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="iso-item col-sm-6 col-md-4 col-lg-3 otherpages" style="position: absolute; left: 0px; top: 0px;">
				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
			
						<img src="images/<?php echo $row["image"]; ?>" name="image" class="img-responsive" /><br />


						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" style="width:50px" name="quantity" value="1" class="form-control" />

						<input type="hidden" style="width:100px" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" style="width:100px" name="product_id" value="<?php echo $row["id"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"/>

						<input type="submit" name="go_to_view" style="margin-top:5px;" class="btn btn-success" formaction="product.php" value="Look Deeper !"/>

						<input type="submit" name="go_to_wishlist" style="margin-top:5px;" class="btn btn-success" formaction="" value="Wishlist"/>

					</div>
				</form>
		
			<?php
					}
				}
			?>
					</div>
					<h5 class="text-load-more">More New Demos Coming Soon ...</h5>
				</section>

				<section class="section section-elements container">
					<h2 class="text-center">Pages</h2>
					<p class="text-center">Please Select Page</p>
					<br>
					<div class="row">
						<div class="col-sm-6 col-md-3 col-lg-1-5">
							<a href="orders.php" target="_blank">
								<div class="img-box">
									<i class="img-banners"></i>
									<h5>Orders</h5>
								</div>
							</a>
						</div>
						<div class="col-sm-6 col-md-3 col-lg-1-5">
							<a href="wishlist.php" target="_blank">
								<div class="img-box">
									<i class="img-blog-posts"></i>
									<h5>Wishlist</h5>
								</div>
							</a>
						</div>
						<div class="col-sm-6 col-md-3 col-lg-1-5">
							<a href="userinfo.php" target="_blank">
								<div class="img-box">
									<i class="img-icon-boxes"></i>
									<h5>User Information</h5>
								</div>
							</a>
						</div>
						<div class="col-sm-6 col-md-3 col-lg-1-5">
							<a href="cart.php" target="_blank">
								<div class="img-box">
									<i class="img-product-categories"></i>
									<h5>My Cart</h5>
								</div>
							</a>
					</div>
				</section>
				<section class="section section-support section-dark">
					<div class="container molla-lz text-center" data-oi="assets/images/demos-img/support_bg.jpg">
						<h2>Olcay ISIK<span class="fw-400"></span>B1705.090032</h2>
						<p>Internet Programming-II Visa Project<br>Thank you for watching.</p>
					</div>
				</section>
			</div>
			<footer id="footer" class="container-lg">
				<div class="row">
					<div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
					</div>
					<div class="col-md-6 text-center text-md-right social-icons">
						<label class="mr-3">Social Media</label>
						<a href="#" title="Facebook"><i class="icon-facebook-f"></i></a>
						<a href="#" title="Twitter"><i class="icon-twitter"></i></a>
						<a href="#" title="Instagram"><i class="icon-instagram"></i></a>
						<a href="#" title="Youtube"><i class="icon-youtube"></i></a>
						<a href="#" title="Pinterest"><i class="icon-pinterest"></i></a>
					</div>
				</div>
			</footer>
		</div>

		<!-- Mobile Menu -->
		<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

		<div class="mobile-menu-container">
			<div class="mobile-menu-wrapper">
				<span class="mobile-menu-close"><i class="icon-close"></i></span>

				<nav class="mobile-nav">
					<ul class="mobile-menu">
						<li>
							<a href="#" class="goto-demos">Demos</a>
						</li>
						<li>
							<a href="#">Features</a>
						</li>
						<li>
							<a href="#">Elements</a>
						</li>
						<li>
							<a href="#">Support</a>
						</li>
					</ul>
				</nav><!-- End .mobile-nav -->

				<div class="d-flex justify-content-center social-icons">
					<a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
					<a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
					<a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
					<a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
				</div><!-- End .social-icons -->
			</div><!-- End .mobile-menu-wrapper -->
		</div><!-- End .mobile-menu-container -->

		<!-- Vendor -->
		<script src="lib/jquery/jquery.min.js"></script>
		<script src="lib/jquery.appear/jquery.appear.min.js"></script>
		<!--<script src="lib/popper/umd/popper.min.js"></script>-->
		<script src="lib/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="lib/isotope/jquery.isotope.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/main.js"></script>
	</body>

</html>