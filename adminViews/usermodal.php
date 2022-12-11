<!-- Modal -->
<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#EF9273;">
        <center><h3 class="modal-title" id="usersModalLabel" style="color:white">Users</h3></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
     
      <form id="userForm">
        <input type="hidden" id="user_id" name="user_id">
        <div class="form-group">
            <h5 style="color:#8d7252;  font-family:poppins;">Permission:</h5>
            <select  class="form-control" name="user_permission_id" id="user_permission_id">
              <option value="1">Administrator</option>
              <option value="3">Staff</option>
            </select>
        </div>

        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Firstname:</h5>
            <input type="text" class="form-control" style="font-size:18px;" id="fname" name="fname" placeholder="Enter Firstname">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Lastname:</h5>
            <input type="text" class="form-control" style="font-size:18px;" id="lname" name="lname"  placeholder="Enter Lastname">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;" for="Address" >Address:</h5>
            <input type="text" class="form-control" style="font-size:18px;" id="address" name="address" placeholder="Enter Address">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Contact:</h5>
            <input type="text" class="form-control" style="font-size:18px;" id="contact_num" name="contact_num" placeholder="Enter Contact">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Email:</h5>
            <input type="email" class="form-control"style="font-size:18px;"  id="email" name="email" placeholder="Enter Email">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Username:</h5>
            <input type="text" class="form-control" style="font-size:18px;" id="username" name="username" placeholder="Enter Username">
        </div>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <input type="hidden" name="adduser" id="adduser">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn" data-dismiss="modal"style="background-color:#8d7252; color:white;">Close</button>
        <button type="button" class="btn btn" id="saveBTN" style="background-color:#8d7252; color:white;">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="usersModalDelete" tabindex="-1" role="dialog" aria-labelledby="usersModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="usersModalDeleteLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>ARE YOU SURE YOU WANT TO DELETE THIS ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="deleteuser">Delete</button>
      </div>
    </div>
  </div>
</div>