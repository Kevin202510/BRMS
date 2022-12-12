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

            header("location: index.php");
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
        //echo "<script>alert('Succes');</script>";
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
                        <a class="btn hvr-hover"style="color:white;">Accessories</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/costume.jpg" alt="" />
                        <a class="btn hvr-hover" style="color:white;">Barongs & Costumes</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/gown.jpg" alt="" />
                        <a class="btn hvr-hover" style="color:white;">Suits & Gowns</a>
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
                    <h1 class="heading"><span>Apparel</span> </h1>
                       <p>Web-Based Boutique Rental System</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special">
            <?php
                // include('APIFUNCTION/DBCRUD.php');
                // $newDBCRUD = new DBCRUD();
                $newDBCRUD->select("products","*");
                $userLists = $newDBCRUD->sql;
        
                $index = 1;
                while ($data = mysqli_fetch_assoc($userLists)){
            ?>

                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                           
                            </div>
                            <img src="adminViews/uploads/<?php echo $data["image"]; ?>" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                            <?php if($data['stocks']==0){ ?>
                                <ul>
                                <li><a href="shopdetail.php" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            <?php }else{ ?>
                                <ul>
                                <li><a href="shopdetail.php" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                </ul>

                                <?php if(isset($_SESSION['PERMISSION_ID'])){ ?>
                                    <a type="button" class="cart" data-id="<?php echo $data['product_id']; ?>" id="addtc">Add to Cart</a>
                                <?php }else{ ?>
                                    <a type="button" class="cart" data-toggle = "modal" data-target="#loginsModal">Add to Cart</a>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?php echo $data['name']; ?></h4>
                            <?php if($data['stocks']==0){ ?>
                                <h4 style="color:red;">Out Of Stock</h4>
                            <?php }else{ ?>
                                <h4>Stocks: <?php echo $data['stocks']; ?></h4>
                            <?php } ?>
                            <h5 style="color:white;">₱ <?php echo $data['price']; ?></h5>
                        </div>
                    </div>
                </div>

                <?php }?>
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
                         <h1 class="heading" style="color:#8d7252;"> Latest<span>Blog</span> </h1>
                        
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
    <?php include('loginmodal.php');?>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <?php include('layouts/footer.php');?>
    <!-- end footer -->


    <div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="categoriesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#EF9273;">
   <h2 class="modal-title" id="categoriesModalLabel" style="color:white; text-align:center;">Categories</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" id="addtcart">
        <input type="hidden" id="product_id" name="product_id">

        <?php 
        if(isset($_SESSION['PERMISSION_ID'])){
            $id=$_SESSION['ID']; ?>
        <input type="hidden" id="cart_user_id" name="cart_user_id" value="<?php echo $id;?>">
        <?php }?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <h4 style="color:#8d7252; font-family:poppins">Product Name</h4>
                    <input type="text" class="form-control" id="name"readonly>
                </div>
                <div class="col-md-6">
                <h4 style="color:#8d7252; font-family:poppins">Product price</h4>
                    <input type="text" class="form-control" id="price" readonly>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                <h4 style="color:#8d7252; font-family:poppins">Product variation</h4>

               

                    <input type="text" class="form-control" id="variation" readonly>
                </div>
            </div>

            <br>
            <div class="row">
            <div class="col-md-6">
            <h4 style="color:#8d7252; font-family:poppins">Product description</h4>
                    <textarea id="description" cols="12" rows="5" readonly></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                <h4 style="color:#8d7252; font-family:poppins">Quantity</h4>
                    <input type="number" class="form-control" min="1" step="1"  id="quantity" name="quantity">
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="addmotosacart">Add To Cart</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $("body").on('click',"#addtc",function(e){
            let dataid = $(e.currentTarget).data("id");
            $.post("addtocart.php",{PRODUCT_ID:dataid},function(data,status){
                console.log(data);
                let newdata = JSON.parse(data);
                $("#product_id").val(newdata.product_id);
                $("#image").val(newdata.image);
                $("#name").val(newdata.name);
                $("#price").val(newdata.price);
                $("#variation").val(newdata.variation);
                $("#description").val(newdata.description);
                $("#quantity").attr({"max":newdata.stocks});
            })

            $("#categoriesModal").modal("show");
        });

        $("[type='number']").keypress(function (evt) {
            evt.preventDefault();
        });

        $("#addtcart").submit(function(e){
            let formdata = $("#addtcart").serializeArray();
            event.preventDefault();
            $.post("addtocart.php",formdata,function(data,status){
                location.reload();
            });
        });

    });

    
</script>

