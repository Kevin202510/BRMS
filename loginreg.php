<?php include('layouts/head.php');?>
    <!-- Start Main Top -->
    <?php include('layouts/header.php');?>
    <!-- End Main Top -->
 <html>
  <head>
    <title>Register</title>
</head> 
<body>  
    <div class="products-box">
        <div class="container">
            <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration form</h3>
 
            
            <form class="px-md-2">

            <div class="form-outline mb-4">
                <input type="text" name = "fname" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">First Name:</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name = "lname" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Last Name:</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" name = "address" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Address:</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" name = "contact_num" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Contact No.:</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" name = "email" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Email:</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" name = "username" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">User Name:</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" name = "password" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Password:</label>
              </div>
              
              </div>

              

              <button type="submit" name = "submit" value = "submit" class="btn btn-success btn-lg mb-1">Register</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
        </div>
    </div>
  
    <!-- Start Footer  -->
    <?php include('layouts/footer.php');?>
    <!-- end footer -->
          </body>
          </html>