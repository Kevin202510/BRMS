<!-- Modal -->
<div class="modal fade" id="productsModal" tabindex="-1" role="dialog" aria-labelledby="productsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productsModalLabel">Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="productsForm">
        <input type="hidden" id="product_id" name="product_id">
        <div class="form-group">
            <label >Enter Product Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
            <label > Enter Category</label>
            <select name="category_id" id="category_id">
                <?php  $newDBCRUD->select("categories","*");
                    $userLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($userLists)){ ?>
                    <option value="<?php echo $data['category_id']; ?>"><?php echo $data['cat_name']; ?></option>
                    <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label >Enter Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
        </div>
        <div class="form-group">
            <label >Enter Stocks</label>
            <input type="text" class="form-control" id="stocks" name="stocks" placeholder="Enter Stocks">
        </div>
        <div class="form-group">
            <label >Enter Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
        </div>
        <div class="form-group">
            <label >Enter Variation</label>
            <input type="text" class="form-control" id="variation" name="variation" placeholder="Enter Variation">
        </div>
        
           
           
            
           
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <input type="hidden" name="addproducts" id="addproducts">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveBTN">Save</button>
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