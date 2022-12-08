<?php session_start(); ?>
<?php include('layouts/head.php'); ?>
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <?php include('layouts/navbar.php'); ?>
      <!-- Side-Nav-->
      <?php include('layouts/sidebar.php'); ?>      

    <!-- Start Content  -->

    <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
               <h2  style=" font-family:poppins; color:#8d7252; ">Profile</h2><br>
               </div>
            </div>
            <div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<br>
		<br>
		<br>
		<br>
<div class="card h-100">
        <br>
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
                <?php if(isset($_SESSION['PERMISSION_ID'])){
                       ?>

               
                        <span><?php echo $_SESSION['FULLNAME'];?></span>
                       
                           <?php }?>
				<h6 class="user-email"> </h6>
			</div>
			<div class="about">
				
				
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<center>
<div class="card mx-auto" style="width: 100%;">

	<div class="card-body" style="width: 60%;">
	</center>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><br>
				<h4 class="mb-2 text" style="color:#EF9273;"><center>Personal Details</h4></center>
			</div>
			
			<?php  
			include('../APIFUNCTION/DBCRUD.php');
			$newDBCRUD = new DBCRUD();
			$whereclause = "user_id =" . $_SESSION["ID"];
                            $newDBCRUD->select("users","*",$whereclause);
                            $userLists = $newDBCRUD->sql;
                    
                            $index = 1;
                            while ($data = mysqli_fetch_assoc($userLists)){
								?>

								
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<center>
				<div class="form-group">
					<h6 for="firstName" style="color:#8d7252;">First Name</h6>
					<input type="text" class="form-control" id="firstName" value = "<?php echo $data['fname'];?>" disabled>
				</div>
			</div>
							</center>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
			<center>
				<div class="form-group">
				<h6 for="lastName"  style="color:#8d7252;">Last Name</h6>
					<input type="text" class="form-control" id="lastName" value = "<?php echo $data['lname'];?>" disabled>
				</div>
			</div>
							</center>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
			<center>
				<div class="form-group">
				<h6 for="Addres"  style="color:#8d7252;">Address</h6>
					<input type="text" class="form-control" id="Address" value = "<?php echo $data['address'];?>" disabled>
				</div>
			</div>
							</center>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
			<center>
				<div class="form-group">
				<h6 for="phone"  style="color:#8d7252;">Contact Number</h6>
					<input type="text" class="form-control" id="phone" value = "<?php echo $data['contact_num'];?>" disabled>
				</div>
			</div>
							</center>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
			<center>
				<div class="form-group">
				<h6 for="email"  style="color:#8d7252;">Email</h6>
					<input type="text" class="form-control" id="email" value = "<?php echo $data['email'];?>" disabled>
				</div>
			</div>
							</center>
			<?php } ?>
		</div>
		
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					
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
    <!-- END CONTENT -->


<?php include('layouts/footer.php');?>
