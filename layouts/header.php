
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
                <?php if(isset($_SESSION['PERMISSION_ID'])){
                       ?>
    
              <form method="post">
                                    <input type="submit" name="logoutnako" class="btn btn-primary btn-sm" style="width:100px; border-radius:7rem; float:right;"   class="nav-link" value="Logout">
                                </form>
                                <?php }else{?>
					<div class="login-box" style="width: 200px" >
                     <div class = "container">
                        <button class = "btn btn-primary btn-lg" data-toggle = "modal"
                         data-target="#loginsModal">Sign In/Register</button>
                </div>
                <?php include('loginmodal.php');?>
                  
					</div>
                    <?php }?>
                    
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
                       
                     <li>   
                    <a href="index.php" class="ml-auto btn ">HOME</a>
</li>
                        <li class="dropdown"> 
                            <a style="color: #8d7252;" href="#" class="ml-auto btn" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu" style="background-color: #8d7252;" >
								<li><a href="shop.php">Apparel</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="myaccount.php">My Account</a></li>
                                
                            </ul>
</li>
                    
                </div>
                <!-- /.navbar-collapse -->
                <!-- Start Atribute Navigation -->
                
                
               
<div class="attr-nav">
                        <li class="side-menu">
							<a href="#">
                            
								<i class="fa fa-shopping-bag"style="color: #8d7252;" > </i>
								<p>CART</p>
							</a>
						</li>
                    </ul>
                    
                </div>
                <div class="attr-nav">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
     
                        <li class="search"><a style="color: #EF9273; ;" href="#"><i class="fa fa-search"></i></a></li>
</ul>
</div>
<?php if(isset($_SESSION['PERMISSION_ID'])){
                       ?>
                  <a href = "customerprofile.php"><h3  style=" font-family:poppins; color:#8d7252;"><?php echo $_SESSION['FULLNAME'];?></h3></a>
               </div>
               <?php }?>
                <!-- End Atribute Navigation -->
            </div>
            
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                    <?php
                                include_once('APIFUNCTION/DBCRUD.php');
                                $newDBCRUD = new DBCRUD();
                                if(isset($_SESSION['PERMISSION_ID'])){
                                    $ids=$_SESSION['ID'];
                                $newDBCRUD->selectleftjoin3($ids);
                                $userLists = $newDBCRUD->sql;
                        
                                $index = 1;
                                while ($data = mysqli_fetch_assoc($userLists)){
                            ?>
                        <li>
                        <img style="width:150px;" src="adminViews/uploads/<?php echo $data["image"]; ?>" class="img-thumbnail">
                            <h6><a href="#"><?php echo $data['name']?></a></h6>
                            <p><?php echo $data['quantity']?>x- <span class="price"><?php echo $data['price']?></span></p>
                            
                        
                        
                            
                        </li> 
                                </li>
                        <?php } }?>
                        <li class="total">
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        </li>
                    </ul>
                    
            </div>
            
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
   
   