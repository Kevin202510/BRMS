<?php session_start(); ?>
<?php include('layouts/head.php');?>

    <!-- Start Main Top -->
    <?php include('layouts/header.php');?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <?php include('layouts/searchbar.php');?>   
    <!-- Start All Title Box -->

    <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="scriptquantity.css">
    <script src="script.js"></script>


    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
               
                    <h2>Apparel</h2>
                
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"  style="color:white; ">Apparel</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End All Title Box-->

    <!--Start Shop Page-->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row" style="color:#8d7252;">
                            <div class="col-12 col-sm-8 text-center text-sm-left">

                                   <h3 style="color:#EF9273;">♡ Buy Less . Wear More . Start Renting ♡</h3>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>

                        <div class="product-categories-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row" id="productss">
                                    <?php
                                            // include('APIFUNCTION/DBCRUD.php');
                                            // $newDBCRUD = new DBCRUD();
                                            $newDBCRUD->select("products","*");
                                            $userLists = $newDBCRUD->sql;
                                    
                                            $index = 1;
                                            while ($data = mysqli_fetch_assoc($userLists)){
                                        ?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                <img style="width:200px; height:250px;" src="adminViews/uploads/<?php echo $data["image"]; ?>" class="img-thumbnail">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="shopdetail.php" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                        </ul>
                                                        <div class= "pointed">
                                                            <a type="button" class="cart" data-id="<?php echo $data['product_id']; ?>" id="addtc">Add to Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><?php echo $data['name']; ?></h4>
                                                    <h4>Stocks: <?php echo $data['stocks']; ?></h4>
                                                    <h5  style="color:white; ">₱ <?php echo $data['price']; ?></h5>
                                                </div>
                                            </div>
                                        </div>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">CHOOSE <small class="text-muted"></small>
								</a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div style = "cursor:pointer" class="list-group">
                                            <?php
                                              
                                                $newDBCRUD->select("categories","*");
                                                $catlist = $newDBCRUD->sql;
                                        
                                                $index = 1;
                                                while ($data = mysqli_fetch_assoc($catlist)){
                                            ?>
                                            <a data-id="<?php echo $data['category_id'] ?>" id="prodcat" class="list-group-item list-group-item-action active"><?php echo strtoupper($data['cat_name']) ?><small class="text-muted"></small></a>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
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
    
<div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="categoriesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#EF9273;">
   <h2 class="modal-title" id="categoriesModalLabel" style="color:white; text-align:center; left: 180px;">Add to Cart</h2>
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
                    <h4 style="color:#8d7252; font-family:poppins">Apparel Name</h4>
                    <span type="text" class="form-control"  style="font-size:19px; border:none; background-color:transparent;" id="name" disabled></span>
                </div>
                <div class="col-md-6">
                <h4 style="color:#8d7252; font-family:poppins">Apparel price</h4>
                    <input type="text" class="form-control"  style="font-size:19px; border:none; background-color:transparent;" id="price" disabled>
                </div>
            </div>
            <br>
           <br>
           <br>
           <br>
            <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                <h4 style="color:#8d7252; font-family:poppins">Apparel Variation</h4>

                    <input type="text" class="form-control" style="font-size:19px; border:none; background-color:transparent;" id="variation" disabled>
                </div>
            <div class="col-md-6">
            <h4 style="color:#8d7252; font-family:poppins">Apparel description</h4>
                    <span style = "border:none; background-color:transparent; width: 100%;" id="description" cols="12" rows="5" disabled></span>
                </div>
        </div>
                <h4 style="color:#8d7252; font-family:poppins">Quantity</h4>
                <div class="input-group">
  <input type="button" value="-" class="button-minus" data-field="quantity">
  <input type="number" step="1" max="" value="1" name="quantity" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" disabled>
  <input type="button" value="+" class="button-plus" data-field="quantity">
</div>
               
                
           
        <div class="modal-footer">
        <button type="button" class="btn btn" style="background-color:#8d7252; color:white" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn" style="background-color:#8d7252;color:white" id="addmotosacart">Add To Cart</button>
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
                $("#name").text(newdata.name);
                $("#price").val(newdata.price);
                $("#variation").val(newdata.variation);
                $("#description").text(newdata.description);
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

        // $("body").on('click',"#addmotosacart",function(){
        //     $.post("addtocart.php",{CART_PRODUCT_ID:$("#product_id").val(),CART_USER_ID:$("#cart_user_id").val()},function(data,status){
        //         // console.log(data);
        //         // let newdata = JSON.parse(data);
        //         // $("#product_id").val(newdata.product_id);
        //         // $("#image").val(newdata.image);
        //         // $("#name").val(newdata.name);
        //         // $("#price").val(newdata.price);
        //         // $("#variation").val(newdata.variation);
        //         // $("#description").val(newdata.description);
        //     })

        //     // $("#categoriesModal").modal("show");
        // });

        $("body").on('click',"#prodcat",function(e){
            let dataid = $(e.currentTarget).data("id");
            // alert(dataid);
            $.post("selectproductcat.php",{PRODUCT_ID:dataid},function(data,status){
                let newdata = JSON.parse(data);

                let htm="";
                if(newdata.length!=0){
                    $("#productss").empty();
                $.each( newdata, function( key, value ) {
                    console.log(value);
                    $("#productss").append('<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">'+
                                    '<div class="products-single fix">'+
                                        '<div class="box-img-hover">'+
                                            '<img style="width:200px; height:250px;" src="adminViews/uploads/'+value.image+'" class="img-fluid" alt="Image">'+
                                            '<div class="mask-icon">' +
                                                '<ul>' +
                                                    '<li><a href="shopdetail.php" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>'+ 
                                                '</ul>'+
                                                '<div class= "pointed">'+
                                                    '<a type="button" class="cart" data-id="'+value.image+'" id="addtc">Add to Cart</a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="why-text">'+
                                            '<h4> '+value.name+'</h4>'+
                                            '<h4>Stocks: '+value.stocks+'</h4>'+
                                            '<h4>Category: '+value.cat_name+'</h4>'+
                                            '<h5>₱ '+value.price+'</h5>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>');
            });
        }else{
            
            $("#productss").empty();
            $("#productss").append('<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">'+
                                        '<div class="why-text">'+
                                            '<h5>No Available Data</h5>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>');
        }

                    $("#productss").append(htm);
            });

            // $("#categoriesModal").modal("show");
        });
    });

    
</script>
<script src="js/addminus.js"></script>


    
