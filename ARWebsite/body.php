<?php
// session_start();
include("db.php"); // Assuming db.php contains the database connection code
error_reporting(0);
?>
<style>
	#notification {
		position: fixed;
		top: 20px;
		left: 50%;
		transform: translateX(-50%);
		background-color: #f8f9fa;
		border: 1px solid #ced4da;
		border-radius: 5px;
		padding: 20px;
		max-width: 400px;
		text-align: center;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		z-index: 9999;
	}

	#notification p {
		margin-bottom: 10px;
	}

	#notification button {
		background-color: #007bff;
		color: #fff;
		border: none;
		padding: 10px 20px;
		border-radius: 5px;
		cursor: pointer;
		transition: background-color 0.3s;
	}

	#notification button:hover {
		background-color: #0056b3;
	}
</style>

<div class="content">
	<div class="container-fluid">
		<div class="col-md-14">
			<!-- Notification dialogue box -->
			<div id="notification" style="display: none;">
				<p>Check out the latest adds</p>
				<button onclick="showProducts()">Ok</button>
				<button onclick="closeNotification()">Close</button> <!-- New close button -->
			</div>
			<script>
				window.onload = function() {
					document.getElementById("notification").style.display = "block";
				}

				function showProducts() {
					
    // Redirect to another page
    window.location.href = "product_noti.php";
}
				

				function closeNotification() {
					document.getElementById("notification").style.display = "none";
				}
			</script>
			<!-- Original code continues below -->
			<div class="card" id="productCard" style="display: none;">
				<div class="card-header card-header-primary">
					<h4 class="card-title">Products List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive ps">
						<table class="table tablesorter" id="page1">
							<!-- Table headers -->
							<thead class="text-primary">
								<tr>
									<th>Image</th>
									<th>Name</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<?php
								// Fetch latest products
								$result = mysqli_query($con, "SELECT product_id, product_image, product_title, product_price FROM products ORDER BY product_id DESC LIMIT 10");

								// Check for errors
								if (!$result) {
									die("Database query failed: " . mysqli_error($con));
								}

								while ($row = mysqli_fetch_array($result)) {
									$product_id = $row['product_id'];
									$image = $row['product_image'];
									$product_name = substr($row['product_title'], 0, 36);
									$price = $row['product_price'];

									echo "<tr><td><img src='product_images/$image' style='width:50px; height:50px; border:groove #000'></td><td>$product_name</td>
                                    <td>RS $price</td></tr>";
								}
								?>
							</tbody>
						</table>
						<!-- Pagination -->
						<!-- Pagination logic goes here -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- original code -->
<div class="main main-raised">
	<div class="container mainn-raised" style="width:100%;">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->


			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<div class="item active">
					<img src="img/banner3.jpg" alt="Los Angeles" style="width:100%;">

				</div>

				<div class="item">
					<img src="img/banner2.jpg" style="width:100%;">

				</div>

				<div class="item">
					<img src="img/banner4.jpg" alt="New York" style="width:100%;">

				</div>
				<div class="item">
					<img src="img/banner1.jpg" alt="New York" style="width:100%;">

				</div>
				<div class="item">
					<img src="img/banner3.jpg" alt="New York" style="width:100%;">

				</div>

			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>



	<!-- SECTION -->
	<div class="section mainn mainn-raised">

		<!-- container -->
		<div class="container">

			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<a href="product.php?p=84">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>SUV<br>Collection</h3>
								<a href="product.php?p=84" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<a href="product.php?p=86">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Sedan<br>Collection</h3>
								<a href="product.php?p=86" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<a href="product.php?p=87">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Hatchback<br>Collection</h3>
								<a href="product.php?p=87" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">New Products</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Sedan</a></li>
								<li><a data-toggle="tab" href="#tab1">SUV</a></li>
								<li><a data-toggle="tab" href="#tab1">Hatchback</a></li>
								<li><a data-toggle="tab" href="#tab1">Coupe</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12 mainn mainn-raised">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">

									<?php
									include 'db.php';


									$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 85 AND 90";
									$run_query = mysqli_query($con, $product_query);
									if (mysqli_num_rows($run_query) > 0) {

										while ($row = mysqli_fetch_array($run_query)) {
											$pro_id    = $row['product_id'];
											$pro_cat   = $row['product_cat'];
											$pro_brand = $row['product_brand'];
											$pro_title = $row['product_title'];
											$pro_price = $row['product_price'];
											$pro_image = $row['product_image'];

											$cat_name = $row["cat_title"];

											echo "
				
                        
                                
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>₹990000.00</del></h4>
										<div class='product-rating'>";
											$rating_query = "SELECT ROUND(AVG(rating),1) AS avg_rating  FROM reviews WHERE product_id='$pro_id '";
											$run_review_query = mysqli_query($con, $rating_query);
											$review_row = mysqli_fetch_array($run_review_query);

											if ($review_row > 0) {
												$avg_count = $review_row["avg_rating"];
												$i = 1;
												while ($i <= round($avg_count)) {
													$i++;
													echo '
													<i class="fa fa-star"></i>';
												}
												$i = 1;
												while ($i <= 5 - round($avg_count)) {
													$i++;
													echo '
													<i class="fa fa-star-o empty"></i>';
												}
											}
											echo "</div>
										<div class='product-btns'>
											<button pid='$pro_id' id='wishlist' class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
                               
							
                        
			";
										};
									}
									?>
									<!-- product -->


									<!-- /product -->


									<!-- /product -->
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section mainn mainn-raised">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3>02</h3>
									<span>Days</span>
								</div>
							</li>
							<li>
								<div>
									<h3>10</h3>
									<span>Hours</span>
								</div>
							</li>
							<li>
								<div>
									<h3>34</h3>
									<span>Mins</span>
								</div>
							</li>
							<li>
								<div>
									<h3>60</h3>
									<span>Secs</span>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase">hot deal this week</h2>
						<p>New Collection Up to 50% OFF</p>
						<a class="primary-btn cta-btn" href="store.php">Shop now</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->


	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Top selling</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab2">Hatchback</a></li>
								<li><a data-toggle="tab" href="#tab2">Sedan</a></li>
								<li><a data-toggle="tab" href="#tab2">SUV</a></li>
								<li><a data-toggle="tab" href="#tab2">Convertible</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12 mainn mainn-raised">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab2" class="tab-pane fade in active">
								<div class="products-slick" data-nav="#slick-nav-2">
									<!-- product -->
									<?php
									include 'db.php';


									$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 85 AND 90";
									$run_query = mysqli_query($con, $product_query);
									if (mysqli_num_rows($run_query) > 0) {

										while ($row = mysqli_fetch_array($run_query)) {
											$pro_id    = $row['product_id'];
											$pro_cat   = $row['product_cat'];
											$pro_brand = $row['product_brand'];
											$pro_title = $row['product_title'];
											$pro_price = $row['product_price'];
											$pro_image = $row['product_image'];

											$cat_name = $row["cat_title"];

											echo "
				
                        
                                
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>₹990000.00</del></h4>
										<div class='product-rating'>";
											$rating_query = "SELECT ROUND(AVG(rating),1) AS avg_rating  FROM reviews WHERE product_id='$pro_id '";
											$run_review_query = mysqli_query($con, $rating_query);
											$review_row = mysqli_fetch_array($run_review_query);

											if ($review_row > 0) {
												$avg_count = $review_row["avg_rating"];
												$i = 1;
												while ($i <= round($avg_count)) {
													$i++;
													echo '
													<i class="fa fa-star"></i>';
												}
												$i = 1;
												while ($i <= 5 - round($avg_count)) {
													$i++;
													echo '
													<i class="fa fa-star-o empty"></i>';
												}
											}
											echo "</div>
										<div class='product-btns'>
											<button pid='$pro_id' id='wishlist' class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
                               
							
                        
			";
										};
									}
									?>

									<!-- /product -->
								</div>
								<div id="slick-nav-2" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Top selling</h4>
						<div class="section-nav">
							<div id="slick-nav-3" class="products-slick-nav"></div>
						</div>
					</div>


					<div class="products-widget-slick" data-nav="#slick-nav-3">
						<div id="get_product_home">
							<!-- product widget -->

							<!-- product widget -->
						</div>

						<div id="get_product_home2">
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Blue BMW car</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Top selling</h4>
						<div class="section-nav">
							<div id="slick-nav-4" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-4">
						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product04.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product05.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product06.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product07.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product08.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product09.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>
					</div>
				</div>

				<div class="clearfix visible-sm visible-xs">

				</div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Top selling</h4>
						<div class="section-nav">
							<div id="slick-nav-5" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-5">
						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product04.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->


							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product05.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product06.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">Toyota Land Cruiser</a></h3>
									<h4 class="product-price">₹980000.00 <del class="product-old-price">₹990000.00</del></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
</div>