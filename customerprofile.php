<?php session_start(); ?>
<?php include('layouts/head.php'); ?>
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <?php include('layouts/header.php'); ?>
      <!-- Side-Nav-->
            

    <!-- Start Content  -->

    <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">

               </div>
            </div>
            <div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
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
				<h6 class="user-email"></h6>
			</div>
			<div >
            <button type="file" name="fileToUpload" id="fileToUpload">Change Profile Picture</button>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<center><h1 class="mb-2 text" style="color:#EF9273;">Personal Details</h1></center>
			</div>
            <br>
            <br>
			<?php  $whereclause = "user_id =" . $_SESSION["ID"];
                            $newDBCRUD->select("users","*",$whereclause);
                            $userLists = $newDBCRUD->sql;
                    
                            $index = 1;
                            while ($data = mysqli_fetch_assoc($userLists)){
								?>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h3 for="firstname"  style="color:#8d7252;">First Name </h3>
					<input type="text" name = "fname" class="form-control"  style="font-size:19px; border:none;" id="firstname" value = "<?php echo $data['fname'];?>" disabled>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h3 for="lastname" style="color:#8d7252;">Last Name </h3>
					<input type="text" name = "lname" class="form-control" style="font-size:19px; border:none;"  id="lastname" value = "<?php echo $data['lname'];?>" disabled>
				</div>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h3 for="Adress" style="color:#8d7252;">Address </h3>
					<input type="text" name = "address" class="form-control" style="font-size:19px; border:none;" id="Address" value = "<?php echo $data['address'];?>" disabled>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<h3 for="phone" style="color:#8d7252;">Phone </h3>
					<input type="text" name = "contact_num" class="form-control" style="font-size:19px; border:none;" id="phone" value = "<?php echo $data['contact_num'];?>" disabled>
				</div>
			</div>
		
			
			<?php } ?>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="button" id="submit" name="submit" class="btn btn-secondary" style="background-color:#8d7252;">Cancel</button>
					<button type="button" class="btn btn-info" style="background-color:#8d7252;" onclick="showform(<?php echo $data['user_id']; ?>);">Edit</button>
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

	<!DOCTYPE html>
<html lang="en">
<!-- Basic -->



<body>
    
    <!-- End Main Top -->

    <!-- Start Main Top -->
   
    <!-- End All Title Box -->

    <!-- Start My Account  -->
    <div class="my-account-box-main">
        <div class="container">
            <div class="my-account-page">
                <div class="row">
                    
                    <div class="col-lg-4 col-md-12" style="left: 370px;">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="myorders.php"> <i class="fa fa-gift"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>My Orders</h4>
                                    <p>Track, return, or Rent things again</p>
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
<?php include('layouts/footer.php');?>
