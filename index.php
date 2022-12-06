<?php
 session_start();
    include('APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();

    if(isset($_POST["signin"])){
        $whereclause = "email = '".$_POST["email"]."' AND password = '".$_POST["password"]."'";
        $newDBCRUD->select("users","*",$whereclause);
        $catlist = $newDBCRUD->sql;

        $index = 1;
        while ($data = mysqli_fetch_assoc($catlist)){
            if($data["user_permission_id"]==1 || $data['user_permission_id']==3){
                $_SESSION['PERMISSION_ID'] = $data['user_permission_id'];
                $_SESSION['FULLNAME'] = $data['fname']." ".$data['lname'];
                $_SESSION['ID'] = $data['user_id'];
                header("location: adminViews/index.php");
            }
        else{
            $_SESSION['PERMISSION_ID'] = $data['user_permission_id'];
            $_SESSION['FULLNAME'] = $data['fname']." ".$data['lname'];
            $_SESSION['ID'] = $data['user_id'];

            header("location: shop.php");
        }
    }
 
        
    }
?>
<?php

if(isset($_POST['adduser'])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $address = $_POST["address"];
    $contact_num = $_POST["contact_num"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user_permission_id = $_POST["user_permission_id"];

    $newDBCRUD->insert('users',['user_permission_id'=>$user_permission_id,
    'fname'=>$fname,
    'lname'=>$lname,
    'address'=>$address,
    'contact_num'=>$contact_num,
    'email'=>$email,
    'username'=>$username,'password'=>$password]);

    if($newDBCRUD){
        // echo "<script>alert('Succes');</script>";
        header("location:index.php");
    }else{
        return 0;
    }

}


?>

<?php include('layouts/head.php');?>
    <!-- Start Main Top -->
    <?php include('layouts/header.php');?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <?php include('layouts/searchbar.php');?>    
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/bolero0.png" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20" style="font-family: poppins; font-size:4.5rem;"><strong>Welcome To <br> Gil's Creation</strong></h1>
                            <p class="m-b-40"> WEB-BASED BOUTIQUE RENTAL SYSTEM</p>
                            <p><a class="btn hvr-hover" style="color:white; border-radius: 25px;font-weight:Bold;"  href="shop.php">Rent Now</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/cos.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"style="font-family: poppins; font-size:4.5rem;"><strong>Welcome To <br> Gil's Creation</strong></h1>
                            <p class="m-b-40"> WEB-BASED BOUTIQUE RENTAL SYSTEM</p>
                            <p><a class="btn hvr-hover" style="color:white; border-radius: 25px; font-weight:Bold;" href="shop.php">Rent Now</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/bolero.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"style="font-family: poppins; font-size:4.5rem;"><strong>Welcome To <br> Gil's Creation</strong></h1>
                            <p class="m-b-40"> WEB-BASED BOUTIQUE RENTAL SYSTEM</p>
                            <p><a class="btn hvr-hover" style="color:white; border-radius: 25px; font-weight:Bold;"  href="#">Rent Now</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
      
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/access.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Accessories</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/costume.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Costumes</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/gown.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Gowns</a>
                    </div>

                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->
	
	<div class="box-add-products">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="images/bagu.jpg" alt="" />
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="images/bagu2.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Start Products  -->

    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                    <h1 class="heading"><span>Products</span> </h1>
                       <p>Web-Based Boutique Rental System</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">Top featured</button>
                            <button data-filter=".best-seller">Best Rented</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                           
                            </div>
                            <img src="images/cc1.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                   
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Peruvian Alpaca Costume</h4>
                            <h5> ₱1200.00</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                              
                            </div>
                            <img src="images/sut1.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    
                                   
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Men - White Cocoon Calado <br>Barong Tagalog</h4>
                            <h5> ₱950.00</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                            
                            </div>
                            <img src="images/cc2.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                  
                                   
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            
                            <h4> Hanbok Korean Costume</h4>
                            <h5> ₱1300.00</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                               
                            </div>
                            <img src="images/womenn.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Women - Tagalog Barong Creme</h4>
                            <h5> ₱1000.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products  -->

    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                         <h1 class="heading"> Latest<span>Blog</span> </h1>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/blog.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/blog3.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/blog2.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/access2.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/barongw.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/5.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/gown2.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/barong.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/1.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <?php include('layouts/footer.php');?>
    <!-- end footer -->
