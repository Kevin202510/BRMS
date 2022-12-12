<!-- Modal -->
<div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="categoriesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background-color:#EF9273;">
        <center><h5 class="modal-title" id="categoriesModalLabel" style="color:white">Categories</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      
      <div class="modal-body">
      <form id="categoriesForm">
        <input type="hidden" id="category_id" name="category_id">
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Category Name</h5>
            <input type="text" class="form-control"style="font-size:19px;" id="cat_name" name="cat_name" placeholder="Enter Category Name">
        </div>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <input type="hidden" name="addcategories" id="addcategories">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn" style="background-color:#8d7252; color:white;" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn" style="background-color:#8d7252; color:white;" id="saveBTN">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="categoriesModalDelete" tabindex="-1" role="dialog" aria-labelledby="categoriesModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoriesModalDeleteLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>ARE YOU SURE YOU WANT TO DELETE THIS ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="deletecategories">Delete</button>
      </div>
    </div>
  </div>
</div>