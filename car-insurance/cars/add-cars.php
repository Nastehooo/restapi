<?php session_start(); ?>
<?php include('../includes/header.php'); ?>
<?php include('../config/database.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Add Cars </h4>
                </div>
                <div class="card-body">
                    <form action="cars-code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-6">
                                <label for=""> CAR_ID </label>
                                <input type="text" name="CAR_ID" placeholder="Enter Car_ID" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> CAR_TYPE </label>
                                <input type="text" name="CAR_TYPE" placeholder="Enter Car_Type" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> RED_CAR </label>
                                <input type="text" name="RED_CAR" placeholder="Enter the red_car" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> CAR_AGE </label>
                                <input type="text" name="CAR_AGE" placeholder="Enter car_age" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_cars_buttons">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php') ?>
