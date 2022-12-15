
<header class="main-header-top hidden-print">
         <a href="index.php" class="logo" style="background-color:#EF9273;"><img class="img-fluid able-logo" src="assets/images/logo.jpg" alt="logo"></a>
         <nav class="navbar navbar-static-top" style="background-color:#EF9273;">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <ul class="top-nav lft-nav">
                              
              
               <li class="dropdown pc-rheader-submenu message-notification search-toggle">
                 
               </li>
            </ul>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">
              <div class="upgrade-button">
               
              </div>

               <ul class="top-nav">
                  <!--Notification Menu-->
                    
                  <li class="dropdown notification-menu">
                     <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                        <i class="icon-bell"></i>
                        <span class="badge badge-danger header-badge">9</span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="not-head">You have <b class="text-primary">4</b> new notifications.</li>
                        <li class="bell-notification">
                           <a href="javascript:;" class="media">
                              <span class="media-left media-icon">
                    <img class="img-circle" src="assets/images/.png" alt="User Image">
                  </span>
                              <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block-time">2min ago</span></div>
                           </a>
                        </li>
                        <li class="bell-notification">
                           <a href="javascript:;" class="media">
                              <span class="media-left media-icon">
                    <img class="img-circle" src="assets/images/log1.png" alt="User Image"><img class="img-circle" src="assets/images/log2.png" alt="User Image">
                  </span>
                              <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block-time">20min ago</span></div>
                           </a>
                        </li>
                        <li class="bell-notification">
                           <a href="javascript:;" class="media"><span class="media-left media-icon">
                    <img class="img-circle" src="assets/images/.png" alt="User Image">
                  </span>
                                    <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block-time">3 hours ago</span></div>
                        </li>
                        <li class="not-footer">
                           <a href="#!">See all notifications.</a>
                        </li>
                     </ul>
                  </li>
           
                  <!-- window screen -->
                  <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="icon-size-fullscreen"></i>
                     </a>

                  </li>
                  <!-- User Menu-->
                  
                  <li class="dropdown">
                     <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                     <?php if(isset($_SESSION['PERMISSION_ID'])){
                       ?>
                         <!-- <form method="post">
                           <button type="submit" name="logout" class="btn btn-primary btn-sm" style="width:100%" class="nav-link" value="Logout">LOGOUT</button>
                        </form> -->
               
                        <span><?php echo $_SESSION['FULLNAME'];?> <i class=" icofont icofont-simple-down"></i></span>
                        <ul class="dropdown-menu settings-menu">
                       
                        <li><a href="editprofile.php"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="#"><i class="icon-envelope-open"></i> My Messages</a></li>
                        <li>
                        <form method="post">
                           <button type="submit" name="logout"><i class="icon-logout"></i>Logout</button></li>
                        </form>
                           <li class="p-0">
                           <div class="dropdown-divider m-0"></div>
                        </li>
                      
                        
                     </ul>
                           <?php }?>
                    
                     
                  </li>
               </ul>
                     </a>
             
               
            </div>
         </nav>
      </header>