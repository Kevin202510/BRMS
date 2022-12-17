<!-- Modal -->
<div class="modal fade bs-modal-sm log-sign" id="loginsModal" tabindex="-1" role="dialog" aria-labelledby="loginsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content" style="background-color:white;">
        
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li id="tab1" class=" active tab-style login-shadow "><a href="#signin" class="active show" data-toggle="tab">LOGIN</a></li>
              <li id="tab2" class=" tab-style signup-shadow"><a href="#signup" data-toggle="tab">REGISTER</a></li>
              
            </ul>
        </div>
      <div class="modal-body" style="back">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active show in" id="signin">

    <form method="POST" action="index.php" autocomplete="off">
      
           
            <!-- Sign In Form -->
            <!-- Text input-->
          <fieldset>
               <div class="group">
               <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="background-color:#EF9273; color:white;"><i class="fas fa-user"></i></span>
              </div>
             <input  class="input form-control" style="font-size:19px;" name="email" type="text" placeholder="Email" required="true" aria-label="Email" aria-describedby="basic-addon1">
            </div>
          </div>
        
            <!-- Password input-->
            <div class="group">
            <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"style="background-color:#EF9273; color:white;"><i class="fas fa-key"></i></span>
              </div>
              <input name="password" type="password" value="" class="input form-control" style="font-size:19px;" id="password" placeholder="Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" style="background-color:#EF9273; color:white;" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
              </div>
            </div>
          </div>
        <div class="col">
           <div class="forgot-link">
           
            </div>
          </div>
            

            <!-- Button -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"style="background-color:#8d7252;">CANCEL</button>
             <button id="signin" name="signin" class="btn btn-primary " style = "width: 100px; background-color:#8d7252;">LOGIN</button>
              </div>
              
</fieldset>
</form>
        </div>
        

       
        <div class="tab-pane fade" id="signup">
 <form method="POST" action="" autocomplete="off">
  <fieldset>
 <input type="hidden" id="user_id" name="user_id">
        <div class="form-group">
            <label  hidden style="color:#8d7252;  font-family:poppins;">Permission:</label>
            <select hidden class="input" name="user_permission_id" id="user_permission_id">
              <option  value="2">Customer</option>
            </select>
        </div>

        
        <div class="row">
        <div class="col">
        <div class="group">
        <input  type="text" class="input" id="fname" name="fname" required="true">
        <label class="label" for="date" style="color:#8d7252;  font-family:poppins;">Firstname:</label></div>
        </div>
       
        
        <div class="col">
        <div class="group">
        <input  type="text" class="input" id="lname" name="lname" required="true">
        <label  class="label" for="date" style="color:#8d7252;  font-family:poppins;">Lastname:</label></div> 
        </div>
</div>
<br>
        <div class="row">
        <div class="col">
        <div class="group">
           <input type="text" class="input" id="address" name="address" required="true">
        <label class="label"for="date" style="color:#8d7252;  font-family:poppins;">Address:</label></div>

        </div>
         <div class="col">
         <div class="group">
         <input type="text" class="input" id="contact_num" name="contact_num" required="true" >
        <label class="label" for="date" style="color:#8d7252;  font-family:poppins;">Contact:</label> </div>

        </div>
</div>
<br>

<div class="row">
        <div class="col">
        <div class="group">
        <input type="email" class="input" id="email" name="email"required="true" >
        <label class="label" for="date" style="color:#8d7252;  font-family:poppins;">Email:</label></div>
            
        </div>
</div>
        <div class="row">
        <div class="col">
        <div class="group">
        <input type="password" class="input" id="password" name="password" required="true" >
        <label class="label" for="date" style="color:#8d7252;  font-family:poppins;">Password:</label> </div>
        <!-- <input type="text" class="input" id="username" name="username" required="true" >
        <label class="label" for="date" style="color:#8d7252;  font-family:poppins;">Username:</label> -->
            </div>
        </div>
        <div class="col">
         <div class="group">
         
            
        </div>
</div>
        <br>
        <br>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style = "width: 100px; background-color:#EF9273;">CANCEL</button>
        <button name="adduser" class="btn btn-primary" style = "width: 100px; background-color:#EF9273;">REGISTER</button>
</div>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</fieldset>
</form>

      </div>
    </div>
      </div>
      <!--<div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>-->
    </div>
  </div>
</div>
  
   

  </div>
</div>
<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="usersModalLabel"></h4></center>
                </div>
                <div class="modal-body">
                  <form id="editprof">
				<div class="container-fluid">
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Firstname:</span>
						<input type="text" style="width:350px;" class="form-control" name="fname" id="fnames">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Lastname:</span>
						<input type="text" style="width:350px;" class="form-control" name="lname" id="lnames">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Address:</span>
						<input type="text" style="width:350px;" class="form-control" id="addresss" name="address">
					</div>
          <div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Contact:</span>
						<input type="text" style="width:350px;" class="form-control" id="contact_nums" name="contact_num">
					</div>							
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i> Update</button>
                </div>
            </div>
            </form>
        </div>
    </div>

