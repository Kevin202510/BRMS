<?php include('layouts/head.php');?>
<?php include('layouts/header.php');?>>
<?php include('layouts/searchbar.php');?>    

    <!-- Start Content  -->

    <div class="products-box">
        <div class="container">
        <div class="card">
        <div class="card-header">
            <h2>Products List</h2><br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Add New Data
            </button>
        </div>
        <div class="card-body">
        <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Edit</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                        </div>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        </div>
    </div>
    <!-- END CONTENT -->

<?php include('productsmodal.php');?>
<?php include('layouts/footer.php');?>