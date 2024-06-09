<?php 
session_start(); 

include('../includes/header.php');
include('../config/database.php');
include('../functions/myfunctions.php');


?>

<div class="container">
    <div class="row">
       <div class="col-md-12">
           <?php 
            if(isset($_GET['CAR_ID']))
            {
                $CAR_ID = $_GET['CAR_ID'];
                $cars = getsByID("car_details", $CAR_ID);

                if(mysqli_num_rows($cars) > 0)
                {
                    $data = mysqli_fetch_array($cars);
                    ?>
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="text-white">Delete Cars
                                    <a href="read-cars.php" class="btn btn-primary float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                    <form action="cars-code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="CAR_ID" value="<?= $data['CAR_ID'] ?>">
                                                <label for="">CAR_ID</label>
                                                <input type="text" name="CAR_ID" value="<?= $data['CAR_ID'] ?>" placeholder="Enter Car ID" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">CAR_TYPE</label>
                                                <input type="text" name="CAR_TYPE" value="<?= $data['CAR_TYPE'] ?>" placeholder="Enter Car_Type" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">RED_CAR</label>
                                                <input type="text" name="RED_CAR" value="<?= $data['RED_CAR'] ?>" placeholder="Enter the red_car" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">CAR_AGE</label>
                                                <input type="text" name="CAR_AGE" value="<?= $data['CAR_AGE'] ?>" placeholder="Enter car_age" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                 <button type="submit" class="btn btn-danger" name="delete_car_button">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    <?php
                }
                else
                {
                    echo "Driver not found";
                }
            }
            else
            {
                echo "ID missing from URL";
            }
                ?>
       </div>
    </div>
</div>

<?php include('../includes/footer.php') ?>
