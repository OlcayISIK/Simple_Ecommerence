<?php
session_start();
 $conn = mysqli_connect("localhost","root","E45pg876123","ecommerence");
?>
<!DOCTYPE html>
<html lang="en">
<!-- molla/product.html  22 Nov 2019 09:54:50 GMT -->
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
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
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
        			<h1 class="page-title">Product Page<span>Look Deeper!!</span></h1>
        		</div><!-- End .container -->
        	</div>
            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                    <?php                        
                            $id = $_POST['product_id'];
							$query ="SELECT * FROM tbl_product WHERE id = $id";
							$result = mysqli_query($conn,$query);
							$count = mysqli_num_rows($result);
							if($count > 0){
								while($row = mysqli_fetch_array($result))
								{
                                    $product_id = $row['id'];
                                    ?>
                                        <figure class="product-main-image">
                                        <?php echo $values["item_picture"]; ?>
                                            <img id="product-zoom" src="images/<?php echo $row["image"]; ?>" data-zoom-image="images/<?php echo $row["image"]; ?>" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details" style="margin-top:15em">
                                    <h1 class="product-title"><?php echo $row["name"]; ?></h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                    $ <?php echo $row["price"]; ?>
                                    </div><!-- End .product-price -->
                                    <?php
                                }
                            }
                        
							?>
                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Make Comment</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. </p>
                                    <ul>
                                        <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                        <li>Vivamus finibus vel mauris ut vehicula.</li>
                                        <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                                    </ul>

                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                            <?php
                                                error_reporting(0); // For not showing any error
                                                if (isset($_POST['submit'])) { // Check press or not Post Comment Button
                                                    $name = $_POST['name']; // Get Name from form
                                                    $email = $_POST['email']; // Get Email from form
                                                    $comment = $_POST['comment']; // Get Comment from form
                                                    $sql = "INSERT INTO comments (product_id,name, email, comment) VALUES ( ".$_POST['product_id'].",'$name', '$email', '$comment')";
                                                    $result = mysqli_query($conn, $sql);
                                                    if ($result) {
                                                        echo "<script>alert('Comment added successfully.')</script>";
                                                    } else {
                                                        echo "<script>alert('Comment does not add.')</script>";
                                                    }
                                                }
                                               if(isset($_SESSION['id'])){
                                                ?>
                                <form action="" method="POST" class="form">
                                    <div class="form-group">
                                        <div  class="form-group">
                                            <label style="margin-left:51em;" for="formGroupExampleInput">Name</label>
                                            <input style="margin-left:45em;width:15em;" type="text" name="name" class="form-control" value="<?php echo $_SESSION['loginname']?>"  required>
                                        </div>
                                        <div  class="form-group">
                                            <label style="margin-left:51em;" for="exampleInputEmail1">Email</label>
                                            <input  style="margin-left:45em;width:15em;" type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION['email']?>"  required>
                                        </div>
                                    </div>
                                    <div  class="form-group">
                                        <label style="margin-left:50em;" for="formGroupExampleInput">Comment</label>
                                        <textarea  style="margin-left:40em;width:26em;" class="form-control" id="exampleFormControlTextarea1" name="comment" placeholder="Enter your Comment" required></textarea>
                                    </div>
                                    <div  class="form-group">
					                    	<input style="margin-left:51em;" type="hidden" name="product_id" value="<?php echo $id; ?>" />
                                        <button style="margin-left:47em;" formaction="product.php" name="submit" class="btn btn-info">Post Comment</button>
                                    </div>
                                </form>
                                <?php } ?>
                                <div style="width:104em" class="prev-comments">
                                    <?php 
                                    
                                    $sql = "SELECT * FROM comments WHERE product_id = ".$_POST['product_id']."";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                    ?>
                                    <div style="border-style: double;width:100%" class="single-item">
                                        <h4><?php echo $row['name']; ?></h4>
                                        <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                                        <p><?php echo $row['comment']; ?></p>
                                    </div>
                                    <?php

                                        }
                                    }
                                    
                                    ?>
                                </div>
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->
    



    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>