<!-- Modal -->
<div class="modal fade" id="productsModal" tabindex="-1" role="dialog" aria-labelledby="productsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#EF9273;">
        <center><h4 class="modal-title" id="productsModalLabel" style="color:white;">Products</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
      <form action="functions/productscrud.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="product_id" name="product_id">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <br>
        <div class="form-group">
            <h5 style="color:#8d7252;  font-family:poppins;">Enter Product Name</h5>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;"> Enter Category</h5>
        <br>
            <select name="category_id" id="category_id">
              <option value=""selected disabled hidden> Categories</option>
                <?php  $newDBCRUD->select("categories","*");
                    $userLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($userLists)){ ?>
                    <option value="<?php echo $data['category_id']; ?>"><?php echo $data['cat_name']; ?></option>
                    <?php }?>
            </select>
        </div>
        
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Enter Price</h5>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Enter Stocks</h5>
            <input type="text" class="form-control" id="stocks" name="stocks" placeholder="Enter Stocks">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Enter Description</h5>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Enter Variation</h5>
            <input type="text" class="form-control" id="variation" name="variation" placeholder="Enter Variation">
        </div>
        <input type="hidden" name="addproducts" id="addproducts">
        <div class="modal-footer"style="background-color:#EF9273;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="productsModalDelete" tabindex="-1" role="dialog" aria-labelledby="productsModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productsModalDeleteLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>ARE YOU SURE YOU WANT TO DELETE THIS ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="deleteproducts">Delete</button>
      </div>
    </div>
  </div>
</div>