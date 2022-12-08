<!-- Modal -->
<div class="modal fade" id="rentModal" tabindex="-1" role="dialog" aria-labelledby="rentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#EF9273;">
       <center> <h4 class="modal-title" id="rentModalLabel" style="color:white;">Rent</h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="rentForm">
        <input type="hidden" name="cw_id" id="cw_id">
        <div class="form-group">
            <h5 style="color:#8d7252; font-family:poppins;" >Customer First Name</h5>
            <input type="text" class="form-control" id="customer_fname" name="customer_fname" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
            <h5 style="color:#8d7252;  font-family:poppins;">Customer Last Name</h5>
            <input type="text" class="form-control" id="customer_lname" name="customer_lname" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
            <h5 style="color:#8d7252;  font-family:poppins;">Customer Address</h5>
            <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Product</h5>
            <select style = "width:350px;" name="customer_product_id" id="customer_product_ids">
                <?php  $newDBCRUD->select("products","*");
                    $userLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($userLists)){ ?>
                    <option value="<?php echo $data['product_id']; ?>"><?php echo $data['name']; ?></option>
                    <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label >Quantity</label>
            <input style = "width:100px;" type="number" class="form-control" id="customer_quantity" name="customer_quantity" >
        </div>
        <input type="hidden" name="rentmodal" id="rentmodal">
        </form>
      </div>
      <div class="modal-footer"style="background-color:#EF9273;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveBTN">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="rentModalDelete" tabindex="-1" role="dialog" aria-labelledby="rentModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentModalDeleteLabel">Delete User</h5>
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