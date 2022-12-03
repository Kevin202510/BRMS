
<!-- Modal -->
<div class="modal fade bs-modal-sm log-sign" id="loginsModal" tabindex="-1" role="dialog" aria-labelledby="loginsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li id="tab1" class=" active tab-style login-shadow "><a href="#signin" data-toggle="tab">Log In</a></li>
              <li id="tab2" class=" tab-style "><a href="#signup" data-toggle="tab">Sign Up</a></li>
              
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
       
        <div class="tab-pane fade active in" id="signin">

    <form method="POST" action="index.php">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
              
               <div class="group">
        <input class="input" name="email" type="text">
            <label class="label" for="date">Email address</label></div>
                      
              
            <!-- Password input-->
            <div class="group">
        <input class="input" name="password" type="password">
            <label class="label" for="date">Password</label>
            </div>
        <em>minimum 6 characters</em>

           <div class="forgot-link">
            <a href="#forgot-password" data-toggle="modal" data-target="#forgot-password"> I forgot my password</a>
            </div>
            

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="signin" class="btn btn-primary btn-block">Log In</button>
              </div>
            </div>
            </fieldset>
</form>
        </div>
          
          
        <div class="tab-pane fade" id="signup">
 <form method="POST" action="">
 <input type="hidden" id="user_id" name="user_id">
        <div class="form-group">
            <h5  hidden style="color:#8d7252;  font-family:poppins;">Permission:</h5>
            <select hidden class="form-control" name="user_permission_id" id="user_permission_id">
              <option  value="2">Customer</option>
            </select>
        </div>

        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Firstname:</h5>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Firstname">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Lastname:</h5>
            <input type="text" class="form-control" id="lname" name="lname"  placeholder="Enter Lastname">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;" for="Address" >Address:</h5>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Contact:</h5>
            <input type="number" class="form-control" id="contact_num" name="contact_num" placeholder="Enter Contact">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Email:</h5>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Username:</h5>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
        </div>
        <div class="form-group">
        <h5 style="color:#8d7252;  font-family:poppins;">Password:</h5>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
        </div>
        <div class="controls">
                <button name="adduser" class="btn btn-primary btn-block">Create Account</button>
              </div>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        
</form>
</fieldset>
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
  
   

<!--modal2-->

<div class="modal fade bs-modal-sm" id="forgot-password" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Password will be sent to your email</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
        <fieldset>
        <div class="group">
<input required="" class="input" type="text"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Email address</label></div>
        
        
        <div class="control-group">
              <label class="control-label" for="forpassword"></label>
              <div class="controls">
                <button id="forpasswodr" name="forpassword" class="btn btn-primary btn-block">Send</button>
              </div>
            </div>
          </fieldset>
            </form>
          
      </div>
    </div>
    
  </div>
</div>


