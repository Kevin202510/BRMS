<?php include('layouts/head.php');?>
    <!-- Start Main Top -->
    <?php include('layouts/header.php');?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <?php include('layouts/searchbar.php');?>   
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Products</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Our Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Rented</option>
								</select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
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
                                                    <div class="type-lb">
                                                        <!-- <p class="sale">Accessories</p> -->
                                                    </div>
                                                    <img src="images/1.jpeg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            
                                                           
                                                        </ul>
                                                        <div class= "pointed">
                                                        <a type="button" class="cart" data-id="<?php echo $data['product_id']; ?>" id="addtc">Add to Cart</a>
                                                        <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#categoriesModal">
                                                        Add New Data
                                                        </button> -->
                                            </div>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Name: <?php echo $data['name']; ?></h4>
                                                    <h4>Stocks: <?php echo $data['stocks']; ?></h4>
                                                    <h4>Category: <?php echo $data['category_id']; ?></h4>
                                                    <h5>₱ <?php echo $data['price']; ?></h5>
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
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">Costumes<small class="text-muted"></small></a>
                                            <a href="#" class="list-group-item list-group-item-action"> Gowns<small class="text-muted"></small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Suits<small class="text-muted"></small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Barongs<small class="text-muted"></small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Accessories<small class="text-muted"></small></a>
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

    
<div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="categoriesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoriesModalLabel">Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="addtocart.php">
        <input type="hidden" id="product_id" name="product_id">
        <input type="hidden" id="cart_user_id" name="cart_user_id" value="1">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label >Product Name</label>
                    <input type="text" class="form-control" id="name"readonly>
                </div>
                <div class="col-md-6">
                    <label >Product price</label>
                    <input type="text" class="form-control" id="price" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label >Product variation</label>
                    <input type="text" class="form-control" id="variation" readonly>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                    <label >Product description</label>
                    <textarea id="description" cols="12" rows="5" readonly></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label >Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="addtocartthis" value="Add To Cart">
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

        <!-- Start Footer  -->
        <?php include('layouts/footer.php');?>
        <!-- end footer -->

<script>
    $(document).ready(function(){
        $("body").on('click',"#addtc",function(e){
            let dataid = $(e.currentTarget).data("id");
            $.post("addtocart.php",{PRODUCT_ID:dataid},function(data,status){
                // console.log(data);
                let newdata = JSON.parse(data);
                $("#product_id").val(newdata.product_id);
                $("#name").val(newdata.name);
                $("#price").val(newdata.price);
                $("#variation").val(newdata.variation);
                $("#description").val(newdata.description);
            })

            $("#categoriesModal").modal("show");
        });
    });
</script>