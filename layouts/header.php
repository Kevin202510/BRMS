
 <link rel="stylesheet" href="css/loginmodal.css">
 

<div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					
                    <div class="right-phone-box">
                        <p>Call US: 0966-8298-686</p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i>location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div> 
                <div class="col-lg-6">
                    
					<div class="login-box" style="width: 200px" >
                     <div class = "container">
                        <button class = "btn btn-primary btn-lg" data-toggle = "modal"
                         data-target="#loginsModal">Sign In/Register</button>
</div>
<?php include('loginmodal.php');?>
    
					</div>
                    
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand"><img src="images/logo5.jpg" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                
                <div class="collapse navbar-collapse" id="navbar-menu">
                    
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                       
                        
                    <li class="home">
                    <a style="color: black;" href="shop.php"  data-toggle="dropdown">HOME</a>
</li>
</ul>
                        <li class="dropdown"> 
                            <a style="color: white;" href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
								<li><a href="shop.php">Products</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="my-account.html">My Account</a></li>

                            </ul>
</li>
                    
                </div>
                <!-- /.navbar-collapse -->
                <!-- Start Atribute Navigation -->
                
                
                    
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
     
                        <li class="search"><a style="color: #EF9273; ;" href="#"><i class="fa fa-search"></i></a></li>
</ul>

<div class="attr-nav">
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"> </i>
								<p>My Cart</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                    <?php
                                include('APIFUNCTION/DBCRUD.php');
                                $newDBCRUD = new DBCRUD();
                                $newDBCRUD->selectleftjoin3();
                                $userLists = $newDBCRUD->sql;
                        
                                $index = 1;
                                while ($data = mysqli_fetch_assoc($userLists)){
                            ?>
                        <li>
                            <a href="#" class="photo"><img class="img-fluid" src="images/sut1.jpg" alt="" class="cart-thumb" alt="" /></a>
                            <h6><a href="#"><?php echo $data['name']?></a></h6>
                            <p><?php echo $data['quantity']?>x- <span class="price"><?php echo $data['price']?></span></p>
                            
                        
                        
                            
                        </li> 
                                </li>
                        <?php } ?>
                        <li class="total">
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        </li>
                    </ul>
                    
            </div>
            
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
   
   