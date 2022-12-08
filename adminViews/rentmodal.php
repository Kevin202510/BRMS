<!-- Modal -->
<div class="modal fade" id="rentprodModal" tabindex="-1" role="dialog" aria-labelledby="rentprodModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentprodModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="rentForm">
        <input type="hidden" id="cw_id" name="cw_id">
        <input type="hidden" id="id" name="id">
        <div class="form-group">
            <label >First Name</label>
            <input type="text" class="form-control" id="customer_fname" name="customer_fname" placeholder="Enter First Name">
        </div>
        <div class="form-group">
            <label >Last Name</label>
            <input type="text" class="form-control" id="customer_lname" name="customer_lname" placeholder="Enter Last Name">
        </div>
        <div class="form-group">
            <label >Address</label>
            <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Enter ">
        </div>
       
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <input type="hidden" name="addrentproduct" id="addrentproduct">
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
<div class="modal fade" id="rentproductModalDelete" tabindex="-1" role="dialog" aria-labelledby="rentproductModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentproductModalDeleteLabel">Delete </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>ARE YOU SURE YOU WANT TO DELETE THIS ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="deleterentproduct">Delete</button>
      </div>
    </div>
  </div>
</div>